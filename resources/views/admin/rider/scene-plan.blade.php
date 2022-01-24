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
                this.find('[data-code]').each(function(idx, item) {
                    var $item = $(item);
                    var code  = $item.attr('data-code');
                    console.log('code = ', code);
                    var spi = document.$scenePlanItems.getFirstItemBy('code', code);
                    console.log(spi);
                    if (spi !== null) {
                        $item.css('background-image', 'url(' + spi.image + ')');
                        $item.css('border', 'none');
                        $item.html('');
                    } else {
                        $item.css('background-color', '#eee');
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

            var $object = $('<div>')
                .html(text)
                .attr('class', 'scenePlanItem')
                .css({
                    'width':  dimensions[0] + 'px', 
                    'height': dimensions[1] + 'px',
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