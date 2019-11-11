<div class="form-group">
  <div class="row">
    <div class="col-6 col-md-6 col-xs-12">
      <label for="">
        Status
      </label>
      <input
        type="text"
        name="status"
        class="form-control"
        value="Tidak Bekerja"
        readonly
      />
    </div>
  </div>
</div>
<div class="form-group {{ $errors->has('keperluan') ? 'has-error has-feedback' : '' }}">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label
        for=""
        class="control-label"
      >
        Keperluan <small class="text-danger">*</small>
      </label>
      <textarea
        name="keperluan"
        class="form-control"
        rows="5"
      >{{ $permintaanSuratDetail->keperluan_tidak_bekerja }}</textarea>
      @if($errors->has('keperluan'))
        <p class="text-danger">
          {{ $errors->first('keperluan') }}
        </p>
      @endif
    </div>
  </div>
</div>
