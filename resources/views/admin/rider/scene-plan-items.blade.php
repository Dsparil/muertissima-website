<div class="row">
    <div class="col">
        <h3>Membres du groupe</h3>
        <div class="row" data-scene-plan-items="{{ $scenePlanItems->toJson() }}">
            <div class="col-lg-3">
                <div class="card bg-dark m-2">
                    <div class="card-body">
                        <h5 class="card-title">Nouveau</h5>
                        <div class="form-group">
                            <label>Nom : <input type="text" data-name="scenePlanItems_name" class="form-control" /></label>
                            <label>Code : <input type="text" data-name="scenePlanItems_code" class="form-control" /></label>
                            <label>Dimensions : <input type="text" data-name="scenePlanItems_dimensions" class="form-control" /></label>
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
        document.$scenePlanItems = $.extend($('[data-scene-plan-items]'), crudObject, {
            attributeName: 'data-scene-plan-items',
            objectName:    'scenePlanItems',
            colClass:      'col-lg-3',
            fieldList:     [
                'code',
                'name',
                'dimensions',
                'image'
            ],

            getCardContent: function(item) {
                return  '<h5 class="card-title">' +
                            '<input type="text" name="' + this.getInputName(item, 'name') + '" class="form-control" value="' + item.name + '" />' +
                        '</h5>' +
                        '<p class="card-text">' +
                            '<input type="text" name="' + this.getInputName(item, 'code') + '" class="form-control" value="' + item.code + '" />' +
                            '<input type="text" name="' + this.getInputName(item, 'dimensions') + '" class="form-control" value="' + item.dimensions + '" />' +
                            ((item.image != '')?'<div class="text-center"><img src="' + item.image + '" width="150" /></div>' : '') +
                            '<input type="file" name="' + this.getInputName(item, 'image') + '" class="form-control" />' +
                        '</p>';
            }
        }).bindEvents();
    });
</script>