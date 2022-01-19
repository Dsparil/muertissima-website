<div id="carousel{{ $id }}" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($post->attachments as $idx => $attachment)
        <div class="carousel-item{{ $idx == 0? ' active' : '' }}">
            <img class="d-block w-100" src="{{ $attachment->pictureUrl }}" alt="">
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carousel{{ $id }}" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel{{ $id }}" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>