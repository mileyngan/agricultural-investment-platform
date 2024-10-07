<!-- resources/views/admin/manage-admins.blade.php -->
@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
<div class="container">
    <h2>Manage Admins</h2>
    <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">Add New Admin</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection