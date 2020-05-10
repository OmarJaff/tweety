<?php

namespace App;

use App\Policies\userPolicy;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Gate;

class User extends Authenticatable
{
    use Notifiable, Followable, Likable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','avatar','name', 'email', 'password','bio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public  function  timeline()
    {
        $friends = $this->follows()->pluck('id');
         return Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)->withLikes()->with(['user:id,username,avatar,name','likes:id,user_id,tweet_id,liked'])
            ->latest()->paginate(50);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function getAvatarAttribute($value)
    {
        return asset($value ? 'storage/' . $value : 'images/default-avatar.png');
    }

    public function  setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    public function path($append = '')
    {
        $path = route('profile', $this->username);
        return $append ? "{$path}/{$append}" : $path;
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function canEdit($user) {
        $response = Gate::allows('edit', $user);
        if($response) {
            return true;
        }
        return false;
    }

}
