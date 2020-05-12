<?php

namespace App\Repositories;
use App\Email;

class Emails implements EmailsInterface
{
    public function getPaginated(){
 
            return Email::with(['user', 'note', 'tags'])
                       ->orderBy('created_at', request('sorted', 'desc'))
                       ->paginate(10);
                   
    }

    public function store($request){

            if(auth()->check()){
        
                $msg = request()->validate([
                            'subject'=> 'required',
                            'content' => 'required|min:3'
                    ],
                    [
                            'name.required' => __('I need your name')
                    ]
                );

            }else{

                $msg = request()->validate([
                        'name' => 'required',
                        'email' => ['required', 'email'],
                        'subject'=> 'required',
                        'content' => 'required|min:3'
                    ],[
                        'name.required' => __('I need your name')
                        
                    ]
                );
            }
            
            $email = Email::create($request->all());
            
            if(auth()->check()){
            auth()->user()->emails()->save($email);
            }

           
            
            return $email;
        
    }

    public function findById($id){

        return  Email::findOrFail($id);
    }

    public function update($id, $request){

        $email = Email::findOrFail($id);
        $email->update($request->all());
        
    }

    public function destroy($id){
        $email = Email::findOrFail($id);
        $email->delete();
    }

}