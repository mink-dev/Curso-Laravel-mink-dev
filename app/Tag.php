<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected  $fillable = ['name'];

    public function email(){
        return $this->morphedByMany(Email::class, 'taggable');
    }

    public function user(){
        return $this->morphedByMany(User::class, 'taggable');
    }
}
