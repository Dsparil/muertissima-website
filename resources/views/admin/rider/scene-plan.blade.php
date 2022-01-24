<div class="row">
    <div class="col-lg-8">
        @include('admin.scene-plan')
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

<script type="text/javascript">
    $(document).ready(function() {
        var $scenePlan     = $.extend($('#scene-plan'), {
            buidDraggable: function() {
                this.find('[data-code]').draggable({
                    containment: this,
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
            var spi = document.$scenePlanItems.getFirstItemBy('code', code);

            if (spi !== null) {
                var $object = $('<img>')
                    .attr('src', spi.image)
                    .attr('width', dimensions[0] + 'px')
                    .attr('height', dimensions[1] + 'px')
                ;
            } else {
                var $object = $('<div>')
                    .html(text)
                    .css({
                        'width':  dimensions[0] + 'px', 
                        'height': dimensions[1] + 'px',
                        'top':    0
                    })
                ;
            }

            $scenePlan.append($object
                .attr('data-code', code)
                .attr('class', 'scenePlanItem')
            );
            $scenePlan.buidDraggable();
        });

        $scenePlan.on('dblclick', '[data-code]', function(event) {
            $(event.target).remove();
        });

        $riderForm.on('submit', function(event) {
            var itemCounter = 0;
            $scenePlan.find('[data-code]').each(function(idx, item) {
                var width, height, $item  = $(item);
                if ($item.prop('tagName').toLowerCase() == 'img') {
                    width  = $item.attr('width');
                    height = $item.attr('height');
                } else {
                    width  = item.style.width;
                    height = item.style.height;
                }
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
                    .attr('value', width)
                );
                $riderForm.append($('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'scenePlanItem[' + itemCounter + '][height]')
                    .attr('value', height)
                );
                itemCounter++;
            });
        });

        $scenePlan.buidDraggable();
    });
</script>