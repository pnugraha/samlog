<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderCargo extends Model
{
    protected $table = 'orders_cargo';
    protected $fillable = ['order_id', 'no_container', 'no_seal', 'voyage', 'date', 'rute', 'ta_pod', 'tb_pod', 'estimasi_delivery', 'delivery'];
    protected $hidden = ['created_at', 'updated_at'];

    public function validate($data) {
        $rules = [            
            'order_id' => 'required',             
            'no_container' => 'required',
            'no_seal' => 'required'
        ];
        return \Validator::make($data, $rules);
    }    
    
    
}
