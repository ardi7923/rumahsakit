<form class="forms" data-url="{{ url('admin/user-doctor/'.$data->id) }}" method="POST" class="needs-validation" novalidate>
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"> @lang('main.form.edit')</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="errors"></div>

        @csrf
        @method("PUT")

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Username </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="username" value="{{ $data->username }}" required>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Password </label>
            <div class="col-sm-9">
                <input type="password" class="form-control" name="password" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Ulangi Password </label>
            <div class="col-sm-9">
                <input type="password" class="form-control" name="repeat_password" required>
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

</script>