<div class="row">
    <div class="col-md-6">
        <h3>Informations générales</h3>
        <div class="form-group">
            <textarea name="general_infos" id="input_general_info">{{ $datasheet->general_info ?? '' }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <h3>Réseaux</h3>
        <div class="form-group">
            <textarea name="networks" id="input_networks">{{ $datasheet->networks ?? '' }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <h3>Staff</h3>
        <div class="form-group">
            <textarea name="staff" id="input_staff">{{ $datasheet->staff ?? '' }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <h3>Langues parlées</h3>
        <div class="form-group">
            <textarea name="languages" id="input_language">{{ $datasheet->languages ?? '' }}</textarea>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
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