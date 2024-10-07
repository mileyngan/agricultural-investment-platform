@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
<div class="container">
    <h2>Manage Projects</h2>
    <table class="project-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Firm</th>
                <th>Target Amount</th>
                <th>Current Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                
                {{-- Check if the user exists before trying to access the name --}}
                <td>{{ $project->user ? $project->user->name : 'No Firm Assigned' }}</td>
                
                <td>${{ number_format($project->target_amount, 2) }}</td>
                <td>${{ number_format($project->current_amount, 2) }}</td>
                <td>{{ ucfirst($project->status) }}</td>
                
                <td>
                    @if($project->status === 'pending')
                    <form action="{{ route('admin.approve_project', $project) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-small">Approve</button>
                    </form>
                    <form action="{{ route('admin.reject_project', $project) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-small btn-danger">Reject</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $projects->links() }}
</div>
@endsection