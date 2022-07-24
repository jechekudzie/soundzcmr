<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    //
    public function index()
    {
        $subscriptions = Subscription::all();
        $users = User::all();
        return view('admin.subscriptions.index', compact('users'));
    }

    public function show(Subscription $subscription)
    {
        return view('admin.subscriptions.show', compact('subscription'));
    }
}
