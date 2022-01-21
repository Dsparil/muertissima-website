<div class="row">
    <div class="col">
        <h3>Matériel</h3>
    </div>
</div>
<div class="row">
    <div class="col">
        <h4>Sections</h4>
        <div class="row" data-stuff-sections="{{ $stuffSections->toJson() }}">
            <div class="col-lg-3">
                <div class="card bg-dark m-2">
                    <div class="card-body">
                        <h5 class="card-title">Nouvelle</h5>
                        <div class="form-group">
                            <label>Nom : <input type="text" data-name="sections_name" class="form-control" /></label>
                        </div>
                        <a href="#" class="btn btn-primary newItem">Ajouter</a>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <h4>Matériels</h4>
        <div class="row" data-stuff="{{ $stuff->toJson() }}">
            <div class="col-lg-3">
                <div class="card bg-dark m-2">
                    <div class="card-body">
                        <h5 class="card-title">Nouveau</h5>
                        <div class="form-group">
                            <label>Nom : <input type="text" data-name="stuff_name" class="form-control" /></label>
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
        var $stuffSections = $.extend(true, $('[data-stuff-sections]'), crudObject, {
            attributeName: 'data-stuff-sections',
            objectName:    'sections',
            colClass:      'col-lg-3',
            fieldList:     ['name'],

            getCardContent: function(item) {
                return  '<h5 class="card-title">' +
                            '<input type="text" name="' + this.getInputName(item, 'name') + '" class="form-control" value="' + item.name + '" />' +
                        '</h5>';
            }
        }).bindEvents();

        var $stuff = $.extend(true, $('[data-stuff]'), crudObject, {
            attributeName: 'data-stuff',
            objectName:    'stuff',
            colClass:      'col-lg-3',
            fieldList:     [
                'name'
            ],

            getCardContent: function(item) {
                return  '<h5 class="card-title">' +
                            '<input type="text" name="' + this.getInputName(item, 'name') + '" class="form-control" value="' + item.name + '" />' +
                        '</h5>';
            }
        }).bindEvents();
    });
</script>