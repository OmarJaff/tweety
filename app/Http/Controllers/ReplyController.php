<?php

namespace App\Http\Controllers;

 use App\Reply;
use App\Tweet;
 use Illuminate\Database\Eloquent\Builder;
 use Illuminate\Http\Request;

class ReplyController extends Controller
{
    use withLikes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($tweetID)
    {
        $attribute = \request()->validate(['body'=>'required|max:255']);
        Reply::create([
             'user_id'=> auth()->id(),
             'tweet_id' => $tweetID,
             'body' => $attribute['body']
        ]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tweet $tweet)
    {
          return   \request()->match([
                'html' => function() use($tweet) {
                return view('tweets.replies.show', ['tweet'=>$tweet->id]);
                },
                'json' => function() use($tweet) {
                    return response()->json([
                        'tweet'=>$tweet,
                        'likes_count'=>$tweet->likesNumber()->count(),
                        'dislikes_count'=>$tweet->dislikes()->count(),
                        'user'=>$tweet->user,
                        'replies'=>$tweet->replies()->with(['user:id,name,username,avatar'])->latest()->paginate(20),
                        'replyNumber'=>$tweet->replies()->count(),

                    ]);
                }
            ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        if(current_user()->can('delete', current_user()))
        {
            $reply->where('id', $reply->id)->delete();
        }
    }
}
