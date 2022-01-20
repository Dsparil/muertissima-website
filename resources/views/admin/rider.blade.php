@extends('admin.layout')

@section('title')
Gestion de la fiche technique
@endsection

@section('content')
<div class="row">
    <div class="col">
        <h3>Informations générales</h3>
        <div class="form-group">
            <textarea id="general_info">{{ $datasheet->general_info ?? '' }}</textarea>
        </div>
    </div>
    <div class="col">
        <h3>Réseaux</h3>
        <div class="form-group">
            <textarea id="networks">{{ $datasheet->networks ?? '' }}</textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h3>Membres du groupe</h3>
        <div class="row" data-band-members="{{ $bandMembers->toJson() }}">
            <div class="col-3">
                <div class="card bg-dark m-2">
                    <div class="card-body">
                        <h5 class="card-title">Nouveau</h5>
                        <div class="form-group">
                            <label>Nom : <input type="text" name="name" class="form-control" /></label>
                            <label>Instruments : <input type="text" name="instruments" class="form-control" /></label>
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
        var $bandMembers = $.extend($('[data-band-members]'), {
            getBandMembers: function() {
                return JSON.parse(this.attr('data-band-members'));
            },

            setBandMembers: function(members) {
                this.attr('data-band-members', JSON.stringify(members));
            },

            deleteMemberById: function(id) {
                var members = this.getBandMembers();

                for (idx in members) {
                    if (members[idx].id == id) {
                        members.splice(idx, 1);
                    }
                }

                this.setBandMembers(members);
                this.buildCards();
            },

            countNewBandMembers: function () {
                var members    = this.getBandMembers();
                var newCounter = 0;

                for (idx in members) {
                    if (typeof(members[idx].id) == 'string' && members[idx].id.substr(0, 3) == 'new') {
                        ++newCounter;
                    }
                }

                return newCounter;
            },

            buildCards: function() {
                this.find('div.col-3:not(:last-child)').remove();

                var members = this.getBandMembers();

                for (idx in members) {
                    var inputStartingName = 'members[' + members[idx].id + ']';
                    this.find('div.col-3:last-child').before($(
                        '<div class="col-3">' +
                            '<div class="card bg-dark m-2">' +
                                '<div class="card-body">' +
                                    '<div class="form-group">' +
                                        '<input type="hidden" name="'+ inputStartingName + '[id]" value="' + members[idx].id + '" />' +
                                        '<h5 class="card-title"><input type="text" name="' + inputStartingName + '[name]" class="form-control" value="' + members[idx].name + '" /></h5>' +
                                        '<p class="card-text"><input type="text" name="' + inputStartingName + '[name]" class="form-control" value="' + members[idx].instruments + '" /></p>' +
                                        '<a href="#" class="btn btn-danger deleteBandMate">Supprimer</a>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>'
                    ));
                }
            },

            newBandMate: function(name, instruments) {
                var members = this.getBandMembers();

                members.push({
                    name:        name, 
                    instruments: instruments, 
                    id:          'new-' + this.countNewBandMembers()
                });

                this.setBandMembers(members);
                this.buildCards();
            }
        });

        $('#newBandMate').click(function() {
            $bandMembers.newBandMate(
                $('input[name="name"]').val(),
                $('input[name="instruments"]').val()
            );

            $('input[name="name"]').val('');
            $('input[name="instruments"]').val('');
        });

        $bandMembers.buildCards();

        $bandMembers.on('click', 'a.deleteBandMate', function(event) {
            var $target = $(event.target);
            var id      = $target.closest('div').find('input[name$="[id]"]').val();
            $bandMembers.deleteMemberById(id);
        });

        tinymce.init({
            selector: 'textarea#general_info',
            menubar: false,
            toolbar: 'styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent link',
            plugins: 'lists,advlist,link',
            skin: "oxide-dark",
            content_css: "dark",
            statusbar: false
        });

        tinymce.init({
            selector: 'textarea#networks',
            menubar: false,
            toolbar: 'bold italic link',
            plugins: 'link',
            skin: "oxide-dark",
            content_css: "dark",
            statusbar: false
        });
    });
</script>
@endsection