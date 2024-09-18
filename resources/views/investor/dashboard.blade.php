<!-- resources/views/investor/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class=" container">
        <div class="sidebar">
            <div class="profile">
                <img src="{{ asset('profile_picture.jpg') }}" alt="Profile Picture">
                <h4>{{ Auth::user()->name }}</h4>
                <a href="{{ route('profile') }}">Update Profile</a>
        </div>
            <ul>
                <li><a href="{{ route('investor.dashboard') }}">Your Investments</a></li>
            </ul>
        </div>
        <div class="main-body">
            <h2>Investor Dashboard</h2>
            <div class="dashboard-stats">
                <div class="stat-box">
                    <h3>Wallet Balance</h3>
                    @if (Auth::check())
                        @if (Auth::user() !== null)
                            <p>Balance: {{ Auth::user()->balance }}</p>
                        @endif
                    @endif
                </div>
                <div class="stat-box">
                    <h3>Active Projects</h3>
                    <p>{{ $activeProjects }}</p>
                </div>
            </div>
            <h3>Your Investments</h3>
            <table class="investment-table">
                <thead>
                    <tr>
                        <th>Project</th>
                        <th>Amount Invested</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($investments as $investment)
                    <tr>
                        <td>{{ $investment->project->title }}</td>
                        <td>${{ number_format($investment->amount, 2) }}</td>
                        <td>{{ ucfirst($investment->project->status) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection