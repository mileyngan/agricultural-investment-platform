@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
<div class="container">
    <h2>Project Advancement for "{{ $project->title }}"</h2>
    <p><strong>Status:</strong> {{ ucfirst($project->status) }}</p>
    <p><strong>Description:</strong> {{ $project->description }}</p>
    <p><strong>Target Amount:</strong> ${{ number_format($project->target_amount, 2) }}</p>
    <p><strong>Current Amount:</strong> ${{ number_format($project->current_amount, 2) }}</p>

    <!-- Chart Group Section -->
    <div class="chart-group my-4">
        <h4>Project Financial Overview</h4>
        <canvas id="projectChart" width="400" height="200"></canvas>
    </div>

    <!-- Document Upload Section -->
    <div class="upload-section my-4">
        <h4>Upload Daily Report</h4>
        <form action="{{ route('reports.upload', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="report">Select Document:</label>
                <input type="file" class="form-control" id="report" name="report" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload Report</button>
        </form>
    </div>

    <!-- Reports Access Section -->
    <div class="reports-access my-4">
    <h4>Uploaded Reports</h4>
    @if($project->reports->isEmpty()) <!-- Ensure $project->reports is not null -->
        <p>No reports have been uploaded yet.</p>
    @else
        <ul class="list-group">
            @foreach($project->reports as $report)
                <li class="list-group-item">
                    <a href="{{ asset('storage/reports/' . $report->file) }}" target="_blank">{{ $report->name }}</a>
                    <span class="float-right">{{ $report->created_at->format('d M Y') }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>

    <!-- Chat Section -->
    <div class="chat-section my-4">
        <h4>Chat</h4>
        <div class="chat-box">
            <div class="chat-messages">
                <!-- Example messages -->
                <div class="message investor">
                    <strong>Investor:</strong> How's the project progressing?
                </div>
                <div class="message firm">
                    <strong>Firm:</strong> We're on track and making good progress!
                </div>
            </div>
            <form class="chat-input" action="#" method="POST">
                <input type="text" class="form-control" placeholder="Type your message..." required>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('projectChart').getContext('2d');
    const projectChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Target Amount', 'Current Amount'],
            datasets: [{
                label: 'Financial Overview',
                data: [{{ $project->target_amount }}, {{ $project->current_amount }}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection