<div class="row">
    <div class="col-lg-8">
        <div id="scene-plan" style="width: 100%; height: 600px; background: #fff;">
            @foreach($datasheet->scenePlanData as $item)
            <div class="scenePlanItem" data-code="{{ $item->code }}" style="top: {{ $item->top }}; left: {{ $item->left }}; width: {{ $item->width }}; height: {{ $item->height }}">
                @if(substr($item->code, 0, 6) == 'member')
                    {{ $bandMembers->find(substr($item->code, 7))->name }}
                @else
                    {{ $scenePlanItems->filter->isCode($item->code)->first()->name }}
                @endif
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-lg-4" id="scene-plan-items">
        <div>
            @foreach($scenePlanItems as $item)
            <button type="button"
                    class="btn btn-info text-dark"
                    data-dimensions="{{ $item->dimensions }}"
                    data-code="{{ $item->code }}">{{ $item->name }}</button>
            @endforeach
        </div>
        <br />
        <div>
            @foreach($bandMembers as $bandMember)
            <button type="button" class="btn btn-warning text-dark" data-code="member-{{ $bandMember->id }}" data-dimensions="80x20">{{ $bandMember->name }}</button>
            @endforeach
        </div>
    </div>
</div>

<style type="text/css">
    #scene-plan {
        font-size: 10px;
        width: 100%;
        height: 600px;
        background: #fff;
    }
    .scenePlanItem {
        color: #000;
        background-color: #eee;
        border: 1px solid #000;
        cursor: move;
        position: absolute;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        var $scenePlan     = $.extend($('#scene-plan'), {
            buidDraggable: function() {
                this.find('[data-code]').draggable({
                    containment: this,
                    stop:        function () {
                        var $this        = $(this);
                        var parentWidth  = parseFloat($scenePlan.width());
                        var parentHeight = parseFloat($scenePlan.height());
                        var position     = $this.position();

                        $this.css({
                            'left': (100 * parseFloat(position.left) / parentWidth) + '%',
                            'top':  (100 * parseFloat(position.top) / parentHeight) + '%'
                        });
                    }
                });
            }
        });

        var referenceWidth = 730;
        var $riderForm     = $('#riderForm');


        $('#scene-plan-items').on('click', 'button[data-dimensions]', function(event) {
            var $target      = $(event.target);
            var text         = $target.text();
            var dimensions   = $target.attr('data-dimensions').split('x');
            var code         = $target.attr('data-code');
            var parentWidth  = parseFloat($scenePlan.width());
            var parentHeight = parseFloat($scenePlan.height());
            var objectWidth  = parseFloat((parentWidth / referenceWidth) * dimensions[0]);

            console.log(
                'parentWidth: ', parentWidth,
                ' parentHeight:', parentHeight,
                ' dimensions:', dimensions,
                ' width%: ', (100 * objectWidth / parentWidth) + '%',
                ' height%: ', (100 * parseFloat(dimensions[1]) / parentHeight) + '%'
            );

            var $object = $('<div>')
                .html(text)
                .attr('class', 'scenePlanItem')
                .css({
                    'width':  (100 * objectWidth / parentWidth) + '%', //dimensions[0] + 'px', 
                    'height': (100 * parseFloat(dimensions[1]) / parentHeight) + '%', //dimensions[1] + 'px',
                    'top':    0
                })
                .attr('data-code', code)
            ;

            $scenePlan.append($object);

            $scenePlan.buidDraggable();
        });

        $scenePlan.on('dblclick', 'div[data-code]', function(event) {
            $(event.target).remove();
        });

        $riderForm.on('submit', function(event) {
            var itemCounter = 0;
            $scenePlan.find('[data-code]').each(function(idx, item) {
                var $item  = $(item);
                $riderForm.append($('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'scenePlanItem[' + itemCounter + '][code]')
                    .attr('value', $item.attr('data-code'))
                );
                $riderForm.append($('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'scenePlanItem[' + itemCounter + '][top]')
                    .attr('value', item.style.top)
                );
                $riderForm.append($('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'scenePlanItem[' + itemCounter + '][left]')
                    .attr('value', item.style.left)
                );
                $riderForm.append($('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'scenePlanItem[' + itemCounter + '][width]')
                    .attr('value', item.style.width)
                );
                $riderForm.append($('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'scenePlanItem[' + itemCounter + '][height]')
                    .attr('value', item.style.height)
                );
                itemCounter++;
            });
        });

        $scenePlan.buidDraggable();
    });
</script>