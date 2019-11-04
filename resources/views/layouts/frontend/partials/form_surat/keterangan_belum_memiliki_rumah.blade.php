<div class="form-group">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label>
        Keperluan <small class="text-danger">*</small>
      </label>
      <textarea
        class="form-control {{ $errors->has('keperluan_belum_memiliki_rumah') ? 'is-invalid' : '' }}"
        name="keperluan_belum_memiliki_rumah"
        rows="5"
      >{{ old('keperluan_belum_memiliki_rumah') }}</textarea>
      @if($errors->has('keperluan_belum_memiliki_rumah'))
        <div class="invalid-feedback">
          {{ $errors->first('keperluan_belum_memiliki_rumah') }}
        </div>
      @endif
    </div>
  </div>
</div>
