<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="author" content="Simon PERRIN (https://github.com/Dsparil)" />
        <meta name="copyright" content="Simon PERRIN"/>
        <meta name="robots" content="follow"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
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
            @if(isset($page))
                @include('partials.navbar', ['page' => $page])
            @endif
            @yield('content')
        </div>
    </body>
</html>