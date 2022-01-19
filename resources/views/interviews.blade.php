@extends('layout')

@section('title')
Muertissima - Photos
@endsection

@section('header')
<div class="row">
    <div class="col s12 text-center">
        <img class="header" src="{{ asset('images/logo.jpg') }}" />
    </div>
</div>
@endsection

@section('content')
@foreach($posts as $post)
    @include('partials.post', [
        'post'     => $post,
        'leftCol'  => 'md-2',
        'rightCol' => 'md-10'
    ])
@endforeach

@endsection
