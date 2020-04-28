<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>
    <nav class="mb-2 navbar navbar-light bg-pgreen">
        <div class="container">
            <a href="/"><div class="logo-btn mr-3"><img src="{{ secure_asset('/img/i/misc/tom.png') }}" alt="tom"/></div></a>
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
