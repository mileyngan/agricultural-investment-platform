
@extends('layouts.app')

@section('content')

<h1>Firm Registration</h1>

<form method="POST" action="{{ route('firm.store') }}">
    @csrf

    <div>
        <label for="firm_name">Firm Name:</label>
        <input type="text" id="firm_name" name="firm_name" required>
    </div>

    <div>
        <label for="firm_email">Firm Email:</label>
        <input type="email" id="firm_email" name="firm_email" required>
    </div>

    <div>
        <label for="default_password">Default Password:</label>
        <input type="password" id="default_password" name="default_password" required>
    </div>

    <div>
        <label for="document1">Document 1:</label>
        <input type="file" id="document1" name="document1" required>
    </div>

    <div>
        <label for="document2">Document 2:</label>
        <input type="file" id="document2" name="document2" required>
    </div>

    <button type="submit">Register Firm</button>
</form>
@endsection