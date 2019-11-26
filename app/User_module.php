<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_module extends Model
{
    use SoftDeletes;

    public function module_name(){
        return $this->hasOne('App\Authentication_module', 'id', 'module_id');
    }


}
