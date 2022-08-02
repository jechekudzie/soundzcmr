<?php

namespace App\Http\Controllers;

use App\Models\Package;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use KingFlamez\Rave\Facades\Rave;

class FlutterwaveController extends Controller
{
    public function select_plan()
    {

        $user = Auth::user();
        $plans = Package::whereNotIn('id', [1])->get();
        return view('subscription.choose_plan', compact('user', 'plans'));
    }

    public function checkout(Package $package)
    {
        $user = Auth::user();

        if ($package->id == 1) {

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
            return view('subscription.check', compact('user', 'package'));
        }


    }

    //
    public function initialize()
    {
        $user = Auth::user();
        //This generates a payment reference
        $reference = Rave::generateReference();

        //collect data
        $info = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'package_price' => 'required',
            'package_id' => 'required',
        ]);

        $package = Package::find($info['package_id']);

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer,mobilemoneyfranco',
            'amount' => $info['package_price'],
            'email' => $info['email'],
            'tx_ref' => $reference,
            'currency' => "XAF",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => $info['email'],
                "phone_number" => $info['phone_number'],
                "name" => $info['name'],
            ],
            "customizations" => [
                "title" => $package->name . ' Plan',
                "description" => "20th October"
            ]
        ];


        $this->has_active_subscriptions($user);
        $subscription = Subscription::create([
            'user_id' => Auth::user()->id,
            'package_id' => $package->id,
            'package_price' => $package->price,
            'reference' => $reference,
        ]);

        $payment = Rave::initializePayment($data);

        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($payment['data']['link']);
    }

    public function callback()
    {
        $user = Auth::user();

        $status = request()->status;

        //if payment is successful
        if ($status == 'successful') {

            $transactionID = Rave::getTransactionIDFromCallback();
            $response = Rave::verifyTransaction($transactionID);

            $subscription = Subscription::where('reference', $response['data']['tx_ref'])->first();

            if ($subscription != null) {

                $package = Package::find($subscription->package_id);
                $subscription->update([
                    'currency' => $response['data']['currency'],
                    'amount_paid' => $response['data']['charged_amount'],
                    'app_fee' => $response['data']['app_fee'],
                    'flutterwave_reference' => $response['data']['flw_ref'],
                    'device_fingerprint' => $response['data']['device_fingerprint'],
                    'payment_type' => $response['data']['payment_type'],
                    'account_id' => $response['data']['account_id'],
                    'is_active' => 1,
                    'has_ads' => 0,
                    'status' => $response['status'],
                    'expiry_date' => $expiry_date = Date('Y-m-d', strtotime('+' . $package->duration_days . ' days')),

                ]);
                $user->update([
                    'is_subscribed' => 1
                ]);
                return redirect('/profile')->with('message', 'Your payment was successful. Welcome to Soundz cmr');
            } else {
                return redirect('/profile')->with('message', 'Sorry, we could not process the transaction, your reference number do not match our records');
            }


        } elseif ($status == 'cancelled') {
            $transactionID = Rave::getTransactionIDFromCallback();
            $response = Rave::verifyTransaction($transactionID);
            $subscription = Subscription::where('reference', $response['data']['tx_ref'])->first();
            $subscription->update([
                'status' => $response['status'],
            ]);
            return redirect('/profile')->with('message', 'Your payment was canceled.');
        } else {
            //Put desired action/code after transaction has failed here

            return redirect('/profile')->with('message', 'Your payment was either canceled or invalid card.');
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

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
