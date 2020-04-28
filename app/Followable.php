<?php


namespace App;


trait Followable
{
    public  function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public  function follows()
    {
        return $this->belongsToMany(User::class,
            'follows',
            'user_id',
            'following_user_id')
            ->withTimestamps('created_at','updated_at'); //this is how you define custom names for your pavit tables, here follows represents user table but we overrides the defaults.
    }

    public function toggleFollow(User $user) {

      return $this->follows()->toggle($user);
        }

    public function following($user)
    {
        return $this->follows()->where('following_user_id', $user)->exists();
    }
}
