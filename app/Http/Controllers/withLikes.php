<?php


namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Builder;

trait withLikes
{
    public function scopeWithReply(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likesNum, sum(!liked) dislikes from likes group by tweet_id'
            ,'likes', 'likes.tweet_id', 'tweets.id'
        );
    }
}
