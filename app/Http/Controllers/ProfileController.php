<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Http;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public  function show(User $user)
    {
        return view('profiles.show', [
            'user'=>$user,
            'tweets'=>$user->tweets()->withLikes()->paginate(50)
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
            'username' => ['string','required','alpha_dash','max:255',
             Rule::unique('users')->ignore($user)],
            'avatar' => ['file'],
            'password' => ['required','string','min:8','max:255'],
            'email' => ['string', 'required', 'email','max:255', Rule::unique('users')->ignore($user)],
        ]);

      if(\request('avatar')) {

          $attributes['avatar'] = request('avatar')->store('avatars');

      }



      $user->update($attributes);

      return redirect($user->path());
    }
}
