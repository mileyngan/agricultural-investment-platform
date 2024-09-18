<!-- resources/views/investor/project.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $project->title }}</h2>
    <p>{{ $project->description }}</p>
    <div class="project-stats">
    <h3 style="color:white">
            @if (Auth::check())
                @if (Auth::user() !== null)
                    <p>Balance: {{ Auth::user()->wallet->balance }} FCFA</p>
                @endif
            @endif
        </h3><br><br>
        <div>Target Amount: ${{ number_format($project->target_amount, 2) }}</div>
        <div>Current Amount: ${{ number_format($project->current_amount, 2) }}</div>
        <div>Progress: {{ number_format(($project->current_amount / $project->target_amount) * 100, 2) }}%</div>
    </div>
    <form action="{{ route('investor.invest', $project) }}" method="POST" class="invest-form">
        @csrf
        <label for="amount">Investment Amount:</label>
        <input type="number" name="amount" min="1" step="0.01" required>
        <button type="submit">Invest</button>
    </form>
</div>
@endsection