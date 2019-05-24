<?php

namespace App\Events;

use App\Model\Banneritem;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BanneritemDeleteEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $banneritem;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Banneritem $banneritem)
    {
        $this->banneritem=$banneritem;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
