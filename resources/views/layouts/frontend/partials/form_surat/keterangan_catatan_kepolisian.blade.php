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
        name="rt_skck"
        class="form-control {{ $errors->has('rt_skck') ? 'is-invalid' : '' }}"
        value="{{ old('rt_skck') }}"
      >
      @if($errors->has('rt_skck'))
        <div class="invalid-feedback">
          {{ $errors->first('rt_skck') }}
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
          name="tertanggal_rt_skck"
          class="form-control {{ $errors->has('tertanggal_rt_skck') ? 'is-invalid' : '' }}"
          value="{{ old('tertanggal_rt_skck') }}"
        />
        @if($errors->has('tertanggal_rt_skck'))
          <div class="invalid-feedback">
            {{ $errors->first('tertanggal_rt_skck') }}
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
        name="rw_skck"
        class="form-control {{ $errors->has('rw_skck') ? 'is-invalid' : '' }}"
        value="{{ old('rw_skck') }}"
      >
      @if($errors->has('rw_skck'))
        <div class="invalid-feedback">
          {{ $errors->first('rw_skck') }}
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
        name="tertanggal_rw_skck"
        class="form-control {{ $errors->has('tertanggal_rw_skck') ? 'is-invalid' : '' }}"
        value="{{ old('tertanggal_rw_skck') }}"
      />
      @if($errors->has('tertanggal_rw_skck'))
        <div class="invalid-feedback">
          {{ $errors->first('tertanggal_rw_skck') }}
        </div>
      @endif
    </div>
  </div>
</div>
<div class="control-group form-group">
  <div class="controls">
    <label>
      Keperluan <small class="text-danger">*</small>
    </label>
    <textarea
      class="form-control {{ $errors->has('keperluan_skck') ? 'is-invalid' : '' }}"
      name="keperluan_skck"
      rows="5"
    >{{ old('keperluan_skck') }}</textarea>
    @if($errors->has('keperluan_skck'))
      <div class="invalid-feedback">
        {{ $errors->first('keperluan_skck') }}
      </div>
    @endif
  </div>
</div>
