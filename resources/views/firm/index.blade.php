<!-- resources/views/landing/index.blade.php
@extends('layouts.app')

@section('title', 'Welcome to WOM Invest')

@section('content')
<div class="jumbotron text-center bg-primary text-white">
    <h1 class="display-4">Welcome to WOM Invest</h1>
    <p class="lead">Empowering agricultural investments for a sustainable future</p>
    <hr class="my-4">
    <p>Connect with agricultural projects, invest in farms, and grow your wealth</p>
    <a class="btn btn-light btn-lg" href="{{ route('register') }}" role="button">Get Started</a>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">For Investors</h5>
                    <p class="card-text">Discover high-potential agricultural projects and diversify your portfolio.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Invest Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">For Agricultural Firms</h5>
                    <p class="card-text">Secure funding for your projects and connect with global investors.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">List Your Project</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Marketplace</h5>
                    <p class="card-text">Buy and sell agricultural products directly on our platform.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Explore Marketplace</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->