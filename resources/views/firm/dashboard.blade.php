@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
<div class="container">
    <h2>Firm Dashboard</h2>
    
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h3 class="card-title">Total Projects</h3>
                    <p class="card-text display-4 text-success">{{ $totalProjects }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h3 class="card-title">Total Investments</h3>
                    <p class="card-text display-4 text-info">${{ number_format($totalInvestments, 2) }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h3 class="card-title">Wallet Balance</h3>
                    <p class="card-text display-4 text-primary">{{ Auth::user()->wallet->balance }} FCFA</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3>Your Projects</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Target Amount</th>
                        <th>Status</th>
                        <th>Action</th> <!-- New Action Column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->description }}</td>
                            <td>${{ number_format($project->target_amount, 2) }}</td>
                            <td>
                                @switch($project->status)
                                    @case('pending')
                                        <span class="badge badge-warning">Pending</span>
                                        @break
                                    @case('active')
                                        <span class="badge badge-success">Active</span>
                                        @break
                                    @default
                                        <span class="badge badge-secondary">{{ ucfirst($project->status) }}</span>
                                @endswitch
                            </td>
                            <td>
                                <a href="{{ route('projects.advancement', $project->id) }}" class="btn btn-info btn-sm">View Advancement</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection