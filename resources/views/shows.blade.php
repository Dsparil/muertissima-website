@extends('layout')

@section('title')
Muertissima - Shows
@endsection

@section('meta-description')
<meta name="description" content="Concerts de Muertissima" />
@endsection

@section('content')
@foreach($posts as $post)
    @include('partials.post', ['post' => $post])
@endforeach
@endsection
