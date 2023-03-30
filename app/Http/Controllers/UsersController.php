<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Podcast;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.users', ['users' => $users]);
    }

    public function show(User $user)
    {

        return view('users.show', ['user' => $user] );
    }

    public function destroy(User $user)
    {
        $user->delete();

        return view('home')->with('message', 'User successfully deleted');
    }



}
