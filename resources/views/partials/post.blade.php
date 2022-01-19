<div class="post">
    <div class="row">
        <div class="col">
            <h2>{{ $post->title }}</h2>
        </div>
    </div>

    <div class="row">
        @if($post->hasDisplayableAttachments())
        <div class="col-{{ $leftCol ?? '4' }}">
            @if(count($post->attachments) > 1)
                @include('partials.carousel', ['post' => $post, 'id' => uniqid()])
            @else
                @include('partials.attachment', ['attachment' => $post->attachments[0]])
            @endif
        </div>
        @endif
        @if($post->hasMessage())
        <div class="col-{{ $rightCol ?? '8' }}">
            <span>{!! nl2br($post->content) !!}</span>
        </div>
        @endif
    </div>

    <div class="row">
        <div class="col"><p class="date">{{ $post->date }}</p></div>
    </div>
</div>