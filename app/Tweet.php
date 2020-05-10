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


}
