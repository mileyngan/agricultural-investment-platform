<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wom Invest</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
</head>
<body>
    <header>
        <nav class="navbar">
            <ul>
                @if (Auth::check())
                    @if (Auth::user() !== null)
                        @if (Auth::user()->role === 'investor')
                            <li><a href="{{ route('investor.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('investor.search') }}">Search Projects</a></li>
                            <li><a href="{{ route('investor.wallet') }}">Manage Wallet</a></li>
                        @elseif (Auth::user()->role === 'firm')
                            <li><a href="{{ route('firm.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('firm.create_project') }}">Create Project</a></li>
                        @elseif (Auth::user()->role === 'admin')
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('admin.manage_projects') }}">Manage Projects</a></li>
                            <li><a href="{{ route('admin.manage_users') }}">Manage Users</a></li>
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
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
</head>
    <!-- <footer>
        <p>&copy; 2023 Wom Invest</p>
    </footer> -->
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    
</script>

    <!-- Include JavaScript files -->
    @yield('scripts')
</body>

</html>