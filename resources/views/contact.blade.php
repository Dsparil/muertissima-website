@extends('layout')

@section('title')
Muertissima - Shows
@endsection

@section('header')
<div class="row">
    <div class="col s12 text-center">
        <img class="header" src="{{ asset('images/logo.jpg') }}" />
    </div>
</div>
@endsection

@section('content')
<div class="row mt-2">
    <div class="col">
        <h1>Contact</h1>
    </div>
</div>
<div class="row">
    <div class="col text-center">
        <a class="btn btn-lg btn-floating" style="background-color: #3b5998;" href="https://www.facebook.com/Muertissima.officiel/" role="button">
            <i class="fab fa-facebook-f"></i>
        </a>
    </div>
    <div class="col text-center">
        <a class="btn btn-lg btn-floating" style="background-color: #ac2bac;" href="https://www.instagram.com/muertissima/" role="button">
            <i class="fab fa-instagram"></i>
        </a>
    </div>
    <div class="col text-center">
        <a class="btn btn-lg btn-floating" style="background-color: #ed302f;" href="https://www.youtube.com/channel/UCyYdMaPiqEB_4rwLAJ8av0w" role="button">
            <i class="fab fa-youtube"></i>
        </a>
    </div>
</div>
<div class="row">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div class="col-6">
        <hr />
        <form method="POST" action="{{ route('contact.postMessage') }}">
            <div class="form-group">
                <label for="contactMessage">Écrivez-nous un p'tit mot !</label>
                <textarea class="form-control bg-dark text-light" id="contactMessage" rows="3"></textarea>
            </div>
            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITEKEY') }}"></div>
            <br/>
            <input type="submit" value="Envoyer" class="btn btn-dark mb-2">
        </form>
    </div>
</div>
@endsection
