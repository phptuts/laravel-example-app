<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerPage()
    {
        return view('users.register');
    }

    public function register(Request $request)
    {
        
        $userData = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);
        
        $userData['password'] = Hash::make($userData['password']);

        $user = User::create($userData);

        return redirect()->route('login.page')->with('success','You have successfully registered');
    }

    public function loginPage(Request $request)
    {
        return view('users.login');
    }

    public function login(Request $request)
    {
        $userData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $userData['email'])->first();

        if ($user && Hash::check($userData['password'], $user->password))
        {
            auth()->login($user);
            return redirect()->route('data.page')->with('success','You have logged in');
        }

        return redirect()->route('login')->with('error','Invalid Email or Password');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        return redirect()->route('login')->with('success','You have been logged out.');
    }
}
