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
          {{ $permintaanSuratDetail->status == 'Janda' ? 'selected' : '' }}
        >
          Janda
        </option>
        <option
          value="Duda"
          {{ $permintaanSuratDetail->status == 'Duda' ? 'selected' : '' }}
        >
          Duda
        </option>
      </select>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group {{ $errors->has('nama') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Nama Lengkap <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="nama"
        class="form-control"
        value="{{ $permintaanSuratDetail->nama_pensiun }}"
      />
      @if($errors->has('nama'))
        <p class="text-danger">
          {{ $errors->first('nama') }}
        </p>
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
        class="form-control"
        value="{{ $permintaanSuratDetail->nomor_pensiun }}"
      />
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group {{ $errors->has('tanggal_meninggal') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Tanggal Meninggal <small class="text-danger">*</small>
      </label>
      <div
        class="input-group date"
        id="tanggal-meninggal"
      >
        <input
          type="text"
          name="tanggal_meninggal"
          class="form-control"
          value="{{ $permintaanSuratDetail->tanggal_meninggal }}"
        />
        <span class="input-group-addon">
          <span class="fa fa-calendar"></span>
        </span>
      </div>
      @if($errors->has('tanggal_meninggal'))
        <p class="text-danger">
          {{ $errors->first('tanggal_meninggal') }}
        </p>
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
      >{{ $permintaanSuratDetail->pensiunan }}</textarea>
    </div>
  </div>
</div>
