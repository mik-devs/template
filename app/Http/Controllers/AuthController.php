<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Http\Request\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show login view.
     */
    public function loginView()
    {
        return view('login.main', [
            'layout' => 'login',
        ]);
    }

    /**
     * Authenticate login user.
     */
    public function login(LoginRequest $request)
    {
        if (! Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'email' => 'Wrong email or password.',
            ]);
        }

        // Prevent session fixation
        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    /**
     * Show register view.
     */
    public function showRegister()
    {
        return view('pages.register', [
            'layout' => 'login',
        ]);
    }

    /**
     * Register a new user and log them in.
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    /**
     * Logout user.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}