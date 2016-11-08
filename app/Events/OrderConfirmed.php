<?php

namespace Mobishop\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderConfirmed
{
    use InteractsWithSockets, SerializesModels;

    public $email;
    public $cart;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email, $cart)
    {
        $this->email = $email;
        $this->cart = $cart;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
