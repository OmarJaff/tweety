<?php

namespace App\Policies;

use App\User;
use App\Tweet;
use Illuminate\Auth\Access\HandlesAuthorization;

class TweetPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public  function update(User $user, Tweet $tweet) {
        return $user->id === $tweet->user_id;
    }

    public function delete(User $user, Tweet $tweet) {
        return $user->id === $tweet->user_id;
    }
}
