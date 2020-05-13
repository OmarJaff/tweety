<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public  function  index()
    {
        return view('explor', [
                'users' => User::paginate(50)
        ]
        );
    }

    public function search()
    {
        $search = \request()->validate([
            'search' => 'required|max:20'
        ]);
        $users = User::where('name','LIKE', '%'.$search['search'].'%')->orWhere('username', 'LIKE', '%'.$search['search'].'%')->paginate(50);

        $users =  $users  ? $users : 'no results found';
        return view('explor', ['users' => $users, 'search' => $search]);

    }
}
