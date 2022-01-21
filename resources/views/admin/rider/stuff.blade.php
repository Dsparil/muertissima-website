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
            <div class="col-lg-6">
                <div class="card bg-dark m-2">
                    <div class="card-body">
                        <a name="sections_newItem"></a>
                        <h5 class="card-title">Nouveau</h5>
                        <div class="form-group">
                            <label>Section : <span class="sections_selectbox" data-field="new-section_id" data-object-name="stuff"></span></label>
                            <label>Membre : <span class="members_selectbox" data-field="new-band_member_id" data-object-name="stuff"></span></label>
                            <label>Nom complet : <input type="text" data-name="stuff_instrument_name" class="form-control" /></label>
                            <label>Description : <textarea data-name="stuff_content" class="form-control"></textarea></label>
                        </div>
                        <a href="#sections_newItem" class="btn btn-primary newItem">Ajouter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        document.$stuffSections = $.extend(true, $('[data-stuff-sections]'), crudObject, {
            attributeName: 'data-stuff-sections',
            objectName:    'sections',
            colClass:      'col-lg-3',
            fieldList:     ['name'],

            getCardContent: function(item) {
                return  '<h5 class="card-title">' +
                            '<input type="text" name="' + this.getInputName(item, 'name') + '" class="form-control" value="' + item.name + '" />' +
                        '</h5>';
            },

            bindCustomEvents: function() {
                document.$bandMembers.on('modified', function() {
                    this.find('select.' + document.$bandMembers.objectName).each(function(idx, item) {
                        // Update all selectboxes.
                    });
                }.bind(this));
            }
        }).bindEvents();

        document.$stuff = $.extend(true, $('[data-stuff]'), crudObject, {
            attributeName: 'data-stuff',
            objectName:    'stuff',
            colClass:      'col-lg-6',
            fieldList:     [
                'section_id',
                'band_member_id',
                'instrument_name',
                'content'
            ],

            getCardContent: function(item) {
                return  '<p class="card-text">' +
                            '<label>Section : ' + document.$stuffSections.getSelectBox('section_id', item, item.section_id, this.objectName) + '</label>' +
                        '</p>' +
                        '<p class="card-text">' +
                            '<label>Membre : ' + document.$bandMembers.getSelectBox('band_member_id', item, item.band_member_id, this.objectName) + '</label>' +
                        '</p>' +
                        '<p class="card-text">' +
                            '<label>Nom complet : <input type="text" name="' + this.getInputName(item, 'instrument_name') + '" class="form-control" value="' + (item.instrument_name ?? '') + '" /></label>' +
                        '</p>' +
                        '<p class="card-text">' +
                            '<label>Description : <textarea name="' + this.getInputName(item, 'content') + '" class="form-control">' + item.content + '</textarea></label>' +
                        '</p>';
            },

            buildCardsCallback: function() {
                this.find('textarea').each(function(idx, item) {
                    tinymce.init({
                        target:      item,
                        menubar:     false,
                        toolbar:     'styleselect bold italic forecolor backcolor bullist numlist outdent indent',
                        plugins:     'textcolor, lists,advlist',
                        width:       '100%',
                        skin:        'oxide-dark',
                        content_css: 'dark',
                        statusbar:   false,
                        setup:       function (editor) {
                            editor.on('change', function () {
                                editor.save();
                            });
                        }
                    });
                });
            }
        }).bindEvents();
    });
</script>