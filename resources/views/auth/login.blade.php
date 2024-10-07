@extends('layouts.app')

@section('content')
<div class="login-register-container">
    <div class="login-register-card">
        <div class="card-body d-flex">
            <div class="col-md-6 bg-green text-white p-4 d-flex flex-column justify-content-center">
                <h2 class="mb-4">Welcome to WOM Invest</h2>
                <p class="mb-4">Invest in your return</p>
                <a href="{{ route('register') }}" class="btn btn-outline-light mt-3">SIGN UP</a>
            </div>
            <div class="col-md-6 p-4">
    <h3 class="mb-4">Sign In</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
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
        <button type="submit" class="btn btn-green btn-block">SIGN IN</button>
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
        <a href="{{ route('password.request') }}" class="text-green">Forgot your password? </a>
    </div>
</div>
        </div>
    </div>
</div>
@endsection