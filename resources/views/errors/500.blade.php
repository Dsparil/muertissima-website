@extends('layout')

@section('title')
Muertissima - ERREUR
@endsection

@section('content')
<center>
    <h1>OOPS...</h1>
    <img src="{{ asset('images/whoops.jpg') }}" width="20%"/>
    <br />
    <br />
    <h2>C'est tout cassé...</h2>
    <p>On va dire que c'est la faute à la déesse Muertissima, elle a bon dos.</p>
    <p>Visitez <a href="https://muertissima.bandcamp.com/releases">notre Bandcamp</a>, en attendant que notre génie de webmaster nous corrige tout ça.</p>
</center>
<hr />
<pre>{{ $exception->getTraceAsString(); }}</pre>
@endsection