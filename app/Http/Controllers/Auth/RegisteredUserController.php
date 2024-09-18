<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use App\Enums\AccountType;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'type' => ['required', 'in:'.AccountType::INDIVIDUAL.','.AccountType::FIRM],
        ]);

        if ($validatedData['type'] === AccountType::INDIVIDUAL) {
            // Create individual user and redirect to investor dashboard
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'role' => 'investor',
            ]);

            Wallet::create([
                'user_id' => $user->id,
                'balance' => 0,
            ]);

            Auth::login($user);

            return redirect()->route('investor.dashboard');
        } elseif ($validatedData['type'] === AccountType::FIRM) {
            // Create firm user and redirect to firm information form
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'role' => 'firm',
                'firm_pending' => true, // Flag to indicate firm information is pending
            ]);

            Wallet::create([
                'user_id' => $user->id,
                'balance' => 0,
            ]);

            Auth::login($user);

            return redirect()->route('firm.create', $user->id);
        }
    }
}