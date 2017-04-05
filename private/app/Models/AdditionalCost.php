<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalCost extends Model
{
    protected $table = 'additional_costs';
    protected $fillable = ['company_id', 'name', 'tarif', 'status'];
    protected $hidden = ['created_at', 'updated_at'];

    public function validate($data) {
        $rules = [            
            'company_id' => 'required',             
            'tarif' => 'required',            
        ];
        return \Validator::make($data, $rules);
    }    
    
    public function company() {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }
    
    
}
