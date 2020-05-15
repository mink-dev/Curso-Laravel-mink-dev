<?php

namespace App\Http\Controllers;

use App\Providers\MessageWasReceived;
use App\Email;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Repositories\Emails;
use App\Repositories\CacheEmails;


class MessageController extends Controller
{
    

    public function store(Request $request, CacheEmails $email){

    $msg = $email->store($request);

        //evento para enviar email
        event(new MessageWasReceived($msg));
   
        // $this->saveEmail();
        
       //  return new MessageWasReceived($msg); //linea para verifica cuerpo y forma del correo enviado
       return back()->with('status','Recibimos tu mensaje, te responderemos en menos de 24 hrs.');
        
    }

}
