@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-container">
    <!-- Collapsible Sidebar -->
    <aside class="sidebar" id="sidebar">
    <button id="sidebarToggle" class="sidebar-toggle">≡</button>
    <div class="sidebar-content">
        <div class="user-profile">
            <div class="profile-picture-container" onclick="showProfileModal()">
                @if(auth()->user()->profile_picture)
                    <img src="{{ auth()->user()->profile_picture }}" alt="Profile" class="profile-picture">
                @else
                    <img src="{{ asset('images/qr-code-default.jpg') }}" alt="Default Profile" class="profile-picture">
                @endif
            </div>
            <p class="username">{{ auth()->user()->name }}</p>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li><a href="#" class="nav-item">Dashboard</a></li>
                <li><a href="#" class="nav-item">My Projects</a></li>
                <li>
                    <a href="#" class="nav-item">Manage Wallet</a>
                    <ul class="submenu">
                        <li><a href="{{ route('add_fund') }}" class="nav-item sub-item">• Add Funds</a></li>
                        <li><a href="#" class="nav-item sub-item">• Deduct Funds</a></li>
                    </ul>
                </li>
                <li><a href="#" class="nav-item">Affiliations</a></li>
            </ul>
            <div class="user-info">
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
        </nav>
    </div>
</aside>


    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="main-header">
            <nav class="header-nav">
                <a href="#" class="nav-item active">Home</a>
                <a href="{{ route('about') }}" class="nav-item">About Us</a>
                <a href="{{ route('services') }}" class="nav-item">Services</a>
                <a href="{{ route('trainings') }}" class="nav-item">Trainings</a>
                <a href="#" class="nav-item">Marketplace</a>
            </nav>
        </header>

        <!-- Search and Balance -->
        <div class="search-balance-container">
            <div class="search-container">
                <input type="text" placeholder="Search projects..." class="search-input">
                <select class="search-filter">
                    <option value="all">All</option>
                    <option value="title">Title</option>
                    <option value="description">Description</option>
                    <option value="amount">Amount</option>
                </select>
            </div>
            <div class="balance">Balance: ${{ number_format(auth()->user()->balance, 2) }}</div>
        </div>

        <!-- Dashboard Content -->
        <main class="dashboard-content">
            <div class="content-box">
                <h2 class="section-title">Ongoing Projects</h2>
                <div class="projects-container">
                    @foreach($projects as $project)
                        <div class="project-card">
                            <h3 class="project-title">{{ $project->title }}</h3>
                            <p class="project-description">{{ Str::limit($project->description, 100) }}</p>
                            <div class="project-details">
                                <span class="project-amount">Amount: ${{ number_format($project->amount, 2) }}</span>
                                <span class="project-progress">
                                    @if ($project->target_amount != 0)
                                        Progress: {{ number_format(($project->current_amount / $project->target_amount) * 100, 2) }}%
                                    @else
                                        Progress: {{ $project->current_amount }} / N/A
                                    @endif
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="see-more">
                    <a href="#" class="see-more-link">See More</a>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="main-footer">
            <div class="footer-content">
                <p>&copy; 2024 Your Company Name. All rights reserved.</p>
                <div class="footer-links">
                    <a href="#" class="footer-link">About Us</a>
                    <a href="#" class="footer-link">Contact</a>
                    <a href="#" class="footer-link">Privacy Policy</a>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- Profile Modal -->
<div id="profileModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>User Profile</h2>
        <!-- Add profile information and edit functionality here -->
    </div>
</div>

@endsection

@section('scripts')
<script>
    // (Previous JavaScript code remains the same)
</script>
@endsection