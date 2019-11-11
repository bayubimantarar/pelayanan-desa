<div class="form-group">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label for="">
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
      >Bersangkutan adalah benar sebagai penduduk / warga Desa Cilame yang berdomisili dengan alamat tersebut di atas dan sampai surat ini dibuat yang bersangkutan belum memiliki rumah.</textarea>
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
      >{{ $permintaanSuratDetail->keperluan_belum_memiliki_rumah }}</textarea>
      @if($errors->has('keperluan'))
        <p class="text-danger">
          {{ $errors->first('keperluan') }}
        </p>
      @endif
    </div>
  </div>
</div>
