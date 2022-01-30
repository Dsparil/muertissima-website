<nav class="navbar navbar-expand-lg navbar-dark navBackground">

    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navissima" aria-controls="navissima" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navissima">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link{{ $page == 'home'? ' active' : '' }}" aria-current="page" href="{{ route('home') }}">💀 Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ $page == 'about'? ' active' : '' }}" href="{{ route('about') }}">💀 About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ $page == 'shows'? ' active' : '' }}" href="{{ route('shows') }}">💀 Shows</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ $page == 'photos'? ' active' : '' }}" href="{{ route('photos') }}">💀 Photos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ $page == 'interviews'? ' active' : '' }}" href="{{ route('interviews') }}">💀 Interviews</a>
            </li>
            <li class="nav-item">
                <a id="music-link" class="nav-link{{ $page == 'music'? ' active' : '' }}" href="{{ route('music') }}">💀 Music</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ $page == 'products'? ' active' : '' }}" href="{{ route('shop') }}">💀 Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ $page == 'contact'? ' active' : '' }}" href="{{ route('contact') }}">💀 Contact</a>
            </li>
        </ul>
    </div>
</nav>