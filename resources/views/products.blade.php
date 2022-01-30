@extends('layout')

@section('title')
Muertissima - Merch
@endsection

@section('meta-description')
<meta name="description" content="Merchandising de Muertissima, acheter sur Bandcamp" />
@endsection

@section('content')
<div class="row mt-2">
    <div class="col">
        <h1>Merch</h1>
    </div>
</div>
<div class="row">
    @foreach($products as $product)
    <div class="col-sm-6 col-md-4 col-lg-3">
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
