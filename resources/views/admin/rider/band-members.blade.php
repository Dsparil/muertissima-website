<div class="row">
    <div class="col">
        <h3>Membres du groupe</h3>
        <div class="row" data-band-members="{{ $bandMembers->toJson() }}">
            <div class="col-lg-3">
                <div class="card bg-dark m-2">
                    <div class="card-body">
                        <h5 class="card-title">Nouveau</h5>
                        <div class="form-group">
                            <label>Nom : <input type="text" data-name="members_name" class="form-control" /></label>
                            <label>Instruments : <input type="text" data-name="members_instruments" class="form-control" /></label>
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
        document.$bandMembers = $.extend($('[data-band-members]'), crudObject, {
            attributeName: 'data-band-members',
            objectName:    'members',
            colClass:      'col-lg-3',
            fieldList:     [
                'name',
                'instruments'
            ],

            getCardContent: function(item) {
                return  '<h5 class="card-title">' +
                            '<input type="text" name="' + this.getInputName(item, 'name') + '" class="form-control" value="' + item.name + '" />' +
                        '</h5>' +
                        '<p class="card-text">' +
                            '<input type="text" name="' + this.getInputName(item, 'instruments') + '" class="form-control" value="' + item.instruments + '" />' +
                        '</p>';
            }
        }).bindEvents();
    });
</script>