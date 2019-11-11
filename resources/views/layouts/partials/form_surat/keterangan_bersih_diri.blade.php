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
      >Tersebut di atas adalah benar warga/penduduk Desa Cilame Kecamatan Ngamprah. Sepanjang catatan yang ada pada kami berkelakuan baik, tidak pernah tersangkut perkara pidana dan tidak terlibat G30S/PKI atau gerakan organisasi terlarang lainnya.</textarea>
      @if($errors->has('redaksi'))
        <p class="text-danger">
          {{ $errors->first('redaksi') }}
        </p>
      @endif
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
        id="keperluan"
        rows="5"
      >{{ $permintaanSuratDetail->keperluan_bersih_diri }}</textarea>
      @if($errors->has('keperluan'))
        <p class="text-danger">
          {{ $errors->first('keperluan') }}
        </p>
      @endif
    </div>
  </div>
</div>
