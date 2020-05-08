<?php

namespace App\Http\Controllers;

use App\Providers\MessageWasReceived;
use App\Email;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MessageController extends Controller
{
    

    public function store(Request $request){

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

         Cache::flush();   
        //event(new MessageWasReceived($msg));
        
        
        $email = Email::create($request->all());
        
        if(auth()->check()){
           auth()->user()->emails()->save($email);
        }
       
        // $this->saveEmail();
        
        // return new MessageReceived($msg); //linea para verifica cuerpo y forma del correo enviado
        return back()->with('status','Recibimos tu mensaje, te responderemos en menos de 24 hrs.');
        
    }

}
