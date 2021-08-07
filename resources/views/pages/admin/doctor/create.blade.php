<form class="forms" data-url="{{ url('admin/doctor') }}"  method="POST" class="needs-validation" data-reqimage="image" novalidate>
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"> @lang('main.form.add')</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="errors"></div>

        @csrf

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">NIP </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nip" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="name" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Alamat </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="address" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">No Telp </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="phone" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Spesialis </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="specialist" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control">Foto</label>
            <div class="col-md-9 ">
                <label class="file center-block">

                    <img id="upload_preview" style="width: 80px; height: 80px;" />
                    <br>
                    <br>
                    <input type="file" id="add_logo" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Max 2 mb" accept="image/*" required>
                    <span class="file-custom"></span>
                </label>
            </div>
        </div>

    </div>
    <div class="modal-footer">

        <div class="loading" style="display: none;">
            <div class="spinner-border text-primary" role="status" style="width: 30px; height: 30px; margin-right:20px">
            </div>
        </div>

        <div class="button">
            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-reply-all"></i> @lang('main.button.cancel')</button>
            <button type="submit" class="btn btn-success "> <i class="fa fa-paper-plane"></i> @lang('main.button.save')</button>
        </div>
    </div>
</form>

<script>
    $("#add_logo").change(function() {
        previewImage("add_logo", "upload_preview");
    });
</script>