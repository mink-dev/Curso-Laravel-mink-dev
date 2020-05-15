<?php

namespace App\Providers;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class MessageWasReceived implements ShouldBroadcast //indicamos que laravel emitira este evento por un canal pusher o redis
{
    public $message;
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {    
        $this->message = $message;
      
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {   
        //un canal puede tener varios eventos y este puedes ser privado o publico 
        //canal private
        //return new PrivateChannel('channel-name'); //
    
        //canal publico 
        return new Channel('emails-name'); //
    
    
    }
}
