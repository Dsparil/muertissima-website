@extends('admin.layout')

@section('title')
Gestion de la fiche technique
@endsection

@section('content')
<form method="POST" action="{{ route('admin.rider.save') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-dark text-light active" id="general_info-tab" data-toggle="tab" data-target="#general_info" type="button" role="tab" aria-controls="general_info" aria-selected="true">Informations générales</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-dark text-light" id="members-tab" data-toggle="tab" data-target="#members" type="button" role="tab" aria-controls="members" aria-selected="false">Membres du groupe</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-dark text-light" id="stuff-tab" data-toggle="tab" data-target="#stuff" type="button" role="tab" aria-controls="stuff" aria-selected="false">Matériel</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <!-- Informations générales -->
        <div class="tab-pane fade show active " id="general_info" role="tabpanel" aria-labelledby="general_info-tab">
            @include('admin.rider.general-info')
        </div>
        <!-- Membres du groupe -->
        <div class="tab-pane fade" id="members" role="tabpanel" aria-labelledby="members-tab">
            @include('admin.rider.band-members')
        </div>
        <!-- Matériel -->
        <div class="tab-pane fade" id="stuff" role="tabpanel" aria-labelledby="stuff-tab">
            @include('admin.rider.stuff')
        </div>
    </div>
    
    <div class="row">
        <div class="col text-right">
            <a class="btn btn-primary" href="{{ route('admin.rider.generate') }}">Générer PDF</a>
            <input type="submit" value="Sauvegarder" class="btn btn-success" />
        </div>
    </div>
</form>
@endsection