<?php
 namespace App\Repositories;
 use Illuminate\Support\Facades\Cache;
// use App\Repositories\Emails;
use App\Repositories\EmailsInterface;

 class CacheEmails implements EmailsInterface {

    protected $emails;

    public function __construct(Emails $emails){

        $this->emails = $emails;

    }

    public function getPaginated(){

     
        $key = 'emails.all.'. request('page', 1); //por default si no hay valor la pagina sera 1
        return Cache::tags('emails')->rememberForever($key, function(){
           return $this->emails->getPaginated();
                
        });
    }

    public function store($request){
        $email = $this->emails->store($request);
        Cache::tags('emails')->flush();
        echo "store CacheEmails";
        return $email; 

    }

    public function findById($id){
        return Cache::rememberForever("email.{$id}", function() use($id) {
            return  $this->emails->findById($id);
        }); 
    }

    public function update($id, $request){
        $this->emails->update($id, $request);
        Cache::tags('emails')->flush();  
    }

    public function destroy($id){
        $this->emails->destroy($id);
        Cache::tags('emails')->flush();
    }



 }