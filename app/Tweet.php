<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;
use App\Policies\TweetPolicy;

class Tweet extends Model
{
    use Likable;

    protected $fillable = ['user_id','body'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function likesNumber()
    {
        return $this->hasMany(Like::class)->where('liked', true);
    }

    public function dislikes()
    {
        return $this->hasMany(Like::class)->where('liked', false);
    }

}
