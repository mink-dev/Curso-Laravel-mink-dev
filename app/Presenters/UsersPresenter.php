<?php

namespace App\Presenters;
use App\User;

class UsersPresenter extends Presenter {

    // protected $user;

    // public function __construct(User $user){
    //     $this->user = $user;
    // }

    public function roles(){
       return  $this->model->roles->pluck('display_name')->implode('- ');
    }

    public function notes(){
       return ($this->model->note->body) ?? 'no tiene nota';
    }

    public function tags(){
        return ($this->model->tags->pluck('name')->implode(',')) ?? 'no tiene etiqueta';
    }


}