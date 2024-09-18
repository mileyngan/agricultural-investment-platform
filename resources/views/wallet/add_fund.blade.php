<!-- resources/views/wallet/add_fund.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Funds</h1>
    <form action="{{ route('wallet.funds.store') }}" method="POST" class="add-fund-form">
        @csrf
        <div class="form-group">
            <label for="amount">Amount (FCFA)</label>
            <input type="number" id="amount" name="amount" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Payment Method</label>
            <div class="form-check">
                <input type="radio" id="orangeMoney" name="payment_method" value="orange_money" class="form-check-input" required>
                <label for="orangeMoney" class="form-check-label">Orange Money</label>
            </div>
            <div class="form-check">
                <input type="radio" id="mtnMoney" name="payment_method" value="mtn_money" class="form-check-input" required>
                <label for="mtnMoney" class="form-check-label">MTN Money</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add Funds</button>
    </form>
</div>

<style>
    .add-fund-form {
        max-width: 400px;
        margin: auto;
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        font-weight: bold;
    }
    .btn {
        width: 100%;
    }
</style>
@endsection