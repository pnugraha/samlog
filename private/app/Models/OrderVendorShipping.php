<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderVendorShipping extends Model
{
    protected $table = 'orders_vendors_shipping';
    protected $fillable = ['order_id', 'vendor_id', 'seal', 'bl_fee', 'vessel_name', 'voyage', 'closing_date', 'etd_pol', 'etd_pod', 'note'];
    protected $hidden = ['created_at', 'updated_at'];

    public function validate($data) {
        $rules = [            
            'order_id' => 'required',             
            'vendor_id' => 'required',
            'seal' => 'required',
            'bl_fee' => 'required',
            'vessel_name' => 'required'
        ];
        return \Validator::make($data, $rules);
    }    
    
    public function service() {
        return $this->belongsTo('App\Models\Service', 'vendor_id');
    }
    
    
}
