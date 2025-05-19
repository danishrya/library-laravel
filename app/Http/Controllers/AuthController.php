<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function index()
    {
        // Check if the user is already logged in
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }
        
        // If not logged in, show the login page
        return view('auth.login');
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        // Redirect if already logged in
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }
        
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
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate(); // Regenerate session

            // Log for debugging
            Log::info('Login successful: ' . $request->email);

            return redirect()->route('dashboard.index'); // Redirect to dashboard
        }
        
        // Log for debugging
        Log::warning('Login failed for: ' . $request->email);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records',
        ])->withInput($request->except('password'));
    }

    /**
     * Show Registration Form.
     */
    public function showRegistrationForm()
    {
        // Redirect if already logged in
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }
        
        return view('auth.register');
    }

    /**
     * Handle Register Request.
     */
    public function register(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:member,librarian,admin',
        ]);

        try {
            $user = User::create([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            // Log for debugging
            Log::info('User registered successfully: ' . $request->email);

            Auth::login($user);
            return redirect()->route('dashboard.index')->with('success', 'Account created successfully and you are now logged in.');
        } catch (\Exception $e) {
            // Log for debugging
            Log::error('Error during registration: ' . $e->getMessage());
            
            return back()->withErrors([
                'error' => 'An error occurred while creating the account. ' . $e->getMessage()
            ])->withInput($request->except('password', 'password_confirmation'));
        }
    }

    /**
     * Handle Log Out Request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'You have successfully logged out.');
    }
}