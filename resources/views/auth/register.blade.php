@extends('layouts.app')

@section('content')
<div class="login-register-container">
    <div class="login-register-card">
        <div class="card-body d-flex">
            <div class="col-md-6 bg-green text-white p-4 d-flex flex-column justify-content-center">
                <h2 class="mb-4">Welcome to WOM Invest</h2>
                <p class="mb-4">Invest in your return</p>
                <a href="{{ route('login') }}" class="btn btn-outline-light mt-3">SIGN IN</a>
            </div>
            <div class="col-md-6 p-4">
    <h3 class="mb-4">Create Account</h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" required autofocus>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>
        <div class="form-group">
            <select name="type" class="form-control" required>
                <option value="">Select Account Type</option>
                <option value="{{ App\Enums\AccountType::INDIVIDUAL }}">Individual Investor</option>
                <option value="{{ App\Enums\AccountType::FIRM }}">Firm</option>
            </select>
            @if ($errors->has('type'))
                <span class="text-danger">{{ $errors->first('type') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-green btn-block">SIGN UP</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mt-3 text-center">
        <a href="{{ route('login') }}" class="text-green">Already have an account? Login</a>
    </div>
</div>
        </div>
    </div>
</div>
@endsection