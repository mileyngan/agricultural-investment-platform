@extends('layouts.app')

@section('title', 'Affiliations')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Your Affiliations</h1>

    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <h2 class="text-2xl font-semibold mb-4">Request New Affiliation</h2>
        <form action="{{ route('affiliations.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="firm_name" class="block mb-2">Firm Name:</label>
                <input type="text" id="firm_name" name="firm_name" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Submit Request</button>
        </form>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-4">Your Affiliation Requests</h2>
        @if($affiliations->isEmpty())
            <p>You have no affiliation requests at this time.</p>
        @else
            <ul class="space-y-4">
                @foreach($affiliations as $affiliation)
                    <li class="border-b pb-4">
                        <p><strong>Firm Name:</strong> {{ $affiliation->firm_name }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($affiliation->status) }}</p>
                        <p><strong>Requested On:</strong> {{ $affiliation->created_at->format('M d, Y') }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
