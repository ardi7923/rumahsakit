<form class="forms" data-url="{{ url('admin/user-doctor') }}" method="POST" class="needs-validation" novalidate>
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"> @lang('main.form.add')</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="errors"></div>

        @csrf

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Dokter </label>
            <div class="col-sm-9">
                <select name="doctor_id" class="form-control" required>
                    <option selected disabled value=""> --PILIH--</option>
                    @foreach ($doctors as $d)
                    <option value="{{ $d->id }}"> {{ $d->name }} - {{ $d->specialist }} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Username </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="username" required>
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
            <button type="submit" class="btn btn-success "> <i class="fa fa-paper-plane"></i> @lang('main.button.save')</button>
        </div>
    </div>
</form>

<script>

</script>