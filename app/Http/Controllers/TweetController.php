<?php

namespace App\Http\Controllers;

use App\Tweet;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Policies\TweetPolicy;
use Illuminate\Support\Facades\Session;


class TweetController extends Controller
{
    public function index()
    {

        return \request()->match([
            'html' => function () {
                return view('tweets.index', ['tweets' => current_user()->timeline()]);
            },
            'json' => function() {
                return   response()->json(['tweets' => current_user()->timeline()]);
            }
        ]);
    }


    public function tweetdata()
    {
        return response()->json(['tweets' => current_user()->timeline()]);
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

    public function update(Tweet $tweet)
    {
        if (current_user()->can('update', $tweet)) {
            $attribute = \request()->validate([
                'body' => ['required', 'string']
            ]);

            $tweet->update($attribute);
        }
    }

    public function destory(Tweet $tweet)
    {
        if (current_user()->can('delete', $tweet)) {
            $tweet->where('id', $tweet->id)->delete();
        }
    }
}
