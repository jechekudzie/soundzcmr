<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Event;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $email = $request->email;

        $user  = User::where('email',$email)->first();

        if($user != null){
            if($user->provider == 'Email and Password'){
                $request->authenticate();

                $request->session()->regenerate();

                $user = Auth::user();

                if ($user->hasVerifiedEmail()) {
                    return redirect('dashboard');
                } else {
                    $request->user()->sendEmailVerificationNotification();
                    return redirect('verify-email');
                }

            }else{
                return back()->with('message','You registered using '.$user->provider. ', please choose the ' .$user->provider.
                    ' option below!');
            }
        }else{
            return back()->with('message','Your credentials do not match our records');
        }



    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
