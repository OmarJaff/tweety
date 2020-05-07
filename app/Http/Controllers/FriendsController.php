<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function show(User $user) {
        $friends = current_user()->follows()->paginate(20);
        return \request()->match([
            'json' => response()->json($friends)
        ]);
    }
}
