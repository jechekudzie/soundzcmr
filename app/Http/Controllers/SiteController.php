<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Package;
use App\Models\Role;
use App\Models\Subscription;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    //

    public function index(Request $request)
    {

        $events = Event::all();
        if (Auth::user()->is_subscribed == 0) {
            return redirect('/select_plan');
        } else {
            return view('welcome', compact('events'));
        }

    }


    public function profile(Request $request)
    {
        $user = Auth::user();
        $plans = Package::all();
        $roles = Role::whereIn('id', [2, 3])->get();

        $current_plan = Subscription::where('user_id', $user->id)->where('is_active', 1)->first();

        return view('profile', compact('plans', 'user', 'roles', 'current_plan'));


    }

    public function update_role()
    {
        return view('update_role');
    }

    public function events()
    {
        $events = Event::all();
        return view('events', compact('events'));

    }

    public function event(Event $event)
    {
        return view('event_details', compact('event'));

    }


}
