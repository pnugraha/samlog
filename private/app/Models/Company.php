<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = ['name', 'address', 'phone', 'pic1', 'hp1', 'email1', 'pic2', 'hp2', 'email2', 'npwp', 'type'];
    protected $hidden = ['created_at', 'updated_at'];

    public function validate($data) {
        $rules = [            
            'name' => 'required', 
            'address' => 'required', 
            'phone' => 'required', 
            'pic1' => 'required', 
            'hp1' => 'required', 
            'email1' => 'required:email',            
            'npwp' => 'required', 
            'type' => 'required',
            'email2' => 'email',  
        ];
        return \Validator::make($data, $rules);
    }    
    
    public function additionalcost() {       
        return $this->hasMany('App\Models\AdditionalCost');
    }    
    
}
