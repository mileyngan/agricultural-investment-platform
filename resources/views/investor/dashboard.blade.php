@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Your Dashboard</h2>
        {{-- User-specific actions can be added here, e.g., notifications --}}
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h3 class="card-title">Wallet Balance</h3>
                    <p class="card-text display-4 text-primary">
                        {{ number_format(Auth::user()->wallet->balance ?? 0, 2) }} FCFA
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h3 class="card-title">Active Projects</h3>
                    <p class="card-text display-4 text-success">{{ $activeProjects }}</p>
                </div>
            </div>
        </div>

        {{-- More dashboard stat cards can be added here --}}
    </div>

    <div class="card shadow-sm">
        <div class="card-header">
            <h3>Your Investments</h3>
        </div>
        <div class="card-body">
            @if($investments->isEmpty())
                <p class="text-center">You have no investments yet.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Amount Invested</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($investments as $investment)
                            <tr>
                                <td>{{ $investment->project->title }}</td>
                                <td>${{ number_format($investment->amount, 2) }}</td>
                                <td>
                                    @switch($investment->project->status)
                                        @case('pending')
                                            <span class="badge badge-warning">Pending</span>
                                            @break
                                        @case('active')
                                            <span class="badge badge-success">Active</span>
                                            @break
                                        @default
                                            <span class="badge badge-secondary">{{ ucfirst($investment->project->status) }}</span>
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('projects.advancement', $investment->project->id) }}" class="btn btn-info btn-sm">View Advancement</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection