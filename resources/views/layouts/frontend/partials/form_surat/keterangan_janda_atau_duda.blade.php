<div class="form-group">
  <div class="row">
    <div class="col-6 col-md-6 col-xs-12">
      <label for="">
        Status <small class="text-danger">*</small>
      </label>
      <select
        name="status"
        class="form-control"
      >
        <option
          value="Janda"
          {{ old('status') == 'Janda' ? 'selected' : '' }}
        >
          Janda
        </option>
        <option
          value="Duda"
          {{ old('status') == 'Duda' ? 'selected' : '' }}
        >
          Duda
        </option>
      </select>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Nama Lengkap <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="nama_pensiun"
        class="form-control {{ $errors->has('nama_pensiun') ? 'is-invalid' : '' }}"
        value="{{ old('nama_pensiun') }}"
      />
      @if($errors->has('nama_pensiun'))
        <div class="invalid-feedback">
          {{ $errors->first('nama_pensiun') }}
        </div>
      @endif
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Nomor Pensiun
      </label>
      <input
        type="text"
        name="nomor_pensiun"
        class="form-control {{ $errors->has('nomor_pensiun') ? 'is-invalid' : '' }}"
        value="{{ old('nomor_pensiun') }}"
      />
      @if($errors->has('nomor_pensiun'))
        <div class="invalid-feedback">
          {{ $errors->first('nomor_pensiun') }}
        </div>
      @endif
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group">
      <label
        class="control-label"
      >
        Tanggal Meninggal <small class="text-danger">*</small>
      </label>
      <input
        type="date"
        name="tanggal_meninggal_pensiun"
        class="form-control {{ $errors->has('tanggal_meninggal_pensiun') ? 'is-invalid' : '' }}"
        value="{{ old('tanggal_meninggal_pensiun') }}"
      />
      @if($errors->has('tanggal_meninggal_pensiun'))
        <div class="invalid-feedback">
          {{ $errors->first('tanggal_meninggal_pensiun') }}
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
        Penerima Pensiun Dari Departemen/Instansi
      </label>
      <textarea
        name="pensiunan"
        class="form-control"
        rows="5"
      >{{ old('pensiunan') }}</textarea>
    </div>
  </div>
</div>
