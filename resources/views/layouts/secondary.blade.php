<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>
    <nav class="mb-2 navbar navbar-light bg-pgreen">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="logo-btn text-left" src="{{ secure_asset('/img/i/misc/tom.png') }}" alt="tom"/>
            </a>
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
