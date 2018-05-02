<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Validator, Redirect, Auth, Crypt;
use App\Models\Master\Item;
class RESTController extends Controller
{
    public function getItemInfo(Request $request) {
    	$item_id = $request->item_id;
    	return Item::select('name', 'stock_in_hand')->where('id', $item_id)->first();
    }
}
