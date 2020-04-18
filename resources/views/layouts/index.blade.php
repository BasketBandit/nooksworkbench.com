<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Nook\'s Workbench')</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />

    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" sizes="192x192" href="{{ url('/css/style.css') }}">
    <meta name="theme-color" content="#212121">
    <meta name="description" content="Animal Crossing Crafting Catalog."/>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search text-white"aria-hidden="true"></i></span>
            </div>
            <input id="search" type="text" class="form-control" placeholder="Search" aria-label="search" aria-describedby="basic-addon1">
        </div>

        <div class="mt-3 mb-2 mr-2">
            <button id="recipe" type="submit" name="recipe" formaction="/recipe/" class="btn btn-primary">Recipe Search</button>
            <button id="material" type="submit" name="material" formaction="/material/" class="btn btn-primary">Material Search</button>
            @foreach($categories as $category)
                <button class="btn btn-light" onclick='window.location="/category/{{ $category->category }}"'>{{ $category->category }}</button>
            @endforeach
        </div>
    </nav>

    @yield('hero')

    <footer class="footer"><a href="https://docs.google.com/spreadsheets/d/1Hxrdp7oxtK-J5x9u1-rzChUpLtkv3t0_kNGdS6dtyWI/">Datasource</a></footer>

    <script>
        $("#recipe").click(function() {
            window.location = "/recipe/" + $("#search").val();
        });

        $("#material").click(function() {
            window.location = "/material/" + $("#search").val();
        });
    </script>
</body>

</html>
