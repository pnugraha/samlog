<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['no', 'customer_id', 'service_id', 'cargo_type', 'quantity_cargo', 'volume', 'party', 'weight', 'stuffing_date', 'note'];
    protected $hidden = ['created_at', 'updated_at'];

    public function validate($data) {
        $rules = [            
            'no' => 'required',             
            'customer_id' => 'required',
            'service_id' => 'required'
        ];
        return \Validator::make($data, $rules);
    }    
    
    public function company() {
        return $this->belongsTo('App\Models\Company', 'customer_id');
    }
    
    public function service() {
        return $this->belongsTo('App\Models\Service', 'service_id');
    }
    
    
}
