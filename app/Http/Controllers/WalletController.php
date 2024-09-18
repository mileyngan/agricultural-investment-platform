<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $transactions = Transaction::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('investor.wallet', compact('transactions'));
    }

    public function deposit(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);
    
        $amount = $validatedData['amount'];
        $user = Auth::user();
        $wallet = $user->wallet;
    
        if (!$wallet) {
            $wallet = $user->wallet()->create([
                'balance' => 0,
            ]);
        }
    
        // Update wallet balance
        $wallet->balance += $amount;
        $wallet->save();
    
        // Create transaction record
        Transaction::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'type' => 'deposit',
            'status' => 'completed',
        ]);
    
        // Set a success message in session
        session()->flash('success', 'Deposit successful!');
    
        return redirect()->route('investor.wallet');
    }
    

    public function withdraw(Request $request)
    {
        $amount = $request->validate([
            'amount' => 'required|numeric|min:1',
        ])['amount'];

        $user = Auth::user();

        if ($user->wallet->balance < $amount) {
            return back()->with('error', 'Insufficient funds in your wallet.');
        }

        $user->wallet->balance -= $amount;
        $user->wallet->save();

        Transaction::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'type' => 'withdrawal',
            'status' => 'completed',
        ]);

        return redirect()->route('investor.wallet')->with('success', 'Withdrawal successful!');
    }
}