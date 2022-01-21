<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use kanalumaddela\LaravelSteamLogin\Http\Controllers\AbstractSteamLoginController;
use kanalumaddela\LaravelSteamLogin\SteamUser;

class SteamLoginController extends AbstractSteamLoginController
{
    /**
     * {@inheritdoc}
     */
    public function authenticated(Request $request, SteamUser $steamUser)
    {
        // auth logic goes here, below assumes User model with `steam_account_id` attribute
        
        $user = User::where('steam_account_id', $steamUser->accountId)->first();
        \Illuminate\Support\Facades\Auth::login($user);
    }
}
