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
      >Bersangkutan adalah benar sebagai penduduk / warga Desa Cilame Kecamatan Ngamprah Kabupaten Bandung Barat. Saat ini yang bersangkutan :</textarea>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group {{ $errors->has('nama') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="nama"
      >
        Nama Lengkap <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="nama"
        class="form-control"
        value="{{ $permintaanSuratDetail->nama_ghoib }}"
      >
      @if($errors->has('nama'))
        <p class="text-danger">
          {{ $errors->first('nama') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group {{ $errors->has('tempat_lahir') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="tempat-lahir"
      >
        Tempat Lahir <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="tempat_lahir"
        class="form-control"
        value="{{ $permintaanSuratDetail->tempat_lahir_ghoib }}"
      >
      @if($errors->has('tempat_lahir'))
        <p class="text-danger">
          {{ $errors->first('tempat_lahir') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="tanggal-lahir-ghoib"
      >
        Tanggal Lahir <small class="text-danger">*</small>
      </label>
      <div
        class="input-group date"
        id="tanggal-lahir-ghoib"
      >
        <input
          type="text"
          name="tanggal_lahir"
          class="form-control"
          value="{{ $permintaanSuratDetail->tanggal_lahir_ghoib }}"
        />
        <span class="input-group-addon">
          <span class="fa fa-calendar"></span>
        </span>
      </div>
      @if($errors->has('tanggal_lahir'))
        <p class="text-danger">
          {{ $errors->first('tanggal_lahir') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="form-group {{ $errors->has('alamat') ? 'has-error has-feedback' : '' }}">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label
        class="control-label"
        for="alamat"
      >
        Alamat <small class="text-danger">*</small>
      </label>
      <textarea
        name="alamat"
        class="form-control"
        id=""
        rows="5"
      >{{ $permintaanSuratDetail->alamat_ghoib }}</textarea>
      @if($errors->has('alamat'))
        <p class="text-danger">
          {{ $errors->first('alamat') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="form-group {{ $errors->has('alasan') ? 'has-error has-feedback' : '' }}">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label
        for=""
        class="control-label"
      >
        Alasan Ghoib <small class="text-danger">*</small>
      </label>
      <textarea
        name="alasan"
        class="form-control"
        id="alasan"
        rows="5"
      >{{ $permintaanSuratDetail->alasan_ghoib }}</textarea>
      @if($errors->has('alasan'))
        <p class="text-danger">
          {{ $errors->first('alasan') }}
        </p>
      @endif
    </div>
  </div>
</div>
