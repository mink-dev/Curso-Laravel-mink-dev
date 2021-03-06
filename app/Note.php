<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Email;

class Note extends Model
{

    protected $fillable = ['body'];

    public function notable(){
        return $this->morphTO();
    }
}
