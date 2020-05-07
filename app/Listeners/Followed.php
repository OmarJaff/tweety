<?php

namespace App\Listeners;

use App\Events\FollowedUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Followed
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
     * @param  FollowedUser  $event
     * @return void
     */
    public function handle(FollowedUser $event)
    {
        //
    }
}
