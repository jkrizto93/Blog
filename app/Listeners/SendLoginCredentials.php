<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginCredentials;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class SendLoginCredentials
{
    

    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        //
        //dd($event->user->toArray(), $event->password);     
        Mail::to($event->user)->queue(
            new LoginCredentials($event->user, $event->password)
        );   
    }
}
