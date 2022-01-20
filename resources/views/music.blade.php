@extends('layout')

@section('title')
Muertissima - Music
@endsection

@section('header')
<div class="row">
    <div class="col s12 text-center">
        <img class="header" src="{{ asset('images/logo.jpg') }}" />
    </div>
</div>
@endsection

@section('content')
<h1>Vidéos officielles</h1>
<div class="row">
    <div class="col-lg-8">
        <iframe width="100%" height="400" src="https://www.youtube.com/embed/videoseries?list=PLw7pVxcIGgTxnwtTtMO_I-jtopB_aXuL6" title="Vidéos officielles" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
@endsection
