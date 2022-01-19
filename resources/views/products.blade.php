@extends('layout')

@section('title')
Muertissima - Merch
@endsection

@section('header')
<div class="row">
    <div class="col s12 text-center">
        <img class="header" src="{{ asset('images/logo.jpg') }}" />
    </div>
</div>
@endsection

@section('content')
<h1>Merch</h1>
<div class="row">
    @foreach($products as $product)
    <div class="col-3">
        <a href="{{ $product->url }}">
        <div class="card bg-dark m-2">
            <img src="{{ $product->pictureUrl }}" class="card-img-top" />
            <div class="card-body">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text itemPrice">{{ $product->price }}</p>
            </div>
        </div>
        </a>
    </div>
    @endforeach
</div>
@endsection
