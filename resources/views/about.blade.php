@extends('layout')

@section('title')
Muertissima - About us
@endsection

@section('meta-description')
<meta name="description" content="À propos de Muertissima, bio, membres, partenaires" />
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
<div class="row mt-2">
    <div class="col">
        <h1>Partenaires</h1>
    </div>
</div>
<div class="row text-center">
    @foreach($partners as $name => $partner)
    <div class="col-sm-6 col-md-4 col-lg-3 mt-3 mb-3">
        <div class="card bg-dark m-2">
            <div class="card-body">
                <a href="{{ $partner['link'] }}">
                    <h5 class="card-title">{{ $name }}</h5>
                    <img class="card-img-top" src="{{ $partner['image'] }}" alt="{{ $name }}" width="200" />
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row mt-2">
    <div class="col">
        <h1>Liens externes</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="https://www.spirit-of-metal.com/fr/band/Muertissima">Muertissima sur Spirit of Metal</a>
    </div>
</div>

@endsection
