<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB, Validator, Redirect, Auth, Crypt;
use App\Models\Master\Employee, App\Models\Master\Item;
use App\Models\Stock\Issue;

class IssueController extends Controller
{
    public function issue() {
    	$items 		= Item::whereStatus(1)->pluck('name', 'id');
    	$employees 	= Employee::whereStatus(1)->orderBy('name')->pluck('name', 'id');

    	return view('stock_out.form', compact('items', 'employees'));
    }

    public function issueItem(Request $request) {
    	$data = $request->all();
    	

    	$item_id = $request->item_id;
    	$item = Item::find($item_id);
    	$old_count 	= $item->stock_in_hand;

    	$data['item_id'] 		= $item_id;
    	$data['opening_stock'] 	= $old_count;
    	$data['date_of_issue'] 	= date('Y-m-d', strtotime($request->date_of_issue));

    	
		$new_count 	= $request->quantity;
		$new_stock 	= $old_count - $new_count;

		$data['closing_stock'] = $new_stock;

    	$validator = Validator::make($data, Issue::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        
    	$message = '';
    	if(Issue::create($data)) {
    		//update item
    		
    		$item->stock_in_hand = $new_stock;
    		$item->save();

            $message .= 'Items Issued !';
        }else{
            $message .= 'Error !';
        }
        return Redirect::back()->with('message', $message);
    }

    public function issueReport(Request $request) {
        $where = [];
        if($request->item_id) {
            $where['item_id'] = $request->item_id;
        }

        if($request->employee_id) {
            $where['employee_id'] = $request->employee_id;
        }

        $results = Issue::orderBy('date_of_issue', 'DESC')->with('item', 'employee')->get();

        return view('stock_out.report', compact('results'));
    }
}
