<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
    public static $rules = [
        'item_id'         =>  'required|exists:items,id',
        'quantity'        =>  'required',
        'vendor_name'     =>  'required',
        'date_of_receive' =>  'required',
        'opening_stock'   =>  'required',
        'closing_stock'   =>  'required',
    ];

    public function item()
    {
        return $this->belongsTo('App\Models\Master\Item', 'item_id');
    }
    
    protected $fillable = [
        'item_id', 'quantity','vendor_name', 'date_of_receive', 'opening_stock', 'closing_stock','remarks'
    ];
}
