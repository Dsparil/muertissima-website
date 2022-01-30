@extends('layout')

@section('title')
Muertissima - Photos
@endsection

@section('meta-description')
<meta name="description" content="Photos de Muertissima" />
@endsection

@section('content')
@foreach($posts as $post)
    @include('partials.post', [
        'post'     => $post,
        'leftCol'  => 'md-7',
        'rightCol' => 'md-5'
    ])
@endforeach

@endsection
