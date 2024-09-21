<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'iCATCH')</title>
    <link href="{{ asset('css/catalog/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/products/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</head>
<body class="bg-dark text-white">
<div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">iCATCH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 ml-3 mb-lg-0 ms-3">
                    <li class="nav-item">
                        <a class="btn btn-outline-success me-2" aria-current="page" href="{{ route('catalog.index') }}">CATALOG</a>
                        @can('create', \App\Models\Product::class)
                        <a class="btn btn-outline-success me-2" aria-current="page" href="{{ route('products.create') }}">ADD PRODUCT</a>
                        @endcan
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            City
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">1</a></li>
                            <li><a class="dropdown-item" href="#">2</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">3</a></li>
                        </ul>
                    </li>
                </ul>
                <form action="{{ route('search') }}" class="d-flex" role="search">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            @guest()
                <a href="{{ route('login') }}" class="btn btn-outline-success ms-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-success ms-2">Sign In</a>
            @endguest
            @auth()
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-success ms-2">Logout</button>
                </form>
            @endauth
        </div>
    </nav>
    @yield('content')
</div>


</body>
</html>
