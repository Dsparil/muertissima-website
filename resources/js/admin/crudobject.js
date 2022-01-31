var crudObject = {
    attributeName:      null,
    objectName:         null,
    colClass:           'col-3',
    fieldList:          [],
    buildCardsCallback: null,

    getItems: function() {
        return JSON.parse(this.attr(this.attributeName));
    },

    setItems: function(items) {
        this.attr(this.attributeName, JSON.stringify(items));
    },

    getFirstItemBy(field, value) {
        var items = this.getItems();

        for (idx in items) {
            if (items[idx][field] == value) {
                return items[idx];
            }
        }

        return null;
    },

    deleteItemById: function(id) {
        var items = this.getItems();

        for (idx in items) {
            if (items[idx].id == id) {
                items.splice(idx, 1);
            }
        }

        this.setItems(items);
        this.trigger('modified');
        this.buildCards();
    },

    newItem: function(item) {
        var items = this.getItems();

        item.id = 'new' + this.countNewItems();
        items.push(item);

        this.setItems(items);
        this.trigger('modified');
        this.buildCards();
    },

    countNewItems: function () {
        var items      = this.getItems();
        var newCounter = 0;

        for (idx in items) {
            if (typeof(items[idx].id) == 'string' && items[idx].id.substr(0, 3) == 'new') {
                ++newCounter;
            }
        }

        return newCounter;
    },

    getSelectBox: function(field, item, selectedId, forceObjectName) {
        var items   = this.getItems();
        var options = '<option value="">--</option>';

        for (var idx in items) {
            options +=  '<option value="' + items[idx].id + '"' + 
                        ((selectedId == items[idx].id)? ' selected="selected"' : '') + 
                        '>' + items[idx].name + '</option>';
        }

        if (field.substr(0, 4) == 'new-') {
            var nameAttribute = 'data-name="' + ((forceObjectName)? forceObjectName : this.objectName) + '_' + field.substr(4) + '"';
        } else {
            var nameAttribute = 'name="' + this.getInputName(item, field, forceObjectName) + '"';
        }

        return '<select ' + nameAttribute + ' class="form-control '+ this.objectName + '">' + options + '</select>';
    },

    bindEvents: function() {
        this.on('click', 'a.deleteItem', function(event) {
            var $target = $(event.target);
            var id      = $target.closest('div').find('input[name$="[id]"]').val();

            this.deleteItemById(id);
        }.bind(this)).on ('click', 'a.newItem', function(event) {
            var newItem = {};
            for (var idx in this.fieldList) {
                var field = this.fieldList[idx];
                var newItemInput = this.getNewItemInput(field);
                newItem[field] = (newItemInput.length > 0)? newItemInput.val() : '';
                this.getNewItemInput(field).val('');
            }
            this.newItem(newItem);
        }.bind(this));

        if (this.bindCustomEvents) {
            this.bindCustomEvents();
        }

        $('span.' + this.objectName + '_selectbox').each(function(idx, item) {
            var $item      = $(item);
            var field      = $item.attr('data-field');
            var objectName = $item.attr('data-object-name');

            $item.replaceWith(this.getSelectBox(field, undefined, undefined, objectName));
        }.bind(this));

        this.buildCards();

        return this;
    },

    getInputForId: function(item) {
        return '<input type="hidden" name="'+ this.getInputName(item, 'id') + '" value="' + item.id + '" />';
    },

    getNewItemInput: function(field) {
        return $('[data-name="' + this.objectName + '_' + field + '"]');
    },

    getDeleteButton: function() {
        return '<a href="#" class="btn btn-danger deleteItem">Supprimer</a>';
    },

    getInputName: function(item, name, forceObjectName) {
        return ((forceObjectName)? forceObjectName : this.objectName) + '[' + item.id + '][' + name + ']';
    },

    getCard: function(item) {
        return $(
            '<div class="' + this.colClass + '" data-item-id="' + item.id + '">' +
                '<div class="card bg-dark m-2">' +
                    '<div class="card-body">' +
                        '<div class="form-group">' +
                            this.getInputForId(item) +
                            this.getCardContent(item) +
                            this.getDeleteButton() +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>'
        );
    },

    getCardContent: function(id) {},

    buildCards: function() {
        // this.find('div.' + this.colClass + ':not(:last-child)').remove();
        var colSelector = 'div.' + this.colClass;
        
        this.find(colSelector + ':not(:last-child)').each(function(idx, item) {
            var $item = $(item);
            var items = this.getItems();
            var found = false;

            for (idx in items) {
                if (items[idx].id == $item.attr('data-item-id')) {
                    found = true;
                    break;
                }
            }

            if (!found) {
                $item.remove();
            }
        }.bind(this));

        var items = this.getItems();

        for (idx in items) {
            if (this.find('[data-item-id=' + items[idx].id + ']').length == 0) {
                this.find(colSelector + ':last-child').before(this.getCard(items[idx]));
            }
        }

        if (this.buildCardsCallback) {
            this.buildCardsCallback();
        }
    }
};