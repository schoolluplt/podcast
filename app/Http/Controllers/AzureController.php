<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class AzureController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('azure')->redirect();
    }

    public function callback()
    {
            $azureUser = Socialite::driver('azure')->user();
            $user = User::updateOrCreate([
                'email' => $azureUser->email,
            ], [
                'name' => $azureUser->name,
                'email' => $azureUser->email,
                'azure_id' => $azureUser->id,
            ]);
            Auth::login($user);
            return redirect()->intended(RouteServiceProvider::HOME)->with('status', 'You are well logged in !');
    }
}
