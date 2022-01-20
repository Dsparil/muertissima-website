var crudObject = {
    attributeName: null,
    objectName:    null,
    colClass:      'col-3',
    fieldList:     [],

    getItems: function() {
        return JSON.parse(this.attr(this.attributeName));
    },

    setItems: function(items) {
        this.attr(this.attributeName, JSON.stringify(items));
    },

    deleteItemById: function(id) {
        console.log('DELETE', id);
        var items = this.getItems();

        for (idx in items) {
            if (items[idx].id == id) {
                items.splice(idx, 1);
            }
        }

        this.setItems(items);
        this.buildCards();
    },

    newItem: function(item) {
        var items = this.getItems();

        item.id = 'new' + this.countNewItems();
        items.push(item);

        this.setItems(items);
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

    bindEvents: function() {
        this.on('click', 'a.deleteItem', function(event) {
            var $target = $(event.target);
            var id      = $target.closest('div').find('input[name$="[id]"]').val();

            this.deleteItemById(id);
        }.bind(this)).on ('click', 'a.newItem', function(event) {
            var newItem = {};
            for (var idx in this.fieldList) {
                var field = this.fieldList[idx];
                newItem[field] = this.getNewItemInput(field).val();
                this.getNewItemInput(field).val('');
            }
            this.newItem(newItem);
        }.bind(this));

        if (this.bindCustomEvents) {
            this.bindCustomEvents();
        }

        this.buildCards();
    },

    getInputForId: function(item) {
        return '<input type="hidden" name="'+ this.getInputName(item, 'id') + '" value="' + item.id + '" />';
    },

    getNewItemInput: function(field) {
        return $('input[data-name="' + this.objectName + '_' + field + '"]');
    },

    getDeleteButton: function() {
        return '<a href="#" class="btn btn-danger deleteItem">Supprimer</a>';
    },

    getInputName: function(item, name) {
        return this.objectName + '[' + item.id + '][' + name + ']';
    },

    getCard: function(item) {
        return $(
            '<div class="' + this.colClass + '">' +
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
        this.find('div.' + this.colClass + ':not(:last-child)').remove();

        var items = this.getItems();

        for (idx in items) {
            this.find('div.' + this.colClass + ':last-child').before(this.getCard(items[idx]));
        }
    }
};