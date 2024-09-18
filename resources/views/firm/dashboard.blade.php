<!-- resources/views/firm/dashboard.blade.php -->

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
                <li><a href="{{ route('firm.create_project') }}">Create New Project</a></li>
                <li><a href="{{ route('firm.projects') }}">Your Projects</a></li>
            </ul>
        </div>
        <div class="main-body">
            <h2>Firm Dashboard</h2>
            <h3>Your Projects</h3>
            <div class="project-list">
                @foreach($projects as $project)
                <div class="project-card">
                    <h4>{{ $project->title }}</h4>
                    <p>{{ Str::limit($project->description, 100) }}</p>
                    <div class="project-stats">
                        <span>Target: ${{ number_format($project->target_amount, 2) }}</span>
                        <span>Current: ${{ number_format($project->current_amount, 2) }}</span>
                        <span>Status: {{ ucfirst($project->status) }}</span>
                    </div>
                    <a href="{{ route('firm.show_project', $project) }}" class="btn">View Details</a>
                    <a href="{{ route('firm.edit_project', $project) }}" class="btn">Edit Project</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection