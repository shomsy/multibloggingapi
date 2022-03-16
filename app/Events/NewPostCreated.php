<?php

namespace App\Events;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewPostCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \App\Models\Post
     */
    public $post;
    /**
     * @var \App\Models\Website
     */
    public $website;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Post $post, Website $website)
    {
        $this->post = $post;
        $this->website = $website;
    }
}
