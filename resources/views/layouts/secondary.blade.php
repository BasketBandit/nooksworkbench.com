<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>
    <nav class="navbar navbar-light bg-pgreen mb-2">
        <div class="container mt-2 mb-2">
            <a href="/">
                <div class="logo-btn mr-3">
                    <picture>
                        <source type="image/webp" srcset="{{ secure_asset('/i/misc/tom.webp') }}">
                        <img src="{{ secure_asset('/i/misc/tom.png') }}" alt="tom"/>
                    </picture>
                </div>
            </a>

            @auth
                <a href="/mybench">
                    <div class="btn btn-nook ml-3">MyBench</div>
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="btn btn-nook-secondary ml-1">
                        {{ __('Logout') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    </div>
                </a>
            @endauth
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer class="footer bg-pgreen pt-4">
        @include('layouts.footer')
    </footer>
</body>
</html>
