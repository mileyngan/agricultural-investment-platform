<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wom Invest</title>
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
</head>
<body>
    <div class="wrapper">
        <div class="row">
            @if (!request()->is('login') && !request()->is('register') && !request()->is('/') && !request()->is('create'))
                <div class="col-md-3 sidebar-section">
                    <div class="sidebar">
                        @yield('sidebar')
                    </div>
                </div>
                <div class="col-md-9 main-content-section">
                    @yield('content')
                </div>
            @else
                <div class="col-md-12 main-content-section">
                    @yield('content')
                </div>
            @endif
        </div>
    </div> 
    
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>