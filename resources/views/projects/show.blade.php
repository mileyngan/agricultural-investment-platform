@extends('layouts.app')

@section('title', $project->name)

@section('content')
    <h1 class="text-3xl font-bold mb-6">{{ $project->name }}</h1>

    <div class="bg-white p-6 rounded-lg shadow">
        <p class="mb-4">{{ $project->description }}</p>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <strong>Target Amount:</strong> ${{ number_format($project->target_amount, 2) }}
            </div>
            <div>
                <strong>Current Amount:</strong> ${{ number_format($project->current_amount, 2) }}
            </div>
            <div>
            <strong>Start Date:</strong> {{ $project->start_date->format('M d, Y') }}
            </div>
            <div>
                <strong>End Date:</strong> {{ $project->end_date->format('M d, Y') }}
            </div>
        </div>
        <div class="mb-4">
            <div class="bg-gray-200 rounded-full h-4">
                <div class="bg-green-500 rounded-full h-4" style="width: {{ ($project->current_amount / $project->target_amount) * 100 }}%"></div>
            </div>
            <p class="text-center mt-2">{{ number_format(($project->current_amount / $project->target_amount) * 100, 2) }}% Funded</p>
        </div>
        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Invest in This Project</button>
    </div>
@endsection
