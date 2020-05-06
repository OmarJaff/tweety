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
    }


    public function isFollowing(User $user)
    {
        return response()->json(current_user()->following($user->id) ? 'Unfollow' : 'follow');
    }
}
