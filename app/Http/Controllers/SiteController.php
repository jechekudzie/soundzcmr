<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Event;
use App\Models\Nationality;
use App\Models\Package;
use App\Models\Subscription;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Stevebauman\Location\Facades\Location;


class SiteController extends Controller
{
    public function index(Request $request)
    {


        $ip = \Request::getClientIp();
        $user = Auth::user();
        $currentUserInfo = Location::get($ip);

        $events = Event::latest()->take(6)->get();
        $package = Package::find(1);

        if ($user->roles()->count() == 0) {
            return redirect('/update_role');
        }

        if ($user->is_subscribed == 0) {

            if ($currentUserInfo->countryName == 'Cameroon' && $currentUserInfo->countryCode == 'CM') {

                $this->has_active_subscriptions($user);

                Subscription::create([
                    'user_id' => Auth::user()->id,
                    'package_id' => $package->id,
                    'package_price' => $package->price,
                    'is_active' => 1,
                    'has_ads' => 1,
                    'expiry_date' => $expiry_date = Date('Y-m-d', strtotime('+' . $package->duration_days . ' days')),
                ]);

                $user->update([
                    'is_subscribed' => 1
                ]);

                return redirect('/profile')->with('message', 'You have successfully subscribed to our Free Plan, not that this will attract Ads and limited content view');
            } else {
                return redirect('/select_plan');
            }

        } else {
            return view('welcome', compact('events'));
        }

    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        $plans = Package::all();
        $countries = Nationality::all();
        $roles = \Spatie\Permission\Models\Role::whereIn('id', [3, 4])->get();

        $current_plan = Subscription::where('user_id', $user->id)->where('is_active', 1)->first();
        return view('customer.profile', compact('plans', 'user', 'roles', 'current_plan', 'countries'));


    }


    public function profile_update(User $user)
    {

        $data = request()->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'nationality_id' => 'required',
            'physical_address' => 'required',
        ]);

        $country = Nationality::find($data['nationality_id']);

        $user->update([
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'nationality_id' => $data['nationality_id'],
            'address' => $data['physical_address'],
        ]);

        return back()->with('message', 'Update was successful.');


    }

    public function update_role()
    {
        $user = Auth::user();
        $roles = Role::whereIn('id', [1, 2])->get();
        return view('customer.update_role', compact('roles', 'user'));
    }

    public function store_role(User $user)
    {
        $user = Auth::user();

        $user_role = request('user_role');

        $user->assignRole($user_role);

        return redirect('dashboard')->with('message', 'You account type has been updated, Please choose your subscription message.');
    }

    public function events()
    {
        $events = Event::paginate(6);

        return view('events.index', compact('events'));

    }

    public function event(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function event_episode(Episode $episode)
    {
        return view('events.event_episode', compact('episode'));

    }


    public function has_active_subscriptions($user)
    {

        $subscriptions = Subscription::where('user_id', $user->id)->get();
        if ($subscriptions->count() > 0) {
            $has_active_subscription = $subscriptions->last();
            if ($has_active_subscription->is_active == 1) {
                $has_active_subscription->update([
                    'is_active' => 0
                ]);
            }
            return;
        } else {
            return;
        }

    }


}
