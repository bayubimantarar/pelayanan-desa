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
        name="rt_kehilangan"
        class="form-control {{ $errors->has('rt_kehilangan') ? 'is-invalid' : '' }}"
        value="{{ old('rt_kehilangan') }}"
      >
      @if($errors->has('rt_kehilangan'))
        <div class="invalid-feedback">
          {{ $errors->first('rt_kehilangan') }}
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
        name="tertanggal_rt_kehilangan"
        class="form-control {{ $errors->has('tertanggal_rt_kehilangan') ? 'is-invalid' : '' }}"
        value="{{ old('tertanggal_rt_kehilangan') }}"
      />
      @if($errors->has('tertanggal_rt_kehilangan'))
        <div class="invalid-feedback">
          {{ $errors->first('tertanggal_rt_kehilangan') }}
        </div>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('rt') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        RW <small class="text-danger">*</small>
      </label>
      <input
        type="number"
        name="rw_kehilangan"
        class="form-control {{ $errors->has('rw_kehilangan') ? 'is-invalid' : '' }}"
        value="{{ old('rw_kehilangan') }}"
      >
      @if($errors->has('rw_kehilangan'))
        <div class="invalid-feedback">
          {{ $errors->first('rw_kehilangan') }}
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
        name="tertanggal_rw_kehilangan"
        class="form-control {{ $errors->has('tertanggal_rw_kehilangan') ? 'is-invalid' : '' }}"
        value="{{ old('tertanggal_rw_kehilangan') }}"
      />
      @if($errors->has('tertanggal_rw_kehilangan'))
        <div class="invalid-feedback">
          {{ $errors->first('tertanggal_rw_kehilangan') }}
        </div>
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
        Alasan Kehilangan <small class="text-danger">*</small>
      </label>
      <textarea
        name="alasan_kehilangan"
        class="form-control {{ $errors->has('alasan_kehilangan') ? 'is-invalid' : '' }}"
        id="alasan"
        rows="5"
      >{{ old('alasan_kehilangan') }}</textarea>
     @if($errors->has('alasan_kehilangan'))
        <div class="invalid-feedback">
          {{ $errors->first('alasan_kehilangan') }}
        </div>
      @endif
    </div>
  </div>
</div>
