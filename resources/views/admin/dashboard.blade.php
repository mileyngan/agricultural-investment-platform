<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="sidebar">
            <div class="profile">
                <img src="{{ asset('profile_picture.jpg') }}" alt="Profile Picture">
                <h4>{{ Auth::user()->name }}</h4>
                <a href="{{ route('profile') }}">Update Profile</a>
        </div>
            <ul>
                <li><a href="{{ route('admin.manage_projects') }}">Manage Projects</a></li>
                <li><a href="{{ route('admin.manage_users') }}">Manage Users</a></li>
                <li><a href="{{ route('firms.manage') }}">Manage Firms</a></li>
                <li><a href="{{ route('admin.manage') }}">Manage Admins</a></li>
                <li><a href="{{ route('admin.firmCreateForm') }}">Add New Firm</a></li>
            </ul>
        </div>
        <div class="main-body">
            <h2>Admin Dashboard</h2>
            <div class="dashboard-stats">
                <div class="stat-box">
                    <h3>Total Users</h3>
                    <p>{{ $totalUsers }}</p>
                </div>
                <div class="stat-box">
                    <h3>Total Projects</h3>
                    <p>{{ $totalProjects }}</p>
                </div>
                <div class="stat-box">
                    <h3>Total Investments</h3>
                    <p>${{ number_format($totalInvestments, 2) }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection