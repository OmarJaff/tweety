<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public  function show(User $user)
    {
        return view('profiles.show', compact('user'));
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
            'email' => ['string', 'required', 'email','max:255', Rule::unique('users')->ignore($user)],
            'password' => ['string','required', 'min:8' ,'max:255' , 'confirmed']
        ]);
      $user->update($attributes);
      return redirect($user->path());
    }
}
