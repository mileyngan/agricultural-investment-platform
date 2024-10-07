@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <h1 class="text-3xl font-bold mb-6">All Projects</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($projects as $project)
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-2xl font-semibold mb-2">{{ $project->name }}</h2>
                <p class="mb-4">{{ Str::limit($project->description, 150) }}</p>
                <div class="flex justify-between items-center">
                    <span>Target: ${{ number_format($project->target_amount, 2) }}</span>
                    <a href="{{ route('projects.show', $project) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">View Details</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
