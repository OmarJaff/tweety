<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FollowController extends Controller
{
    public function store(User $user)
    {
        current_user()->toggleFollow($user);
        $message = current_user()->following($user->id) ? 'You followed '.$user->name : 'You unfollowed '.$user->name;
        Session::flash('follow', $message);

        return redirect()->back();
    }


    public function isFollowing(User $user)
    {
        return response()->json(current_user()->following($user->id) ? 'Unfollow' : 'follow');
    }
}
