<div class="form-group}">
  <div class="row">
    <div class="col-6 col-md-6 col-xs-12">
      <label
        for=""
        class="control-label"
      >
        Penghasilan Rp. <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="penghasilan"
        class="form-control {{ $errors->has('penghasilan') ? 'is-invalid' : '' }}"
        value="{{ old('penghasilan') }}"
      />
      @if($errors->has('penghasilan'))
        <div class="invalid-feedback">
          {{ $errors->first('penghasilan') }}
        </div>
      @endif
    </div>
  </div>
</div>
