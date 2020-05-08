<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //Por defecto eloquent toma el nombre del modelo lo convierte en minusculas y plural
     
    //En caso contrario podemos definir la tabla
     protected $table = 'projects';
    
    //Le decimos al modelo cuales son los campos que queremos insertar masivamenter
    //protected $fillable = ['title', 'url', 'description']; 
      protected $guarded=[];

     public function getRouteKeyName()
     {
         return 'url';
     }
}
