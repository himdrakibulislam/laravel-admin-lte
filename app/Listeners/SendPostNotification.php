<?php

namespace App\Listeners;

use App\Events\PostProcessed;
use App\Mail\postMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendPostNotification
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
     * @param  \App\Events\PostProcessed  $event
     * @return void
     */
    public function handle(PostProcessed $event)
    {
        // Mail::to(Auth::user()->email)->send(new postMail($event->post));
    }
}
