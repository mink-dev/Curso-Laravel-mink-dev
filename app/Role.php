<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public function user(){
        return $this->hasOne(User::class);//devuleve un objeto de la relacion 
      //  return $this->hasMany(User::class); //devuelve un array de objetos de la relación

    }
}
