<!-- resources/views/firm/show_project.blade.php -->
@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
<div class="container">
    <h2>{{ $project->title }}</h2>
    <p>{{ $project->description }}</p>
    <div class="project-stats">
        <div>Target Amount: ${{ number_format($project->target_amount, 2) }}</div>
        <div>Current Amount: ${{ number_format($project->current_amount, 2) }}</div>
        <div>Progress: {{ number_format(($project->current_amount / $project->target_amount) * 100, 2) }}%</div>
        <div>Status: {{ ucfirst($project->status) }}</div>
    </div>
    <a href="{{ route('firm.edit_project', $project) }}" class="btn">Edit Project</a>
</div>
@endsection
