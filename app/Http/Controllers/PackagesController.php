<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Packages\Package;
use DB, Validator, Redirect, Auth, Crypt, Input, Excel;

class PackagesController extends Controller
{
    public function index() {
    	$results = Package::whereStatus(1)->get();
    	return view('package.index', compact('results'));
    }

    public function uploadMatchMaker() {
    	return view('package.match_upload');
    }

    public function matchMake( Request $request) {
    	//$city_data = Package::where('status',1)->get();
    	$path = $request->file('match_excel')->getRealPath();
    	$data = Excel::load($path, function($reader) {})->get();
    	$results = $data->toArray();

    	foreach($results as $k => $v) {
    		$category 		= $v['cat'];
    		$sub_category 	= $v['subc'];
    		$procedure_name = $v['procedure_name'];

    		$non_nabh 	= $v['non_nabh'];
    		$nabh 		= $v['nabh'];

    		$city_data = Package::where('status',1)->where(['category' => $category, 'sub_category' => $sub_category])
    							->where('procedure_name', 'like', '%' . $procedure_name . '%')
    							->first();

    		/*if($city_data) {
    			echo '<br>'.$city_data->procedure_name.' => MOU NABH RATE '.$city_data->guwahati_nabh.' TPI NABH RATE '.$nabh;
    			echo '<br>'.$city_data->procedure_name.' => MOU NO NABH RATE '.$city_data->guwahati_non_nabh.' TPI NABH RATE '.$non_nabh;

    			if($city_data->guwahati_nabh != $nabh) {
    				echo '<p style="color:red; font-weight:bold">'.$procedure_name.' NOT MATCHED !</p>';
    			}

    			if($city_data->guwahati_non_nabh != $non_nabh) {
    				echo '<p style="color:red; font-weight:bold">'.$procedure_name.' NOT MATCHED !</p>';
    			}

    			echo '<hr>';

    		}else{
    			echo '<p style="color:red">'.$procedure_name.' was not found !</p>';
    		}*/

    		/*if($city_data) {
    			echo '<br>'.$city_data->procedure_name.' => MOU NABH RATE '.$city_data->guwahati_nabh.' TPI NABH RATE '.$nabh;
    			echo '<br>'.$city_data->procedure_name.' => MOU NO NABH RATE '.$city_data->guwahati_non_nabh.' TPI NABH RATE '.$non_nabh;

    			if($city_data->guwahati_nabh != $nabh) {
    				echo '<p style="color:red; font-weight:bold">'.$procedure_name.' NOT MATCHED !</p>';
    			}

    			if($city_data->guwahati_non_nabh != $non_nabh) {
    				echo '<p style="color:red; font-weight:bold">'.$procedure_name.' NOT MATCHED !</p>';
    			}

    			echo '<hr>';

    		}else{
    			echo '<p style="color:red">'.$procedure_name.' was not found !</p>';
    		}*/

            if($city_data) {
                echo '<br>'.$city_data->procedure_name.' => MOU NABH RATE '.$city_data->kolkatta_nabh.' TPI NABH RATE '.$nabh;
                echo '<br>'.$city_data->procedure_name.' => MOU NO NABH RATE '.$city_data->kolkatta_non_nabh.' TPI NABH RATE '.$non_nabh;

                if($city_data->kolkatta_nabh != $nabh) {
                    echo '<p style="color:red; font-weight:bold">'.$procedure_name.' NOT MATCHED !</p>';
                }

                if($city_data->kolkatta_non_nabh != $non_nabh) {
                    echo '<p style="color:red; font-weight:bold">'.$procedure_name.' NOT MATCHED !</p>';
                }

                echo '<hr>';

            }else{
                echo '<p style="color:red">'.$procedure_name.' was not found !</p>';
            }
    	}
    }
}
