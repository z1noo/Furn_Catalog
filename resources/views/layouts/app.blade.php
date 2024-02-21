<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/styleApp.css') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Home') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
</head>
<body>
    <div id="app">
        <nav class="">
            <div class="container">
                <a class="" href="{{ route('index') }}">
                    Home
                </a>
                <div class="">
                    <a href="#" id="user-menu-toggle"><i class='bx bx-user'></i></a>
                </div>
                <div class="user-menu {{-- use a CSS class to hide this block initially --}}" id="user-menu">
                    @guest
                        @if (Route::has('login'))
                            <a class="user-menu-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="user-menu-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <a class="user-menu-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Add JavaScript to toggle the user menu -->
    <script>
        document.getElementById('user-menu-toggle').addEventListener('click', function() {
            document.getElementById('user-menu').classList.toggle('show');
        });
    </script>
</body>
</html>
