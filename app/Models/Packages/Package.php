<?php

namespace App\Models\Packages;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public static $rules = [
		'category'         	=>  'required|exists:items,id',
		'sub_category'     	=>  'required|exists:employees,id',
		'procdure_code'    	=>  'required',
		'procedure_name' 	=>  'required',

		'guwahati_nabh'   	=>  'required',
		'guwahati_non_nabh' =>  'required',

		'banglore_nabh'   	=>  'required',
		'banglore_non_nabh' =>  'required',

		'mumbai_non_nabh'   =>  'required',
		'mumbai_nabh' 		=>  'required',

		'chennai_nabh'   	=>  'required',
		'chennai_non_nabh' 	=>  'required',

		'kolkatta_nabh'   	=>  'required',
		'kolkatta_non_nabh' =>  'required',

		'delhi_nabh'   		=>  'required',
		'delhi_non_nabh' 	=>  'required',
    ];

    protected $fillable = [
        'category', 'sub_category','procdure_code', 'procedure_name', 'guwahati_nabh', 'guwahati_non_nabh','banglore_nabh','banglore_non_nabh', 'mumbai_non_nabh', 'mumbai_nabh','chennai_non_nabh', 'chennai_nabh','kolkatta_non_nabh', 'kolkatta_nabh','delhi_non_nabh', 'delhi_nabh'
    ];
}
