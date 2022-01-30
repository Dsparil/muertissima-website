@extends('layout')

@section('title')
Muertissima
@endsection

@section('meta-description')
<meta name="description" content="Muertissima est un groupe de Death Metal de la région parisienne, qui allie phases Black et Thrash afin de donner une sonorité Old school efficace et originale à leur musique" />
@endsection

@section('content')
@foreach($posts as $post)
    @include('partials.post', [
        'post'     => $post,
        'leftCol'  => 'sm-3',
        'rightCol' => 'sm-9'
    ])
@endforeach
@endsection
