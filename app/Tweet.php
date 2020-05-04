<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;

class Tweet extends Model
{
    use Likable;

    protected $fillable = ['user_id','body'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
