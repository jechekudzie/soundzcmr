<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    //
    public function redirectToProvider($provider)
    {
        //redirect to provider
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        //check data from facebook, google and apple
        $socialiteUser = Socialite::driver($provider)->user();
        

        //save user into local database, first check if user already exist
        $user = User::where('email', $socialiteUser->getEmail())->first();

        if ($user != null) {

            if($user->provider == $provider){
                auth()->login($user, true);
                //return to user dashboard based on their role
                return redirect('/dashboard');
            }else{
                return redirect('/')->with('message', 'It seems like you are trying to use ' . $provider . ',
                     but you registered with ' . $user->provider . '. Please use the ' . $user->provider . ' option.');
            }

        } else {
            $user = User::Create(
                [
                    'name' => $socialiteUser->getName(),
                    'email' => $socialiteUser->getEmail(),
                    'provider' => $provider,
                    'provider_id' => $socialiteUser->getId(),
                ]
            );
            auth()->login($user, true);
            //return to user dashboard based on their role
            return redirect('/dashboard');
        }

    }
}
