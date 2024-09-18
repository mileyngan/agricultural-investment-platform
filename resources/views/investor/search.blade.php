<!-- resources/views/investor/search.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Search Projects</h2>
    <form action="{{ route('investor.search') }}" method="GET" class="search-form">
        <input type="text" name="query" placeholder="Search projects...">
        <button type="submit">Search</button>
    </form>
    <div class="project-list">
        @foreach($projects as $project)
        <div class="project-card">
            <h3>{{ $project->title }}</h3>
            <p>{{ Str::limit($project->description, 100) }}</p>
            <div class="project-stats">
                <span>Target: ${{ number_format($project->target_amount, 2) }}</span>
                <span>Current: ${{ number_format($project->current_amount, 2) }}</span>
            </div>
            <a href="{{ route('investor.project', $project) }}" class="btn">View Project</a>
        </div>
        @endforeach
    </div>
    {{ $projects->links() }}
</div>
@endsection