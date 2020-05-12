<?php

namespace App\Presenters;

use App\Email;
use Illuminate\Support\HtmlString;
class EmailsPresenter extends Presenter{

   
    public function userName(){
        
        if($this->model->user_id){
            return  new HtmlString('<a href="'.route('users.show', $this->model->user_id).'">'.$this->model->user->name.'</a>');
        } 
        return $this->model->name;
    }

    public function userEmail(){
        if($this->model->user_id) return $this->model->user->email;
        return $this->model->email;
    }

    public function notes(){
        return  ($this->model->note->body) ?? 'no tiene nota';
    }
}
