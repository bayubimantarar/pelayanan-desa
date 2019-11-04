<div class="row">
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group">
      <label
        class="control-label"
        for="nama"
      >
        Nama Lengkap <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="nama_ghoib"
        class="form-control {{ $errors->has('nama_ghoib') ? 'is-invalid' : '' }}"
        value="{{ old('nama_ghoib') }}"
      >
      @if($errors->has('nama_ghoib'))
        <div class="invalid-feedback">
          {{ $errors->first('nama_ghoib') }}
        </div>
      @endif
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group">
      <label
        class="control-label"
        for="tempat-lahir"
      >
        Tempat Lahir <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="tempat_lahir_ghoib"
        class="form-control {{ $errors->has('tempat_lahir_ghoib') ? 'is-invalid' : '' }}"
        value="{{ old('tempat_lahir_ghoib') }}"
      >
      @if($errors->has('tempat_lahir_ghoib'))
        <div class="invalid-feedback">
          {{ $errors->first('tempat_lahir_ghoib') }}
        </div>
      @endif
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group">
      <label
        class="control-label"
        for="tanggal-lahir-ghoib"
      >
        Tanggal Lahir <small class="text-danger">*</small>
      </label>
      <input
        type="date"
        name="tanggal_lahir_ghoib"
        class="form-control {{ $errors->has('tanggal_lahir_ghoib') ? 'is-invalid' : '' }}"
        value="{{ old('tanggal_lahir_ghoib') }}"
      />
      @if($errors->has('tanggal_lahir_ghoib'))
        <div class="invalid-feedback">
          {{ $errors->first('tanggal_lahir_ghoib') }}
        </div>
      @endif
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label
        class="control-label"
        for="alamat"
      >
        Alamat <small class="text-danger">*</small>
      </label>
      <textarea
        name="alamat_ghoib"
        class="form-control {{ $errors->has('alamat_ghoib') ? 'is-invalid' : '' }}"
        rows="5"
      >{{ old('alamat_ghoib') }}</textarea>
      @if($errors->has('alamat_ghoib'))
        <div class="invalid-feedback">
          {{ $errors->first('alamat_ghoib') }}
        </div>
      @endif
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label
        for=""
        class="control-label"
      >
        Alasan Ghoib <small class="text-danger">*</small>
      </label>
      <textarea
        name="alasan_ghoib"
        class="form-control {{ $errors->has('alasan_ghoib') ? 'is-invalid' : '' }}"
        id="alasan_ghoib"
        rows="5"
      >{{ old('alasan_ghoib') }}</textarea>
      @if($errors->has('alasan_ghoib'))
        <div class="invalid-feedback">
          {{ $errors->first('alasan_ghoib') }}
        </div>
      @endif
    </div>
  </div>
</div>
