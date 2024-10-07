@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">Admin Dashboard</h2>
            {{-- User specific actions can be added here, e.g., notifications --}}
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm h-100 bg-light">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h3 class="card-title text-info">Total Users</h3>
                        <p class="card-text display-4 text-dark">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm h-100 bg-light">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h3 class="card-title text-success">Total Projects</h3>
                        <p class="card-text display-4 text-dark">{{ $totalProjects }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm h-100 bg-light">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h3>Total Investments: ${{ number_format($totalInvestments, 2) }}</h3>
<h4>Investment List</h4>
<ul>
    @foreach($investments as $investment)
        <li>{{ $investment->name }}: ${{ number_format($investment->current_amount, 2) }}</li>
    @endforeach
</ul>
</div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3>Your Investments</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Amount Invested</th>
                            <th>Status</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection