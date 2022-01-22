@extends('layout')

@section('title')
Muertissima - About us
@endsection

@section('header')
<div class="row">
    <div class="col s12 text-center">
        <img class="header" src="{{ asset('images/logo.jpg') }}" />
    </div>
</div>
@endsection

@section('content')
<div class="row mt-2">
    <div class="col">
        <h1>Qui sommes-nous ?</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        {!! nl2br($about) !!}
    </div>
</div>
<div class="row">
    @foreach($posts as $post)
    <div class="col-lg-3 col-md-6 col-sm-12 p-4">
        @include('partials.post', [
            'post'        => $post,
            'leftCol'     => '-12 p-2',
            'rightCol'    => '-12 p-2 text-justify',
            'noSeparator' => true,
            'noDate'      => true,
            'centerTitle' => true
        ])
    </div>
    @endforeach
</div>
<div class="row">
    <div class="col">
        <a href="https://www.spirit-of-metal.com/fr/band/Muertissima">Muertissima sur Spirit of Metal</a>
    </div>
</div>

@endsection
