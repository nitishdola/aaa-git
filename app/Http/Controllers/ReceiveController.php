<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Validator, Redirect, Auth, Crypt;
use App\Models\Master\Item;
use App\Models\Stock\Receive;

class ReceiveController extends Controller
{
    public function receive() {
    	$items 		= Item::whereStatus(1)->pluck('name', 'id');
    	return view('stock_in.form', compact('items'));
    }

    public function receiveItem(Request $request) {
    	$data = $request->all();

    	$item_id = $request->item_id;

    	//check if exists
    	$check = Item::where('id', $item_id)->count();
    	if(!$check) {
    		$item = Item::create(['name' => $request->item_id]);
    		$item_id = $item->id;
    	}

    	
    	$item = Item::find($item_id);
    	$old_count 	= $item->stock_in_hand;

    	$data['item_id'] 		= $item_id;
    	$data['opening_stock'] 	= $old_count;
    	$data['date_of_receive'] 	= date('Y-m-d', strtotime($request->date_of_receive));

    	
		$new_count 	= $request->quantity;
		$new_stock 	= $old_count + $new_count;

		$data['closing_stock'] = $new_stock;

    	$validator = Validator::make($data, Receive::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        
    	$message = '';
    	if(Receive::create($data)) {
    		//update item
    		
    		$item->stock_in_hand = $new_stock;
    		$item->save();

            $message .= 'Received !';
        }else{
            $message .= 'Error !';
        }
        return Redirect::back()->with('message', $message);
    }

    public function receiveItemReport(Request $request) {
        $where = [];
        if($request->item_id) {
            $where['item_id'] = $request->item_id;
        }

        if($request->employee_id) {
            $where['employee_id'] = $request->employee_id;
        }

        $results = Receive::orderBy('date_of_receive', 'DESC')->with('item')->get();

        return view('stock_in.report', compact('results'));
    }
}
