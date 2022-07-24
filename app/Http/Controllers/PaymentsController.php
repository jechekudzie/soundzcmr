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

        dd(request()->all());
        return view('subscription.checkout', compact('user','package'));
    }

}
