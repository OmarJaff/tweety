<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Http;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {

        return \request()->match([
            'html' => function () use ($user) {
                return view('profiles.show', ['user' => $user, 'tweets' => $user->tweets()->withLikes()->paginate(50)]);
            },
            'json' => function () use ($user) {
                return response()->json(['tweets' => $user->tweets()->withLikes()->with(['user'])->with(['likes'])->paginate(50)]);
            }
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = \request()->validate([
            'name' => ['string', 'required', 'max:255'],
            'username' => ['string', 'required', 'alpha_dash', 'max:255',
                Rule::unique('users')->ignore($user)],
            'avatar' => ['file'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
        ]);

        if (\request('avatar')) {

            $attributes['avatar'] = request('avatar')->store('avatars');

        };
        $user->update($attributes);

        return redirect($user->path());
    }


    public
    function updateUserBio(User $user)
    {
        $this->authorize('edit', $user);

        $attribute = \request()->validate([
            'bio' => ['required', 'string', 'max:210'],
        ]);

        $user->where('username', current_user()->username)->update($attribute);

    }

    public function removeBio(User $user)
    {
        $this->authorize('delete' , $user);

        $user->where('bio', current_user()->bio)->update(['bio' => null]);

    }

    public function bio(User $user) {
        return response()->json($user->bio);
    }
}
