<div class="row">
    <div class="col">
        <h3>Membres du groupe</h3>
        <div class="row" data-band-members="{{ $bandMembers->toJson() }}">
            <div class="col-3">
                <div class="card bg-dark m-2">
                    <div class="card-body">
                        <h5 class="card-title">Nouveau</h5>
                        <div class="form-group">
                            <label>Nom : <input type="text" data-name="member_name" class="form-control" /></label>
                            <label>Instruments : <input type="text" data-name="member_instruments" class="form-control" /></label>
                        </div>
                        <a href="#" class="btn btn-primary" id="newBandMate">Ajouter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var $bandMembers = $.extend($('[data-band-members]'), crudObject, {
            attributeName: 'data-band-members',
            objectName:    'members',

            getCardContent: function(item) {
                return  '<h5 class="card-title">' +
                            '<input type="text" name="' + this.getInputStartingName() + '[name]" class="form-control" value="' + item.name + '" />' +
                        '</h5>' +
                        '<p class="card-text">' +
                            '<input type="text" name="' + this.getInputStartingName() + '[instruments]" class="form-control" value="' + item.instruments + '" />' +
                        '</p>';
            },

            bindCustomEvents: function() {
                $('#newBandMate').click(function() {
                    let $newName        = $('input[data-name="member_name"]');
                    let $newInstruments = $('input[data-name="member_instruments"]');

                    this.newItem({
                        name:        $newName.val(),
                        instruments: $newInstruments.val()
                    });

                    $newName.val('');
                    $newInstruments.val('');
                }.bind(this));
            }
        });

        $bandMembers.bindEvents();
    });
</script>