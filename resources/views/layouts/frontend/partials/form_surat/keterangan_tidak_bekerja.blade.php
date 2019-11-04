<div class="control-group form-group">
  <div class="controls">
    <label>
      Keperluan <small class="text-danger">*</small>
    </label>
    <textarea
      class="form-control {{ $errors->has('keperluan_tidak_bekerja') ? 'is-invalid' : '' }}"
      name="keperluan_tidak_bekerja"
      rows="5"
    >{{ old('keperluan_tidak_bekerja') }}</textarea>
    @if($errors->has('keperluan_tidak_bekerja'))
      <div class="invalid-feedback">
        {{ $errors->first('keperluan_tidak_bekerja') }}
      </div>
    @endif
  </div>
</div>
