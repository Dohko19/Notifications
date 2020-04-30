<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Notifications\PostPublished;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NotifyUserNewPost implements ShouldQueue
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
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $users = User::all(); //Filtro usuario que decidieron Recibir notificaciones
        Notification::send($users, new PostPublished($event->post));
    }
}