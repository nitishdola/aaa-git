<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB, Validator, Redirect, Auth, Crypt, Input, Excel;
use App\Models\Master\Item;
use App\Models\Stock\Receive;

class ItemsController extends Controller
{
    public function index(){
    	$results = Item::whereStatus(1)->orderBy('name')->get();
    	return view('items.index', compact('results'));
    }

    public function uploadExcel(){
    	return view('items.import');
    }

    public function processExcelItems(Request $request){
    	$path = $request->file('mis_excel')->getRealPath();
    	$data = Excel::load($path, function($reader) {})->get();

		DB::beginTransaction();
		foreach($data->toArray() as $k => $v) {
			//insert to receive
			if($v['item'] != ''):
				//create Item

				$data = [];
				$data['name'] 			= $v['item'];
				$data['stock_in_hand'] 	= $v['qty'];
				$item = Item::create($data);


				$receive_data = [];
				$receive_data['item_id'] 		= $item->id;
				$receive_data['quantity'] 		= $v['qty'];
				$receive_data['vendor_name'] 	= 'VEEVEK TRADERS';
				$receive_data['date_of_receive'] = '2018-04-21';
				$receive_data['opening_stock'] 	= 0;
				$receive_data['closing_stock'] 	= $v['qty'];

				Receive::create($receive_data);


			endif;
		}
		DB::commit();
    }
}
