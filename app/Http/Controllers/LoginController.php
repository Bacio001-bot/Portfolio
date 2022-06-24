<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
     /**
     * Redirect the user to the Github authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function githubRedirect()
    {

        // Redirect to github login.
        return Socialite::driver('github')
        ->redirect();

    }

    /**
     * Obtain the user information from Github.
     *
     * @return \Illuminate\Http\Response
     */
    public function githubCallback(Request $request)
    {

        // Retrieve github info from login.
        $github = Socialite::driver('github');

        // Retrieve user by email or create it with the name, email attributes...
        $user = User::firstOrCreate(
            ['email' => $github->user()->email],
            ['name' => $github->user()->user["login"], 'picture' => null]
        );

        if($user) {
            Auth::login($user, true);
            return redirect()->route('dashboard');
        }
        
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function googleRedirect()
    {        
        
        // Redirect to google login.
        return Socialite::driver('google')
        ->redirect();

    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function googleCallback(Request $request)
    {

        // Retrieve google info from login.
        $google = Socialite::driver('google');

        // Retrieve user by email or create it with the name, email attributes...
        $user = User::firstOrCreate(
            ['email' => $google->user()->email],
            ['name' => $google->user()->name, 'picture' => null]
        );

        if($user) {
            Auth::login($user, true);
            return redirect()->route('dashboard');
        }

    }

    /**
     * Redirect the user to the Discord authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function discordRedirect()
    {

        // Redirect to discord login.
        return Socialite::driver('discord')
        ->redirect();

    }

    /**
     * Obtain the user information from Discord.
     *
     * @return \Illuminate\Http\Response
     */
    public function discordCallback(Request $request)
    {

        // Retrieve discord info from login.
        $discord = Socialite::driver('discord');

        // Retrieve user by email or create it with the name, email attributes...
        $user = User::firstOrCreate(
            ['email' => $discord->user()->email],
            ['name' => $discord->user()->user["username"], 'picture' => null]
        );
        
        if($user) {
            Auth::login($user, true);
            return redirect()->route('dashboard');
        }

    }

}
