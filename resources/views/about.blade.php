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
<div class="row">
    @foreach($posts as $post)
    <div class="col-3 p-4">
        @include('partials.post', [
            'post'        => $post,
            'leftCol'     => '-12 p-2',
            'rightCol'    => '-12 p-2',
            'noSeparator' => true,
            'noDate'      => true
        ])
    </div>
    @endforeach
</div>

@endsection
