<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class userPolicy
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

    public function edit(User $currentUser, User $user)
    {
        return $currentUser->is($user);
    }

    public function delete(User $currentUser, User $user) {
        return $currentUser->is($user);
    }

    public function canEditTweet($tweet)
    {
       return current_user()->id === $tweet;
    }
}
