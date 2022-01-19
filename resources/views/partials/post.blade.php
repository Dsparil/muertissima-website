<div class="post">
    <div class="row">
        <div class="col">
            <h2>{{ $post->title }}</h2>
        </div>
    </div>

    <div class="row">
        @if($post->hasDisplayableAttachments())
        <div class="col-4">
            @foreach($post->attachments as $attachment)
                @include('partials.attachment', ['attachment' => $attachment])
            @endforeach
        </div>
        @endif
        @if($post->hasMessage())
        <div class="col-8">
            <span>{!! nl2br($post->content) !!}</span>
        </div>
        @endif
    </div>

    <div class="row">
        <div class="col"><p class="date">{{ $post->date }}</p></div>
    </div>
</div>