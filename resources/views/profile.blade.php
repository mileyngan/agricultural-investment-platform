
@extends('layouts.app')

@section('content')

<h1>Profile</h1>

<img src="{{ asset('profile_picture.jpg') }}" alt="Profile Picture">
<h4>{{ $user->name }}</h4>
<p>Email: {{ $user->email }}</p>

<!-- Profile Update Form -->
<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>

    <button type="submit" class="btn btn-primary">Update Profile</button>
</form>
@endsection