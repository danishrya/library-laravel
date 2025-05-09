<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
{
    return view('auth.login'); // atau redirect ke login/dashboard sesuai kebutuhan
}
    /**
     * Show the login form.
     */
    public function showloginform()
    {
        return view('auth.login');
    }

    /**
     * Handle Login Request
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->sesssion()->regenerate();

            return redirect()->intended('dashboard');
        }
        
        return back()->withErrors([
            'email' => 'The Provided Credentials Do Not Match Our Records',
        ])->onlyInput('email');

    }

    /**
     * Show Registration Form.
     */
    public function showRegistrationForm(){
        return view('auth.register');
    }

    /**
     * Handel Regist Req.
     */
    public function register(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:member,librarian',
        ]);

        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Auth::login($user);
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat, silakan login.');
        
    }

    /**
     * Handle Log Out Req.
     */
    public function logout(request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}