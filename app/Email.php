<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Note;
use App\User;

class Email extends Model
{

    protected $fillable = [
        'name', 'email', 'subject','content'
    ];
   
    public function user(){
        return $this->belongsTo(User::class);
    }

    
    public function note(){ 
        return $this->morphOne(Note::class, 'notable');//hasOne one object and hasMany collection of objects
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
