<?php

namespace App\Http\Controllers;

use App\Models\Channel;
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
            $user = Channel::updateOrCreate([
                'email' => $azureUser->email,
            ], [
                'azure_id' => $azureUser->id,
                'name' => $azureUser->name,
                'email' => $azureUser->email,
                'password' => $azureUser->password,
                'azure_token' => $azureUser->token,
                'azure_refresh_token' => $azureUser->refreshToken,
            ]);
            Auth::login($user);
            var_dump($user);
            return redirect()->intended(RouteServiceProvider::HOME)->with('status', 'You are well logged in !');
    }
}
