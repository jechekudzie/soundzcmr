<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    //


    public function create(Package $package)
    {
        $user = Auth::user();

        // This is your test secret API key.
        \Stripe\Stripe::setApiKey('sk_test_51LZ5jNDLrExrA4YtJs6dIV89H5extnldwElu8jZV2WwNCFBwVbk8vfCOMcLCbeAqofAv99t6hjToByBrLWvVe3bR00x8UNTeLf');

        try {
            // Create a PaymentIntent with amount and currency
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => 200,
                'currency' => 'usd',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            dd($output);
        } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

}
