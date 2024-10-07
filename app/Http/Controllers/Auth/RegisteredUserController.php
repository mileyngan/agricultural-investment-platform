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

    /**
     * Handle the registration process.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
 

     public function register(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'name' => 'required|string',
             'email' => 'required|email|unique:users',
             'password' => 'required|string|min:8|confirmed',
             'password_confirmation' => 'required|string|min:8',
             'type' => ['required', 'in:'.AccountType::INDIVIDUAL.','.AccountType::FIRM],
         ]);
         
         if ($validator->fails()) {
             return back()->withErrors($validator)->withInput();
         }
         
         // Create a new user based on the account type
         if ($request->input('type') === AccountType::INDIVIDUAL) {
             return $this->createIndividualUser ($request->all());
         } elseif ($request->input('type') === AccountType::FIRM) {
             return $this->createFirmUser ($request->all());
         }
     }
    /**
     * Create a new individual user.
     *
     * @param  array  $validatedData
     * @return void
     */
    private function createIndividualUser(array $validatedData)
    {
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
    }

    /**
     * Create a new firm user.
     *
     * @param  array  $validatedData
     * @return void
     */
    private function createFirmUser(array $validatedData)
    {
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