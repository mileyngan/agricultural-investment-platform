@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
<div class="container">
    <h2>Manage Wallet</h2>

    {{-- Display success or error notifications --}}
    @if (session('success'))
    <script>
        toastr.success("{{ session('success') }}", "Success", {
            closeButton: true,
            progressBar: true,
            timeOut: 5000
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        toastr.error("{{ session('error') }}", "Error", {
            closeButton: true,
            progressBar: true,
            timeOut: 5000
        });
    </script>
    @endif

    <div class="wallet-balance">
        <h1 style="color:white">Current Balance</h1>
        <h3 style="color:white">
            @if (Auth::check() && Auth::user()->wallet)
                <p>Balance: {{ number_format(Auth::user()->wallet->balance, 2) }} FCFA</p>
            @else
                <p>Balance: 0.00 FCFA</p>
            @endif
        </h3>
    </div>

    <div class="wallet-actions">
        <form action="{{ route('investor.wallet.deposit') }}" method="POST" class="wallet-form">
            @csrf
            <label for="deposit_amount">Deposit Amount:</label>
            <input type="number" name="amount" min="1" step="0.01" required>
            <button type="submit">Deposit</button>
        </form>

        <form action="{{ route('investor.wallet.withdraw') }}" method="POST" class="wallet-form">
            @csrf
            <label for="withdraw_amount">Withdraw Amount:</label>
            <input type="number" name="amount" min="1" step="0.01" required>
            <button type="submit">Withdraw</button>
        </form>
    </div>

    <h3>Transaction History</h3>
    <table class="transaction-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
                <td>{{ ucfirst($transaction->type) }}</td>
                <td>${{ number_format($transaction->amount, 2) }}</td>
                <td>{{ ucfirst($transaction->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination links --}}
    {{ $transactions->links() }}
</div>
@endsection