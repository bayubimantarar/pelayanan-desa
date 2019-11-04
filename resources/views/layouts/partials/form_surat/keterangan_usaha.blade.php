<div class="form-group {{ $errors->has('redaksi') ? 'has-error has-feedback' : '' }}">
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
      >Bersangkutan adalah penduduk / warga Desa Cilame dengan alamat sebagaimana tersebut di atas yang mempunyai usaha :</textarea>
      @if($errors->has('redaksi'))
        <p class="text-danger">
          {{ $errors->first('redaksi') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="form-group {{ $errors->has('jenis_usaha') ? 'has-error has-feedback' : '' }}">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label
        class="control-label"
      >
        Jenis Usaha <small class="text-danger">*</small>
      </label>
      <textarea
        name="jenis_usaha"
        class="form-control"
        id="jenis-usaha"
        rows="5"
      >{{ $permintaanSuratDetail->jenis_usaha }}</textarea>
      @if($errors->has('jenis_usaha'))
        <p class="text-danger">
          {{ $errors->first('jenis_usaha') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="form-group {{ $errors->has('lokasi') ? 'has-error has-feedback' : '' }}">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label
        for=""
        class="control-label"
      >
        Lokasi <small class="text-danger">*</small>
      </label>
      <textarea
        name="lokasi"
        class="form-control"
        id="lokasi"
        rows="5"
      >{{ $permintaanSuratDetail->lokasi_usaha }}</textarea>
      @if($errors->has('lokasi'))
        <p class="text-danger">
          {{ $errors->first('lokasi') }}
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
        Keterangan Keperluan <small class="text-danger">*</small>
      </label>
      <textarea
        name="keperluan"
        class="form-control"
        id="keperluan"
        rows="5"
      >{{ $permintaanSuratDetail->keperluan_usaha }}</textarea>
      @if($errors->has('keperluan'))
        <p class="text-danger">
          {{ $errors->first('keperluan') }}
        </p>
      @endif
    </div>
  </div>
</div>

