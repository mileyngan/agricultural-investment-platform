<!-- FirmCreateForm.blade.php -->

@extends('layouts.app')

@section('title', 'firmCreateForm')

@section('content')
<form method="POST" action="{{ route('firms.store', $user->id) }}" enctype="multipart/form-data">
    @csrf

    <!-- Firm information fields -->
    <div>
        <label for="firm_name">Firm Name:</label>
        <input type="text" id="firm_name" name="firm_name" required>
    </div>

    <div>
        <label for="firm_email">Firm Email:</label>
        <input type="email" id="firm_email" name="firm_email" required>
    </div>

    <!-- Default password field -->
    <div>
        <label for="default_password">Default Password:</label>
        <input type="password" id="default_password" name="default_password" required>
    </div>

    <!-- Document upload fields -->
    <div>
        <label for="document1">Document 1:</label>
        <input type="file" id="document1" name="document1" required>
    </div>

    <div>
        <label for="document2">Document 2:</label>
        <input type="file" id="document2" name="document2" required>
    </div>

    <!-- Submit button -->
    <button type="submit">Create Firm</button>
</form>
@endsection