<div class="control-group form-group">
  <div class="controls">
    <label>
      Jenis Usaha <small class="text-danger">*</small>
    </label>
    <textarea
      class="form-control {{ $errors->has('jenis_usaha') ? 'is-invalid' : '' }}"
      name="jenis_usaha"
      rows="5"
    >{{ old('jenis_usaha') }}</textarea>
    @if($errors->has('jenis_usaha'))
      <div class="invalid-feedback">
        {{ $errors->first('jenis_usaha') }}
      </div>
    @endif
  </div>
</div>
<div class="control-group form-group">
  <div class="controls">
    <label>
      Lokasi <small class="text-danger">*</small>
    </label>
    <textarea
      class="form-control {{ $errors->has('lokasi_usaha') ? 'is-invalid' : '' }}"
      name="lokasi_usaha"
      rows="5"
    >{{ old('lokasi_usaha') }}</textarea>
    @if($errors->has('lokasi_usaha'))
      <div class="invalid-feedback">
        {{ $errors->first('lokasi_usaha') }}
      </div>
    @endif
  </div>
</div>
<div class="control-group form-group">
  <div class="controls">
    <label>
      Keperluan <small class="text-danger">*</small>
    </label>
    <textarea
      class="form-control {{ $errors->has('keperluan_usaha') ? 'is-invalid' : '' }}"
      name="keperluan_usaha"
      rows="5"
    >{{ old('keperluan_usaha') }}</textarea>
    @if($errors->has('keperluan_usaha'))
      <div class="invalid-feedback">
        {{ $errors->first('keperluan_usaha') }}
      </div>
    @endif
  </div>
</div>
