<?php

namespace App\Providers;

use App\Providers\MessageWasReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;

class SendAutoresponder
{
    /**
     * Create the event listener.
     *
     * @return void
     */
  

    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        $msg = $event->message;
        Mail::to('sergiofr1989@hotmail.com')->queue(new MessageReceived($msg));
            
    }
}
