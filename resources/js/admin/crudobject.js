var crudObject = {
    attributeName: null,
    objectName: null,
    colClass: 'col-3',

    getItems: function() {
        return JSON.parse(this.attr(this.attributeName));
    },

    setItems: function(items) {
        this.attr(this.attributeName, JSON.stringify(items));
    },

    deleteItemById: function(id) {
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
        }.bind(this));

        if (this.bindCustomEvents) {
            this.bindCustomEvents();
        }

        this.buildCards();
    },

    getInputForId: function(id) {
        return '<input type="hidden" name="'+ this.getInputStartingName() + '[id]" value="' + id + '" />';
    },

    getDeleteButton: function() {
        return '<a href="#" class="btn btn-danger deleteItem">Supprimer</a>';
    },

    getInputStartingName: function(id) {
        return this.objectName + '[' + id + ']';
    },

    getCard: function(item) {
        return $(
            '<div class="' + this.colClass + '">' +
                '<div class="card bg-dark m-2">' +
                    '<div class="card-body">' +
                        '<div class="form-group">' +
                            this.getInputForId(item.id) +
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