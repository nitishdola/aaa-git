<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public static $rules = [
        'item_id'         =>  'required|exists:items,id',
        'employee_id'     =>  'required|exists:employees,id',
        'quantity'        =>  'required',
        'date_of_issue' 	=>  'required',
        'opening_stock'   =>  'required',
        'closing_stock'   =>  'required',
    ];

    public function item()
    {
        return $this->belongsTo('App\Models\Master\Item', 'item_id');
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\Master\Employee', 'employee_id');
    }

    protected $fillable = [
        'item_id', 'quantity','employee_id', 'date_of_issue', 'opening_stock', 'closing_stock','remarks'
    ];
}
