<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     protected $table = 'role';
     protected $guarded = [];

      public function perName(){
        return $this->hasOne('App\Model\Permission', 'id', 'permision_id');
    }
}
