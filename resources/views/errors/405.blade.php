@extends('layout')

@section('title')
Muertissima - ERREUR
@endsection

@section('content')
<center>
    <h1>Bien tenté !</h1>
    <h2>Mais ce n'est pas le bon easter egg !</h2>
    <img src="{{ asset('images/magicword.png') }}" width="40%"/>
    <br />
    <br />
    <h2>Cependant...</h2>
    <p>Si tu as trouvé celui-là, c'est déjà pas mal !</p>
    <p>La réponse à tout le reste se trouve quelque part, dans le Javascript...</p>
</center>
<hr />
@endsection