<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class BioController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json($user->bio);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @return void
     */
    public function update(User $user)
    {
        $attribute = \request()->validate([
            'bio' => ['required', 'string', 'max:210'],
        ]);

        $user->where('username', current_user()->username)->update($attribute);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(User $user)
    {
        $this->authorize('delete' , $user);

        $user->where('bio', current_user()->bio)->update(['bio' => null]);
    }
}
