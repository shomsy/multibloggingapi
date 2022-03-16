<?php

namespace App\Listeners;

use App\Events\NewPostCreated;
use App\Models\Website;
use App\Notifications\SendEmailToAllUsersOfTheWebsiteNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

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
        $title = $event->post->title;
        $description = $event->post->description;
        $text = "New post with the title: $title and description: $description";

        $event->website->subscriptions()->each(function ($user) use ($text) {
            $user->notify(new SendEmailToAllUsersOfTheWebsiteNotification($text));
        });
    }
}
