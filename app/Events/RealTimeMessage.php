<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class RealTimeMessage implements ShouldBroadcast
{
    use SerializesModels;

    public string $message;
    public array $data;

    public function __construct(string $message, array $data)
    {
        $this->message = $message;
        $this->data = $data;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('events');
    }
}