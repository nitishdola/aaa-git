<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = array('name', 'stock_in_hand', 'status');
	protected $table    = 'items';
    protected $guarded   = ['_token'];
    public static $rules = [
    	'name' 				=> 'required',
    	'stock_in_hand'  	=> 'required',
    ];
}
