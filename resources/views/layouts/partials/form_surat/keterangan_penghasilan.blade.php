<div class="form-group {{ $errors->has('penghasilan') ? 'has-error has-feedback' : '' }}">
  <div class="row">
    <div class="col-6 col-md-6 col-xs-12">
      <label
        for=""
        class="control-label"
      >
        Penghasilan Rp. <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="penghasilan"
        id="penghasilan"
        class="form-control"
        value="{{ $permintaanSuratDetail->penghasilan }}"
      />
      @if($errors->has('penghasilan'))
        <p class="text-danger">
          {{ $errors->first('penghasilan') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="form-group {{ $errors->has('redaksi') ? 'has-error has-feedback' : '' }}">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label
        for=""
        class="control-label"
      >
        Keterangan Redaksi <small class="text-danger">*</small>
        <button
          id="ubah-keterangan-redaksi"
          class="btn btn-sm btn-social btn-warning"
        >
          <i class="fa fa-pencil"></i> Ubah
        </button>
      </label>
      <textarea
        name="redaksi"
        class="form-control"
        id="redaksi"
        rows="5"
        readonly
      >Surat Keterangan ini diperlukan untuk keperluan</textarea>
      @if($errors->has('redaksi'))
        <p class="text-danger">
          {{ $errors->first('redaksi') }}
        </p>
      @endif
    </div>
  </div>
</div>
