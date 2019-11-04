<div class="control-group form-group">
  <div class="controls">
    <label>
      Keperluan <small class="text-danger">*</small>
    </label>
    <textarea
      name="keperluan_domisili"
      class="form-control {{ $errors->has('keperluan_domisili') ? 'is-invalid' : '' }}"
      rows="5"
    >{{ old('keperluan_domisili') }}</textarea>
    @if($errors->has('keperluan_domisili'))
      <div class="invalid-feedback">
        {{ $errors->first('keperluan_domisili') }}
      </div>
    @endif
  </div>
</div>
