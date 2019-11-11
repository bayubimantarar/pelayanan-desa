<div class="form-group">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-xs-12">
      <label for="">
        Surat Pengantar Dari
      </label>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('rt') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        RT <small class="text-danger">*</small>
      </label>
      <input
        type="number"
        name="rt"
        class="form-control"
        value="{{ $permintaanSuratDetail->rt_izin_rame }}"
      >
      @if($errors->has('rt'))
        <p class="text-danger">
          {{ $errors->first('rt') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('tertanggal_rt') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Tertanggal dari RT <small class="text-danger">*</small>
      </label>
      <div
        class="input-group date"
        id="tertanggal-rt"
      >
        <input
          type="text"
          name="tertanggal_rt"
          class="form-control"
          value="{{ $permintaanSuratDetail->tertanggal_rt_izin_rame }}"
        />
        <span class="input-group-addon">
          <span class="fa fa-calendar"></span>
        </span>
      </div>
      @if($errors->has('tertanggal_rt'))
        <p class="text-danger">
          {{ $errors->first('tertanggal_rt') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('rw') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        RW <small class="text-danger">*</small>
      </label>
      <input
        type="number"
        name="rw"
        class="form-control"
        value="{{ $permintaanSuratDetail->rw_izin_rame }}"
      >
      @if($errors->has('rw'))
        <p class="text-danger">
          {{ $errors->first('rw') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('tertanggal_rw') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Tertanggal dari RW <small class="text-danger">*</small>
      </label>
      <div
        class="input-group date"
        id="tertanggal-rw"
      >
        <input
          type="text"
          name="tertanggal_rw"
          class="form-control"
          value="{{ $permintaanSuratDetail->tertanggal_rw_izin_rame }}"
        />
        <span class="input-group-addon">
          <span class="fa fa-calendar"></span>
        </span>
      </div>
      @if($errors->has('tertanggal_rw'))
        <p class="text-danger">
          {{ $errors->first('tertanggal_rw') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-md-3">
    <div class="form-group {{ $errors->has('acara') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Acara <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="acara"
        class="form-control"
        value="{{ $permintaanSuratDetail->acara }}"
      >
      @if($errors->has('acara'))
        <p class="text-danger">
          {{ $errors->first('acara') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3">
    <div class="form-group {{ $errors->has('tanggal_pelaksanaan') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Tanggal Pelaksanaan <small class="text-danger">*</small>
      </label>
      <div
        class="input-group date"
        id="tanggal-pelaksanaan"
      >
        <input
          type="text"
          name="tanggal_pelaksanaan"
          class="form-control"
          value="{{ $permintaanSuratDetail->tanggal_pelaksanaan }}"
        />
        <span class="input-group-addon">
          <span class="fa fa-calendar"></span>
        </span>
      </div>
      @if($errors->has('tanggal_pelaksanaan'))
        <p class="text-danger">
          {{ $errors->first('tanggal_pelaksanaan') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3">
    <div class="form-group {{ $errors->has('kegiatan') ? 'has-error has-feedback' : '' }}">
      <label
        for="kegiatan"
        class="control-label"
      >
        Jenis Kegiatan / Hiburan <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="kegiatan"
        class="form-control"
        id="kegiatan"
        value="{{ $permintaanSuratDetail->kegiatan }}"
      >
      @if($errors->has('kegiatan'))
        <p class="text-danger">
          {{ $errors->first('kegiatan') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3">
    <div class="form-group {{ $errors->has('waktu_pelaksanaan') ? 'has-error has-feedback' : '' }}">
      <label
        for="waktu-pelaksanaan"
        class="control-label"
      >
        Waktu Pelaksanaan <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="waktu_pelaksanaan"
        class="form-control"
        id="waktu-pelaksanaan"
        value="{{ $permintaanSuratDetail->waktu_pelaksanaan }}"
      >
      @if($errors->has('waktu_pelaksanaan'))
        <p class="text-danger">
          {{ $errors->first('waktu_pelaksanaan') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="form-group {{ $errors->has('alamat_pelaksanaan') ? 'has-error has-feedback' : '' }}">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label
        for="alamat-pelaksanaan"
        class="control-label"
      >
        Alamat Pelaksanaan <small class="text-danger">*</small>
      </label>
      <textarea
        name="alamat_pelaksanaan"
        class="form-control"
        id="alamat-pelaksanaan"
        rows="5"
      >{{ $permintaanSuratDetail->alamat_pelaksanaan }}</textarea>
      @if($errors->has('alamat_pelaksanaan'))
        <p class="text-danger">
          {{ $errors->first('alamat_pelaksanaan') }}
        </p>
      @endif
    </div>
  </div>
</div>
