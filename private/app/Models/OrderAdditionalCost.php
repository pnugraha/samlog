<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAdditionalCost extends Model
{
    protected $table = 'orders_additional_costs';
    protected $fillable = ['order_id', 'cost_id', 'type'];
    protected $hidden = ['created_at', 'updated_at'];

    public function validate($data) {
        $rules = [            
            'order_id' => 'required',             
            'cost_id' => 'required',
        ];
        return \Validator::make($data, $rules);
    }    
    
    
}
