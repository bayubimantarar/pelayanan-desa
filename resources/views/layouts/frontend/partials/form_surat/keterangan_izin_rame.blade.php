 <div class="row">
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        RT <small class="text-danger">*</small>
      </label>
      <input
        type="number"
        name="rt_izin_rame"
        class="form-control {{ $errors->has('rt_izin_rame') ? 'is-invalid' : '' }}"
        value="{{ old('rt_izin_rame') }}"
      >
      @if($errors->has('rt_izin_rame'))
        <div class="invalid-feedback">
          {{ $errors->first('rt_izin_rame') }}
        </div>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Tertanggal dari RT <small class="text-danger">*</small>
      </label>
      <input
        type="date"
        name="tertanggal_rt_izin_rame"
        class="form-control {{ $errors->has('tertanggal_rt_izin_rame') ? 'is-invalid' : '' }}"
        value="{{ old('tertanggal_rt_izin_rame') }}"
      />
      @if($errors->has('tertanggal_rt_izin_rame'))
        <div class="invalid-feedback">
          {{ $errors->first('tertanggal_rt_izin_rame') }}
        </div>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        RW <small class="text-danger">*</small>
      </label>
      <input
        type="number"
        name="rw_izin_rame"
        class="form-control {{ $errors->has('rw_izin_rame') ? 'is-invalid' : '' }}"
        value="{{ old('rw_izin_rame') }}"
      >
      @if($errors->has('rw_izin_rame'))
        <div class="invalid-feedback">
          {{ $errors->first('rw_izin_rame') }}
        </div>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Tertanggal dari RW <small class="text-danger">*</small>
      </label>
      <input
        type="date"
        name="tertanggal_rw_izin_rame"
        class="form-control {{ $errors->has('tertanggal_rw_izin_rame') ? 'is-invalid' : '' }}"
        value="{{ old('tertanggal_rw_izin_rame') }}"
      />
      @if($errors->has('tertanggal_rw_izin_rame'))
        <div class="invalid-feedback">
          {{ $errors->first('tertanggal_rw_izin_rame') }}
        </div>
      @endif
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-md-3">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Acara <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="acara"
        class="form-control {{ $errors->has('acara') ? 'is-invalid' : '' }}"
        value="{{ old('acara') }}"
      >
      @if($errors->has('acara'))
        <div class="invalid-feedback">
          {{ $errors->first('acara') }}
        </div>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Tanggal Pelaksanaan <small class="text-danger">*</small>
      </label>
      <input
        type="date"
        name="tanggal_pelaksanaan"
        class="form-control {{ $errors->has('tanggal_pelaksanaan') ? 'is-invalid' : '' }}"
        value="{{ old('tanggal_pelaksanaan') }}"
      />
      @if($errors->has('tanggal_pelaksanaan'))
        <div class="invalid-feedback">
          {{ $errors->first('tanggal_pelaksanaan') }}
        </div>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3">
    <div class="form-group">
      <label
        for="kegiatan"
        class="control-label"
      >
        Jenis Kegiatan / Hiburan <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="kegiatan"
        class="form-control {{ $errors->has('kegiatan') ? 'is-invalid' : '' }}"
        value="{{ old('kegiatan') }}"
      >
      @if($errors->has('kegiatan'))
        <div class="invalid-feedback">
          {{ $errors->first('kegiatan') }}
        </div>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3">
    <div class="form-group">
      <label
        for="waktu-pelaksanaan"
        class="control-label"
      >
        Waktu Pelaksanaan <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="waktu_pelaksanaan"
        class="form-control {{ $errors->has('waktu_pelaksanaan') ? 'is-invalid' : '' }}"
        value="{{ old('waktu_pelaksanaan') }}"
      >
      @if($errors->has('waktu_pelaksanaan'))
        <p class="text-danger">
          {{ $errors->first('waktu_pelaksanaan') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="form-group">
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
        class="form-control {{ $errors->has('alamat_pelaksanaan') ? 'is-invalid' : '' }}"
        id="alamat-pelaksanaan"
        rows="5"
      >{{ old('alamat_pelaksanaan') }}</textarea>
      @if($errors->has('alamat_pelaksanaan'))
        <p class="text-danger">
          {{ $errors->first('alamat_pelaksanaan') }}
        </p>
      @endif
    </div>
  </div>
</div>
