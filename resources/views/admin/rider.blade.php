@extends('admin.layout')

@section('title')
Gestion de la fiche technique
@endsection

@section('content')
<form id="riderForm" method="POST" action="{{ route('admin.rider.save') }}" enctype="multipart/form-data">
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
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-dark text-light" id="patchlist-tab" data-toggle="tab" data-target="#patchlist" type="button" role="tab" aria-controls="patchlist" aria-selected="false">Patchlist</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-dark text-light" id="rider-tab" data-toggle="tab" data-target="#rider" type="button" role="tab" aria-controls="rider" aria-selected="false">Rider</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-dark text-light" id="spi-tab" data-toggle="tab" data-target="#spi" type="button" role="tab" aria-controls="spi" aria-selected="false">Éléments plan de scène</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-dark text-light" id="scene-tab" data-toggle="tab" data-target="#scene" type="button" role="tab" aria-controls="scene" aria-selected="false">Plan de scène</button>
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
        <!-- Patchlist -->
        <div class="tab-pane fade" id="patchlist" role="tabpanel" aria-labelledby="patchlist-tab">
            @include('admin.rider.patchlist')
        </div>
        <!-- Rider -->
        <div class="tab-pane fade" id="rider" role="tabpanel" aria-labelledby="rider-tab">
            @include('admin.rider.rider')
        </div>
        <!-- Éléments plan de scène -->
        <div class="tab-pane fade" id="spi" role="tabpanel" aria-labelledby="spi-tab">
            @include('admin.rider.scene-plan-items')
        </div>
        <!-- Plan de scène -->
        <div class="tab-pane fade" id="scene" role="tabpanel" aria-labelledby="scene-tab">
            @include('admin.rider.scene-plan')
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