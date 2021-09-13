<form class="forms" data-url="{{ url('admin/account-consultation/'.$data->id) }}" method="POST" class="needs-validation" novalidate>
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"> @lang('main.form.edit')</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="errors"></div>

        @csrf
        @method("PUT")
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nomor KTP </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="ktp_number" value="{{ $data->patient->ktp_number }}" required>
                <input type="hidden" class="form-control" name="ktp_number_old" value="{{ $data->patient->ktp_number }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="name" value="{{ $data->name }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tanggal Lahir </label>
            <div class="col-sm-9">
                <input type="date" class="form-control " name="birthday"  format="dd-mm-yyyy" value="{{ $data->patient->birthday }}" required>
            </div>
        </div>

        
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Jenis Kelamin </label>
            <div class="col-sm-9">
                <select class="form-control gender" name="gender" required>
                    <option disabled selected value="">--PILIH--</option>
                    <option value="M"> Laki-laki </option>
                    <option value="F"> Perempuan </option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Alamat </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="address" value="{{ $data->patient->address }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">No Telp </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="phone" value="{{ $data->patient->phone }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Username </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="username" value="{{ $data->username }}" required>
                <input type="hidden" class="form-control" name="username_old" value="{{ $data->username }}" required>
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
    $(".gender").val("{{ $data->patient->gender }}")
</script>