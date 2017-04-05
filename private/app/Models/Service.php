<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = ['company_id', 'pick_up', 'delivery', 'tarif', 'pol', 'thc_pol', 'pod', 'thc_pod', 'status'];
    protected $hidden = ['created_at', 'updated_at'];

    public function validate($data) {
        $rules = [            
            'company_id' => 'required',             

        ];
        return \Validator::make($data, $rules);
    }    
    
    
}
