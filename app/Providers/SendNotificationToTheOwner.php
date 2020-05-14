<?php

namespace App\Providers;

use App\Providers\MessageWasReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;

class SendNotificationToTheOwner implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        $msg = $event->message;
        Mail::to('sergiofr1989@hotmail.com')->cc('anknet@hotmail.com')->send(new MessageReceived($msg));

    }
}
