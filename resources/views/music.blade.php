@extends('layout')

@section('title')
Muertissima - Music
@endsection

@section('meta-description')
<meta name="description" content="Musique de Muertissima, vidéos, lives" />
@endsection

@section('content')
<div class="row mt-2">
    <div class="col-lg-6">
        <h1>Vidéos officielles</h1>
        <iframe width="100%" height="460" src="https://www.youtube.com/embed/videoseries?list=PLw7pVxcIGgTxnwtTtMO_I-jtopB_aXuL6" title="Vidéos officielles" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="col-lg-6">
        <h1>Vidéos live</h1>
        <iframe width="100%" height="460" src="https://www.youtube.com/embed/videoseries?list=PLw7pVxcIGgTznHCIAUkoqNfO56qBnhvM2" title="Vidéos live" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
@endsection
