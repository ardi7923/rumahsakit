<form class="edit-forms" data-url="{{ url('admin/doctor/'.$data->id) }}"  method="POST" class="needs-validation" novalidate>
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"> @lang('main.form.edit')</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="errors"></div>

        @csrf
        @method("PUT")

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">NIP </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nip" value="{{ $data->nip }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="name" value="{{ $data->name }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Alamat </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="address" value="{{ $data->address }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">No Telp </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="phone" value="{{ $data->phone }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Spesialis </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="specialist" value="{{ $data->specialist }}" required>
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
            <button type="submit" class="btn btn-success "> <i class="fa fa-paper-plane"></i> @lang('main.button.edit')</button>
        </div>
    </div>
</form>

<script>
    $("#add_logo").change(function() {
        previewImage("add_logo", "upload_preview");
    });
</script>