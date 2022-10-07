<?php

declare(strict_types=1);

namespace App\Events\Cake;

use App\Models\Cake;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class CakeStockEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Request $request;

    public Cake $cake;

    public function __construct(Request $request, Cake $cake)
    {
        $this->request = $request;
        $this->cake = $cake;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
