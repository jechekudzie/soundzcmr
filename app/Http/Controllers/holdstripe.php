<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Subscription;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;


class StripeController extends Controller
{

    public function create()
    {


        $user = Auth::user();

        $customer = '';
        $info = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'package_price' => 'required',
            'package_id' => 'required',
            'number' => 'required',
            'exp_month' => 'required',
            'cvc' => 'required',
            'exp_year' => 'required',
        ]);

        $package = Package::find($info['package_id']);

        $info['package'] = $package;
        session()->put('payment', $info);

        //$stripe = Stripe::make('sk_test_51LZ5jNDLrExrA4YtJs6dIV89H5extnldwElu8jZV2WwNCFBwVbk8vfCOMcLCbeAqofAv99t6hjToByBrLWvVe3bR00x8UNTeLf');
        $stripe = Stripe::make('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');

        /* $customer = $stripe->customers()->delete($user->stripe_id);
         dd($customer);*/

        //default always get all customers from stripe
        $customers = $stripe->customers()->all();

        if ($user->stripe_id == null) {
            $customer = $stripe->customers()->create([
                'name' => $user->name,
                'email' => $user->email,
            ]);

            $user->update([
                'stripe_id' => $customer['id']
            ]);
            $customer = $stripe->customers()->find($user->stripe_id);
        } else {
            $customer = $stripe->customers()->find($user->stripe_id);
        }


        //Check if user has cards associated in his account
        if ($stripe->cards()->all($user->stripe_id)) {
            //retrieve user cards, if none exists  add new one
            $cards = $stripe->cards()->all($user->stripe_id);
        } else {
            //create stripeToken
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $info['number'],
                    'exp_month' => $info['exp_month'],
                    'cvc' => $info['cvc'],
                    'exp_year' => $info['exp_year'],
                ],
            ]);
            //add card to user with source stripeToken
            $card = $stripe->cards()->create($user->stripe_id, $token['id']);
        }
        $charge = $stripe->charges()->create([
            'customer' => $user->stripe_id,
            'currency' => 'USD',
            'amount' => $info['package']->price,
            'description' => $package->name . ' plan',
        ]);


        if ($charge['status'] == 'succeeded') {
            $this->has_active_subscriptions($user);
            $subscription = Subscription::create([
                'user_id' => Auth::user()->id,
                'package_id' => $package->id,
                'package_price' => $package->price,
                'reference' => $charge['id'],
                'currency' => $charge['currency'],
                'amount_paid' => $charge['amount'],
                'app_fee' => $charge['application_fee'],
                'flutterwave_reference' => $charge['receipt_url'],
                'device_fingerprint' => $charge['source']['fingerprint'],
                'payment_type' => $charge['payment_method'],
                'is_active' => 1,
                'has_ads' => 0,
                'status' => $charge['status'],
                'expiry_date' => $expiry_date = Date('Y-m-d', strtotime('+' . $package->duration_days . ' days')),
            ]);

            $user->update([
                'is_subscribed' => 1
            ]);
            return redirect('/profile')->with('message', 'Your payment was successful. Welcome to SOUNDZCmr');
        } elseif ($charge['status'] == 'cancelled') {
            return redirect('/profile')->with('message', 'Sorry, we could not process the transaction. Transaction reference is ' . $charge['id']);

        } elseif ($charge['status'] == 'failed') {
            return redirect('/profile')->with('message', 'Sorry, we could not process the transaction. Transaction reference is ' . $charge['id']);

        } else {
            return redirect('/profile')->with('message', 'Sorry, we could not process the transaction. Transaction reference is ' . $charge['id']);

        }

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
