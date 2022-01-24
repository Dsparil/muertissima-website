<style type="text/css">
    #scene-plan {
        display: block;
        font-size: 10px;
        width: 730px;
        height: 600px;
        background: #fff;
    }
    .scenePlanItem {
        color: #000;
        cursor: move;
        text-align: center;
        font-weight: bold;
        position: absolute;
    }
    div.scenePlanItem {
        border: 1px solid #000;
        background-color: #eee;
    }
</style>
<div id="scene-plan">
    @foreach($datasheet->scenePlanData as $item)
    @if($scenePlanItems->filter->isCode($item->code)->first() !== null && $scenePlanItems->filter->isCode($item->code)->first()->image !== null)
        <img class="scenePlanItem" data-code="{{ $item->code }}" style="position: absolute; top: {{ $item->top }}; left: {{ $item->left }};" src="{{ $scenePlanItems->filter->isCode($item->code)->first()->image }}" width="{{ $item->width }}" height="{{ $item->height }}" />
    @else
        <div class="scenePlanItem" data-code="{{ $item->code }}" style="top: {{ $item->top }}; left: {{ $item->left }}; width: {{ $item->width }}; height: {{ $item->height }};{{ (!empty($item->image))? ' background-image: url(\''.$scenePlanItems->filter->isCode($item->code)->first()->image.'\');' : '' }}">
            @if(substr($item->code, 0, 6) == 'member')
                {{ $bandMembers->find(substr($item->code, 7))->name }}
            @else
                {{ $scenePlanItems->filter->isCode($item->code)->first()->name }}
            @endif
        </div>
    @endif
    @endforeach
</div>