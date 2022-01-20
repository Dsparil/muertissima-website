<!DOCTYPE html>
<html>
    <head>
        <title>Fiche technique Muertissima</title>
        <style type="text/css">
            body {
                font-family: sans-serif;
            }
            .pageBreak {
                page-break-before: always;
            }
        </style>
    </head>
    <body>
        <img src="{{ public_path('images/logo-white.png') }}" width="100%" />

        <center>
            <br />
            <br />
            <h1>Fiche technique</h1>
            <p>générée le : {{ date('Y-m-d H:i:s') }}</p>
        </center>

        <div class="pageBreak"></div>

        <h1>Présentation générale</h1>
        {!! $datasheet->general_info !!}
        <h3>Membres</h3>
        <ul>
        @foreach($bandMembers as $member)
            <li><strong>{{ $member->name }}</strong> : {{ $member->instruments }}</li>
        @endforeach
        </ul>
        <h3>Staff et accompagnateurs</h3>
        {!! $datasheet->staff !!}
        <h3>Langue d'échange</h3>
        {!! $datasheet->languages !!}
        <br />
        <br />
        {!! $datasheet->networks !!}
    </body>
</html>