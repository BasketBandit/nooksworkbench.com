<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>
    <nav class="navbar navbar-light bg-pgreen mb-2">
        <div class="container">
            <div class="input-group mt-2 ">
                <a href="/"><div class="logo-btn mr-3"><img src="{{ secure_asset('/img/i/misc/tom.png') }}" alt="tom"/></div></a>
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

            <div class="mt-3 mb-2 mr-2">
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

    <script src="{{ url('/js/'.$base_url.'search.js') }}" type="text/javascript"></script>
</body>

</html>
