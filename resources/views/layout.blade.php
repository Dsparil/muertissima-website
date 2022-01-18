<!doctype html>
<html>
    <head>
        <script src="{{ asset('js/app.js') }}"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
            @yield('title')
        </title>
    </head>
    <body>
        <div class="container mainContainer">
            <div class="row">
                <div class="col">
                    @yield('header')
                </div>
            </div>
                    <nav class="navbar navbar-expand-lg navbar-dark navBackground">

                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navissima" aria-controls="navissima" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navissima">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link{{ $page == 'home'? ' active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link{{ $page == 'shows'? ' active' : '' }}" href="{{ route('shows') }}">Shows</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Music</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://muertissima.bandcamp.com/merch">Shop</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
            @yield('content')
        </div>
    </body>
</html>