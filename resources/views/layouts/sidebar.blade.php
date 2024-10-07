@section('sidebar')
    <div class="sidebar">
    <div class="profile text-center mb-4">
    <img src="{{ Auth::user()->profile_picture ? asset(Auth::user()->profile_picture) : asset('images/qr-code-default.jpg') }}" 
         alt="Profile Picture" 
         class="rounded-circle mx-auto d-block mb-2" 
         style="width: 100px;">
    <h4>{{ Auth::user()->name }}</h4>
    <a href="{{ route('profile') }}">Update Profile</a>
</div>
        <ul class="list-unstyled">
            @if (Auth::check())
                @if (Auth::user() !== null)
                    @if (Auth::user()->role === 'investor')
                        <li><a href="{{ route('investor.dashboard') }}" class="d-block p-3"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a></li>
                        <li><a href="{{ route('investor.search') }}" class="d-block p-3"><i class="fas fa-search mr-2"></i> Search Projects</a></li>
                        <li><a href="{{ route('investor.wallet') }}" class="d-block p-3"><i class="fas fa-wallet mr-2"></i> Manage Wallet</a></li>
                    @elseif (Auth::user()->role === 'firm')
                        <li><a href="{{ route('firm.dashboard') }}" class="d-block p-3"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a></li>
                        <li><a href="{{ route('firm.create_project') }}" class="d-block p-3"><i class="fas fa-plus mr-2"></i> Create Project</a></li>
                    @elseif (Auth::user()->role === 'admin')
                        <li><a href="{{ route('admin.dashboard') }}" class="d-block p-3"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a></li>
                        <li><a href="{{ route('admin.manage_projects') }}" class="d-block p-3"><i class="fas fa-list mr-2"></i> Manage Projects</a></li>
                        <li><a href="{{ route('admin.manage_users') }}" class="d-block p-3"><i class="fas fa-users mr-2"></i> Manage Users</a></li>
                    @endif
                    <li><a href="#" class="marketplace-btn">Marketplace</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endif
            @else
            <!-- <li><a href="#" class="marketplace-btn">Marketplace</a></li> -->
            @endif
        </ul>
    </div>
@endsection