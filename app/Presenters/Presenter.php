<?php 

namespace App\Presenters;

use Illuminate\Database\Eloquent\Model;

abstract class Presenter//solo se puede extender no se puede instanciar
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

}