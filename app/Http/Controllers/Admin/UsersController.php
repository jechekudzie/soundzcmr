<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $current_plan = Subscription::where('user_id',$user->id)->where('is_active',1)->first();
        return view('admin.users.show', compact('user','current_plan'));
    }
}
