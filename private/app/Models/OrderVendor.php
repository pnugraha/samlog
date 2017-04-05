<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderVendor extends Model
{
    protected $table = 'orders_vendors';
    protected $fillable = ['order_id', 'vendor_id', 'type', 'tax'];
    protected $hidden = ['created_at', 'updated_at'];

    public function validate($data) {
        $rules = [                         
            'order_id' => 'required',
            'vendor_id' => 'required'
        ];
        return \Validator::make($data, $rules);
    }    
    
    public function service() {
        return $this->belongsTo('App\Models\Service', 'vendor_id');
    }
    
}
