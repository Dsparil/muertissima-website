<div class="row">
    <div class="col">
        <h3>Patchlist</h3>
        <div class="row" data-patchlist="{{ $patchlist->toJson() }}">
            <div class="col-12">
                <div class="card bg-dark m-2">
                    <div class="card-body">
                        <h5 class="card-title">Nouvelle entrée</h5>
                        <div class="form-group">
                            <label>Numéro : <input type="number" data-name="patchlist_input_number" class="form-control" /></label>
                            <label>Membre : <span class="members_selectbox" data-field="new-band_member_id" data-object-name="patchlist"></span></label>
                            <label>Instrument : <input type="text" data-name="patchlist_instrument_name" class="form-control" /></label>
                            <label>Type de micro : <input type="text" data-name="patchlist_microphone_type" class="form-control" /></label>
                            <label>Taille du stand de micro : <input type="text" data-name="patchlist_microphone_stand_size" class="form-control" /></label>
                        </div>
                        <a href="#" class="btn btn-primary newItem">Ajouter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        document.$patchlist = $.extend($('[data-patchlist]'), crudObject, {
            attributeName: 'data-patchlist',
            objectName:    'patchlist',
            colClass:      'col-12',
            fieldList:     [
                'input_number',
                'band_member_id',
                'instrument_name',
                'microphone_type',
                'microphone_stand_size'
            ],

            getCardContent: function(item) {
                return  '<p class="card-text">' +
                            '<label>Numéro : <input type="number" name="' + this.getInputName(item, 'input_number') + '" class="form-control" value="' + item.input_number + '" /></label>' +
                            '<label>Membre : ' + document.$bandMembers.getSelectBox('band_member_id', item, item.band_member_id, this.objectName) + '</label>' +
                            '<label>Instrument : <input type="text" name="' + this.getInputName(item, 'instrument_name') + '" class="form-control" value="' + item.instrument_name + '" /></label>' +
                            '<label>Type de micro : <input type="text" name="' + this.getInputName(item, 'microphone_type') + '" class="form-control" value="' + item.microphone_type + '" /></label>' +
                            '<label>Taille du stand de micro : <input type="text" name="' + this.getInputName(item, 'microphone_stand_size') + '" value="' + item.microphone_stand_size + '" class="form-control" /></label>' +
                        '</p>';
            }
        }).bindEvents();
    });
</script>