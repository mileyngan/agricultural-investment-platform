<!-- resources/views/firm/create_project.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Project</h2>
    <form action="{{ route('firm.store_project') }}" method="POST">
        @csrf
        <div>
            <label for="title">Project Title:</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" required></textarea>
        </div>
        <div>
            <label for="target_amount">Target Amount:</label>
            <input type="number" name="target_amount" min="0" step="0.01" required>
        </div>
        <button type="submit" class="btn">Create Project</button>
    </form>
</div>
@endsection
