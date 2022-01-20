@extends('admin.layout')

@section('title')
Gestion de la fiche technique
@endsection

@section('content')
<form method="POST" action="{{ route('admin.rider.save') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-dark text-light active" id="general_info-tab" data-toggle="tab" data-target="#general_info" type="button" role="tab" aria-controls="general_info" aria-selected="true">Informations générales</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-dark text-light" id="members-tab" data-toggle="tab" data-target="#members" type="button" role="tab" aria-controls="members" aria-selected="false">Membres du groupe</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <!-- Informations générales -->
        <div class="tab-pane fade show active " id="general_info" role="tabpanel" aria-labelledby="general_info-tab">
            <div class="row">
                <div class="col-6">
                    <h3>Informations générales</h3>
                    <div class="form-group">
                        <textarea name="general_infos" id="input_general_info">{{ $datasheet->general_info ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-6">
                    <h3>Réseaux</h3>
                    <div class="form-group">
                        <textarea name="networks" id="input_networks">{{ $datasheet->networks ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-6">
                    <h3>Staff</h3>
                    <div class="form-group">
                        <textarea name="staff" id="input_staff">{{ $datasheet->staff ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-6">
                    <h3>Langues parlées</h3>
                    <div class="form-group">
                        <textarea name="languages" id="input_language">{{ $datasheet->languages ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <!-- Membres du groupe -->
        <div class="tab-pane fade" id="members" role="tabpanel" aria-labelledby="members-tab">
            <div class="row">
                <div class="col">
                    <h3>Membres du groupe</h3>
                    <div class="row" data-band-members="{{ $bandMembers->toJson() }}">
                        <div class="col-3">
                            <div class="card bg-dark m-2">
                                <div class="card-body">
                                    <h5 class="card-title">Nouveau</h5>
                                    <div class="form-group">
                                        <label>Nom : <input type="text" data-name="name" class="form-control" /></label>
                                        <label>Instruments : <input type="text" data-name="instruments" class="form-control" /></label>
                                    </div>
                                    <a href="#" class="btn btn-primary" id="newBandMate">Ajouter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col text-right">
            <a class="btn btn-primary" href="{{ route('admin.rider.generate') }}">Générer PDF</a>
            <input type="submit" value="Sauvegarder" class="btn btn-success" />
        </div>
    </div>
</form>

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
                                        '<p class="card-text"><input type="text" name="' + inputStartingName + '[instruments]" class="form-control" value="' + members[idx].instruments + '" /></p>' +
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
            },

            bindEvents: function() {
                $('#newBandMate').click(function() {
                    let $newName        = $('input[data-name="name"]');
                    let $newInstruments = $('input[data-name="instruments"]');

                    this.newBandMate(
                        $newName.val(),
                        $newInstruments.val()
                    );

                    $newName.val('');
                    $newInstruments.val('');
                }.bind(this));

                this.on('click', 'a.deleteBandMate', function(event) {
                    var $target = $(event.target);
                    var id      = $target.closest('div').find('input[name$="[id]"]').val();

                    this.deleteMemberById(id);
                }.bind(this));

                this.buildCards();
            }
        });

        $bandMembers.bindEvents();

        tinymce.init({
            selector: 'textarea#input_general_info',
            menubar: false,
            toolbar: 'styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent link',
            plugins: 'lists,advlist,link',
            skin: "oxide-dark",
            content_css: "dark",
            statusbar: false
        });

        tinymce.init({
            selector: 'textarea#input_networks',
            menubar: false,
            toolbar: 'bold italic link',
            plugins: 'link',
            skin: "oxide-dark",
            content_css: "dark",
            statusbar: false
        });

        tinymce.init({
            selector: 'textarea#input_staff',
            menubar: false,
            toolbar: 'bold italic bullist numlist outdent indent',
            plugins: 'lists,advlist',
            skin: "oxide-dark",
            content_css: "dark",
            statusbar: false
        });

        tinymce.init({
            selector: 'textarea#input_language',
            menubar: false,
            toolbar: 'bold italic bullist numlist outdent indent',
            plugins: 'lists,advlist',
            skin: "oxide-dark",
            content_css: "dark",
            statusbar: false
        });
    });
</script>
@endsection