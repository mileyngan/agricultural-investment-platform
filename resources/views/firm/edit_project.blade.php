<!-- resources/views/firm/edit_project.blade.php -->
@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
<div class="container">
    <h2>Edit Project: {{ $project->title }}</h2>
    <form action="{{ route('firm.update_project', $project) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Project Title:</label>
            <input type="text" name="title" value="{{ $project->title }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" required>{{ $project->description }}</textarea>
        </div>
        <div>
            <label for="target_amount">Target Amount:</label>
            <input type="number" name="target_amount" min="0" step="0.01" value="{{ $project->target_amount }}" required>
        </div>
        <button type="submit" class="btn">Update Project</button>
    </form>
</div>
@endsection