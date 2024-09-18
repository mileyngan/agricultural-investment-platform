<!-- manage.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Manage Firms</h1>

<table>
    <thead>
        <tr>
            <th>Firm Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($firms as $firm)
            <tr>
                <td>{{ $firm->name }}</td>
                <td>{{ $firm->email }}</td>
                <td>
                    <a href="{{ route('firms.approve', $firm->id) }}" class="btn">Approve</a>
                    <a href="{{ route('firms.reject', $firm->id) }}" class="btn">Reject</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection