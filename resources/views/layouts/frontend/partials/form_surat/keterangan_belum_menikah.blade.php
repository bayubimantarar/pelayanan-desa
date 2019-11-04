<div class="form-group">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label
        for=""
        class="control-label"
      >
        Keperluan <small class="text-danger">*</small>
      </label>
      <textarea
        name="keperluan_belum_menikah"
        class="form-control {{ $errors->has('keperluan_belum_menikah') ? 'is-invalid' : '' }}"
        rows="5"
      >{{ old('keperluan') }}</textarea>
      @if($errors->has('keperluan_belum_menikah'))
        <div class="invalid-feedback">
          {{ $errors->first('keperluan_belum_menikah') }}
        </div>
      @endif
    </div>
  </div>
</div>
