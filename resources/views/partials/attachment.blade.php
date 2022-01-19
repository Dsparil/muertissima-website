@switch($attachment->type)
    @case('event')
    <a href="{{ $attachment->url }}"><img src="{{ $attachment->pictureUrl }}" style="width: 100%;" loading="lazy" /></a>
    @break

    @case('video')
    <a href="{{ $attachment->sourceUrl }}"><img src="{{ $attachment->pictureUrl }}" style="width: {{ ($attachment->pictureWidth < 200)? $attachment->pictureWidth.'px' : '100%' }};" loading="lazy" /></a>
    @break

    @case('album')
    <a href="{{ $attachment->url }}"><img src="{{ $attachment->pictureUrl }}" style="width: 100%;" loading="lazy" /></a>
    @break

    @case('photo')
    <a href="{{ $attachment->url }}"><img src="{{ $attachment->pictureUrl }}" style="width: 100%;" loading="lazy" /></a>
    @break

    @case('link')
    <a href="{{ $attachment->url }}"><img src="{{ $attachment->pictureUrl }}" style="width: {{ ($attachment->pictureWidth < 200)? $attachment->pictureWidth.'px' : '100%' }};" loading="lazy" /></a>
    @break

    @default
    -- erreur {{ $attachment->type }} --
@endswitch