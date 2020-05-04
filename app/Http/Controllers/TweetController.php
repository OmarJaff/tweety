<?php

namespace App\Http\Controllers;

use App\Tweet;

use App\User;
use Illuminate\Http\Request;


class TweetController extends Controller
{

    public function index()
    {
        return \request()->match([
            'html' => function () {
                return view('tweets.index', ['tweets' => current_user()->timeline()]);
            },
            'json' => response()->json(['tweets' => current_user()->timeline()])
        ]);
    }

    public function store()
    {
        $attributes = \request()->validate([
            'body' => 'required|max:255'
        ]);
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        return redirect('/tweets');
    }
}
