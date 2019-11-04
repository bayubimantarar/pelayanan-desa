<div class="control-group form-group">
  <div class="controls">
    <label>
      Keperluan <small class="text-danger">*</small>
    </label>
    <textarea
      name="keperluan_bersih_diri"
      class="form-control {{ $errors->has('keperluan_bersih_diri') ? 'is-invalid' : '' }}"
      rows="5"
    >{{ old('keperluan_bersih_diri') }}</textarea>
    @if($errors->has('keperluan_bersih_diri'))
      <p class="text-danger">
        {{ $errors->first('keperluan_bersih_diri') }}
      </p>
    @endif
  </div>
</div>
