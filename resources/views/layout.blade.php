<!doctype html>
<html>
    <head>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
            @yield('title')
        </title>
    </head>
    <body>
        <div class="row">
            <div class="col s12">
                @yield('header')
            </div>
        </div>
        @yield('content')
    </body>
</html>