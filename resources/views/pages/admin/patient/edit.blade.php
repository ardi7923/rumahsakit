<form class="forms" data-url="{{ url('admin/patient/'.$data->id) }}" method="POST" class="needs-validation" novalidate>
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"> @lang('main.form.edit')</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="errors"></div>

        @csrf
        @method("PUT")

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">NIK </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nik" value="{{ $data->nik }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="name" value="{{ $data->name }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Jenis Kelamin </label>
            <div class="col-sm-9">
                <select id="gender" class="form-control" name="gender" required>
                    <option disabled selected value="">--PILIH--</option>
                    <option value="M"> Laki-laki </option>
                    <option value="F"> Perempuan </option>
                </select>
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
            <label class="col-sm-3 col-form-label">Ruangan </label>
            <div class="col-sm-9">
                <select id="room" name="room" class="form-control" required>
                    <option selected disabled value=""> --PILIH--</option>
                    @foreach ($rooms as $r)
                    <option> {{ $r->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Status </label>
            <div class="col-sm-9">
                <select id="status" class="form-control" name="status" required>
                    <option disabled selected value="">--PILIH--</option>
                    <option> Masa Pemulihan </option>
                    <option> Perawatan Insentif </option>
                </select>
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
    $("#gender").val("{{ $data->gender }}");
    $("#room").val("{{ $data->room }}");
    $("#status").val("{{ $data->status }}");
</script>