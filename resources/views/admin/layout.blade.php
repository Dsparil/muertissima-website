<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/admin/crudobject.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/admin/jquery.ui.touch-punch.min.js') }}"></script>
        <title>
            @yield('title')
        </title>
    </head>
    <body>
        <div class="container-fuild mainContainer">
            <h1>Admin - @yield('title')</h1>
            @yield('content')
        </div>
    </body>
</html>