<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>
    <nav class="navbar navbar-light bg-pgreen mb-2">
        <div class="container mt-2 mb-2">
            <div class="input-group">
                <a href="/">
                    <div class="logo-btn mr-3">
                        <picture>
                            <source type="image/webp" srcset="{{ secure_asset('/i/misc/tom.webp') }}">
                            <img src="{{ secure_asset('/i/misc/tom.png') }}" alt="tom"/>
                        </picture>
                    </div>
                </a>

                <input id="search" type="text" class="form-control" placeholder="Search" aria-label="search" aria-describedby="search-addon">
                <div class="input-group-append">
                    <span class="input-group-text btn-info" id="search-addon"><i class="fas fa-search text-white" aria-hidden="true"></i></span>
                </div>

                @guest
                <a href="{{ route('login') }}">
                    <div class="btn btn-nook-secondary ml-3">{{ __('Login') }}</div>
                </a>
                @else
                <a href="/mybench">
                    <div class="btn btn-nook ml-3">MyBench</div>
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="btn btn-nook-secondary ml-1">
                        {{ __('Logout') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    </div>
                </a>
                @endguest
            </div>

            <div class="mt-2 mr-2">
                <button id="item-search" class="btn btn-nook mb-1" type="submit" name="item">Search by Item</button>
                <button id="material-search" class="btn btn-nook mb-1" type="submit" name="material">Search by Material</button>
                <button id="tag-search" class="btn btn-nook mb-1" type="submit" name="tag">Search by Tag</button>
                <button id="nav-category" class="btn btn-nook-secondary mb-1 dropdown-toggle" data-toggle="dropdown">Categories</button>
                <button id="nav-tag" class="btn btn-nook-secondary mb-1 dropdown-toggle" data-toggle="dropdown">Tags</button>
                <button id="nav-source" class="btn btn-nook-secondary mb-1 dropdown-toggle" data-toggle="dropdown">Sources</button>

                <div id="extended-nav-container">
                    <div id="nav-extended-category">
                        @foreach($categories as $category)
                            @if($category->category)
                                <button class="btn-sm btn-info mb-1" onclick='window.location="{{ $base_url }}/category/{{ strtolower($category->category) }}"'>{{ $category->category }}</button>
                            @endif
                        @endforeach
                    </div>

                    <div id="nav-extended-tag">
                        @foreach($tags as $tag)
                            @if($tag->tag)
                                <button class="btn-sm btn-info mb-1" onclick='window.location="{{ $base_url }}/tag/{{ strtolower($tag->tag) }}"'>{{ $tag->tag }}</button>
                            @endif
                        @endforeach
                    </div>

                    <div id="nav-extended-source">
                        @foreach($sources as $source)
                            @if($source->sources)
                                <button class="btn-sm btn-info mb-1" onclick='window.location="{{ $base_url }}/source/{{ strtolower($source->sources) }}"'>{{ $source->sources }}</button>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    @yield('pagination')

    <footer class="footer bg-pgreen pt-4">
        @include('layouts.footer')
    </footer>

    <script type="text/javascript">
        $("#search").on('keypress',function(e) {
            if(e.which === 13) {
                window.location = "{{ $base_url }}/browse/" + $("#search").val().toLowerCase();
            }
        });

        $("#search-addon").click(function() {
            window.location = "{{ $base_url }}/browse/" + $("#search").val().toLowerCase();
        });

        $("#item-search").click(function() {
            window.location = "{{ $base_url }}/browse/" + $("#search").val().toLowerCase();
        });

        $("#material-search").click(function() {
            window.location = "{{ $base_url }}/material/" + $("#search").val().toLowerCase();
        });

        $("#tag-search").click(function() {
            window.location = "{{ $base_url }}/tag/" + $("#search").val().toLowerCase();
        });

        $('#nav-category').click(function(){
            $('#nav-extended-category').toggleClass('visible');
            $('#nav-extended-tag').removeClass('visible');
            $('#nav-extended-source').removeClass('visible');
        });

        $('#nav-tag').click(function(){
            $('#nav-extended-tag').toggleClass('visible');
            $('#nav-extended-category').removeClass('visible');
            $('#nav-extended-source').removeClass('visible');
        });

        $('#nav-source').click(function(){
            $('#nav-extended-source').toggleClass('visible');
            $('#nav-extended-tag').removeClass('visible');
            $('#nav-extended-category').removeClass('visible');
        });
    </script>
</body>

</html>
