@extends('layout')

@section('title')
Muertissima - EASTER MF EGG
@endsection

@section('content')
<div class="row mt-2">
    <div class="col text-center">
        <img src="{{ asset('images/maka.jpg') }}" width="30%" />
    </div>
</div>
<div class="row mt-2 pb-2">
    <div class="col text-center">
        Salut à toi, chère gourgandine !<br />
        Tu es la première à trouver cet Easter Egg ? Tu viens de gagner un rencart avec le chanteur 🥰<br />
        Cette soirée se terminera chez toi, ou chez moi, mais pas les deux à la fois.<br />
        Apportes-moi une preuve au prochain concert, et je paie ma bière 🍻😘
    </div>
</div>
@endsection