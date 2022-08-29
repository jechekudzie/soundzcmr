<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function show(User $user)
    {
        $current_plan = Subscription::where('user_id', $user->id)->where('is_active', 1)->first();
        return view('admin.users.show', compact('user', 'current_plan'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'user_role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'provider' => 'Email and Password',
            'email_verified_at' => NOW(),
            'is_subscribed' => 1,
        ]);

        $user->assignRole($request->user_role);


        return back()->with('message', 'User added successfully.');

    }

    public function edit(User $user)
    {
        $current_plan = Subscription::where('user_id', $user->id)->where('is_active', 1)->first();
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles', 'current_plan'));
    }

    public function update(User $user)
    {
        $user->update(request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],

        ]));
        $user->syncRoles(request()->user_role);

        return back()->with('message', 'User updated successfully.');

    }

    public function destroy(User $user)
    {
        $name = $user->name;
        $email = $user->email;
        $role = $user->getRoleNames();

        if ($user->subscriptions->count() >= 1) {
            $user->subscriptions->delete();
        }

        if ($role != null) {

            $user->syncRoles($role);
        }

        $user->delete();

        return redirect('/admin/users')->with('message', 'User ' . $name . ' with email ' . $email . '
        was successfully removed from the system with all his roles and subscriptions.');

    }

}
