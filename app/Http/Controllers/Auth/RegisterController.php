<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:240',
            'email' => 'required|string|min:2|max:240|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'address' => 'string',
            'phone_number' => 'required|integer',
            'terms' => 'required'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);
        event(new Registered($user));
        Auth::login($user);

        return redirect()->intended();
    }
}
