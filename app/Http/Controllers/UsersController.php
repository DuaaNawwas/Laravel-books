<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Auth\Events\Registered;

class UsersController extends Controller
{
    // Show Register Form
    public function create()
    {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        // $formFields['password'] = bcrypt($formFields['password']);
        $formFields['password'] = Hash::make($formFields['password']);

        // Create user
        $user = User::create($formFields);

        // Create a Registration Event for Email Verification
        event(new Registered($user));

        // Login
        auth()->login($user);

        // return redirect()->intended('/');
        return redirect('/email/verify');
    }


    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


    //  Show Login Form
    public function login()
    {
        return view('users.login');
    }

    // Login User
    public function authenticate(Request $request)
    {
        // dd($request->all());

        // if ($request->remember ?? false) {
        //     $remember = true;
        // } else {

        //     $remember = false;
        // }

        $remember = $request->has('remember') ? true : false;

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (Auth::attempt($formFields, $remember) && Gate::authorize('admin')) {
            $request->session()->regenerate();

            // return redirect('/');
            return redirect()->intended('/dashboard');
        } else {
            $request->session()->regenerate();

            // return redirect('/');
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
