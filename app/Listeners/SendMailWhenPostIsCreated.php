<?php

namespace App\Listeners;

use App\Events\NewPostCreated;
use App\Models\Website;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMailWhenPostIsCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewPostCreated  $event
     *
     * @return void
     */
    public function handle(NewPostCreated $event)
    {
        $users = $event->website->subscriptions()->pluck('email')->toArray();
        $title = $event->post->title;
        $description = $event->post->description;
        $text = "New post with the title: $title and description: $description";

        Mail::raw(
            $text,
            function ($message) use ($users) {
                $message->from('admin@admin.com');
                $message->to($users);
                $message->subject('New Post Created');
            }
        );
    }
}
