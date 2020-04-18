<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Nook\'s Workbench')</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/pagination.css') }}" />

    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <meta name="theme-color" content="#212121">
    <meta name="description" content="Information about all of your favourite crafting recipes."/>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163890400-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-163890400-1');
    </script>
</head>

<body>
    <nav class="mb-2 navbar navbar-light bg-pgreen">
        <div class="input-group mt-2 ">
            <a href="/"><div class="logo-btn mr-3"><img src="{{ asset('/img/i/misc/tom.png') }}" alt="tom"/></div></a>
            <input id="search" type="text" class="form-control" placeholder="Search" aria-label="search" aria-describedby="search-addon">
            <div class="input-group-append">
                <span class="input-group-text btn-info mr-5" id="search-addon"><i class="fas fa-search text-white"aria-hidden="true"></i></span>
            </div>
        </div>

        <div class="mt-3 mb-2 mr-2">
            <button id="recipe" type="submit" name="recipe" formaction="/recipe/" class="btn btn-dark mb-1">Search by Recipe</button>
            <button id="material" type="submit" name="material" formaction="/material/" class="btn btn-dark mb-1">Search by Material</button>
            @foreach($categories as $category)
                <button class="btn btn-info mb-1" onclick='window.location="/category/{{ strtolower($category->category) }}"'>{{ $category->category }}</button>
            @endforeach
        </div>
    </nav>

    <script>
        $("#recipe").click(function() {
            window.location = "/recipe/" + $("#search").val().toLowerCase();
        });

        $("#basic-addon1").click(function() {
            window.location = "/recipe/" + $("#search").val().toLowerCase();
        });

        $("#material").click(function() {
            window.location = "/material/" + $("#search").val().toLowerCase();
        });
    </script>

    @yield('content')

    <footer class="footer bg-pgreen pt-4">
        <div class="container-fluid text-center bg-pgreen">
            <div class="row text-center">
                <div class="w-100">
                    <p>
                        <a href="https://github.com/BasketBandit"><img class="social-btn" src="{{ asset('/img/i/social/github.png') }}"/></a>
                        <a href="https://www.linkedin.com/in/jmh79/"><img class="social-btn" src="{{ asset('/img/i/social/linkedin.png') }}"/></a>
                        <a href="https://discord.gg/4Tx6G3p"><img class="social-btn" src="{{ asset('/img/i/social/discord.png') }}"/></a>
                    </p>

                </div>
            </div>
        </div>

        <div class="text-center py-3 bg-pgreen">
            <p>Nooksworkbench is a fan-made website and is in no way affiliated with Nintendo.</p>
            Created by <a href="https://github.com/BasketBandit" target="_blank"><u>Joshua Hunt</u></a> |
            <a href="https://docs.google.com/spreadsheets/d/1Hxrdp7oxtK-J5x9u1-rzChUpLtkv3t0_kNGdS6dtyWI/" target="_blank">Data Source</a>
        </div>
    </footer>
</body>

</html>
