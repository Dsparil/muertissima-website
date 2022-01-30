@extends('layout')

@section('title')
Muertissima - Photos
@endsection

@section('meta-description')
<meta name="description" content="Interviews de Muertissima" />
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
