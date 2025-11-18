<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function SignUp_show()
    {
        return view('SignUp');
    }

    public function Sign_up(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:3|same:password_confirmation',
            'phone_number' => 'required|string',
            'gender' => 'required|string|in:male,female',
        ], [
            'password.same' => 'Passwords do not match.',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone_number' => $validatedData['phone_number'],
            'gender' => $validatedData['gender'],
        ]);
        return redirect()->route('Login.show');
    }
    public function login_show()
    {
        return view('Login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            return redirect()->route('ListMovies');
        }
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }
}
