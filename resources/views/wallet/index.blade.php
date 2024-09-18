@extends('layouts.app')

@section('title', 'Wallet')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Your Wallet</h1>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-4">Current Balance: ${{ number_format($wallet->balance, 2) }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-xl font-semibold mb-2">Add Funds</h3>
                <form action="{{ route('wallet.add') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="add_amount" class="block mb-2">Amount to Add:</label>
                        <input type="number" id="add_amount" name="amount" step="0.01" min="0.01" class="w-full p-2 border rounded" required>
                    </div>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add Funds</button>
                </form>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-2">Deduct Funds</h3>
                <form action="{{ route('wallet.deduct') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="deduct_amount" class="block mb-2">Amount to Deduct:</label>
                        <input type="number" id="deduct_amount" name="amount" step="0.01" min="0.01" class="w-full p-2 border rounded" required>
                    </div>
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Deduct Funds</button>
                </form>
            </div>
        </div>
    </div>
@endsection
