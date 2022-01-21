<div class="post{{ isset($noSeparator)? '_noseparator' : '' }}">
    <div class="row">
        <div class="col">
            <h2 class="{{ isset($centerTitle)? 'text-center' : '' }}">{{ $post->title }}</h2>
        </div>
    </div>

    <div class="row">
        @if($post->hasDisplayableAttachments())
        <div class="col-{{ $leftCol ?? 'sm-4' }}">
            @if(count($post->attachments) > 1)
                @include('partials.carousel', ['post' => $post, 'id' => uniqid()])
            @else
                @include('partials.attachment', ['attachment' => $post->attachments[0]])
            @endif
        </div>
        @endif
        @if($post->hasMessage())
        <div class="col-{{ $rightCol ?? 'sm-8' }}">
            <span>{!! nl2br($post->content) !!}</span>
        </div>
        @endif
    </div>

    @if(!isset($noDate))
    <div class="row">
        <div class="col"><p class="date">{{ $post->date }}</p></div>
    </div>
    @endif
</div>