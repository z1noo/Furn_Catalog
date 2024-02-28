    <div class="">
        <a href="#" id="user-menu-toggle"><i class='bx bx-user'></i></a>
    </div>
    <div class="user-menu d-none" id="user-menu-container">
        @auth
            <span>{{ Auth::user()->name }}</span>
            <a class="user-menu-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        @endauth
    
        @guest
            <a class="user-menu-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            <a class="user-menu-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endguest
    </div>
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>