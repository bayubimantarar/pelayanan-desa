<div class="row">
  <div class="col-lg-3 col-md-3 col-xs-12">
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
        value="{{ $permintaanSuratDetail->nama_almarhum }}"
      />
      @if($errors->has('nama'))
        <p class="text-danger">
          {{ $errors->first('nama') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('tempat_lahir') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Tempat Lahir <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="tempat_lahir"
        class="form-control"
        value="{{ $permintaanSuratDetail->tempat_lahir_almarhum }}"
      />
      @if($errors->has('tempat_lahir'))
        <p class="text-danger">
          {{ $errors->first('tempat_lahir') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Tanggal Lahir <small class="text-danger">*</small>
      </label>
      <div
        class="input-group date"
        id="tanggal-lahir-anak"
      >
        <input
          type="text"
          name="tanggal_lahir"
          class="form-control"
          value="{{ $permintaanSuratDetail->tanggal_lahir_almarhum }}"
        />
        <span class="input-group-addon">
          <span class="fa fa-calendar"></span>
        </span>
      </div>
      @if($errors->has('tanggal_lahir'))
        <p class="text-danger">
          {{ $errors->first('tanggal_lahir') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Jenis Kelamin <small class="text-danger">*</small>
      </label>
      <select
        name="jenis_kelamin"
        class="form-control"
      >
        @foreach($jenisKelamin as $item)
          <option
            value="{{ $item->keterangan }}"
            {{ $permintaanSuratDetail->jenis_kelamin_almarhum == $item->keterangan ? 'selected' : '' }}
          >
            {{ $item->keterangan }}
          </option>
        @endforeach
      </select>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label for="">
        Telah meninggal dunia pada :
      </label>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Tanggal <small class="text-danger">*</small>
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
      @if($errors->has('tanggal_lahir'))
        <p class="text-danger">
          {{ $errors->first('tanggal_lahir') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group {{ $errors->has('alamat_meninggal') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Meninggal Di <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="alamat_meninggal"
        class="form-control"
        value="{{ $permintaanSuratDetail->alamat_meninggal }}"
      />
      @if($errors->has('alamat_meninggal'))
        <p class="text-danger">
          {{ $errors->first('alamat_meninggal') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group {{ $errors->has('penyebab_meninggal') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Penyebab <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="penyebab_meninggal"
        class="form-control"
        value="{{ $permintaanSuratDetail->penyebab }}"
      />
      @if($errors->has('penyebab_meninggal'))
        <p class="text-danger">
          {{ $errors->first('penyebab_meninggal') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group {{ $errors->has('hubungan_pelapor') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Hubungan Pelapor <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="hubungan_pelapor"
        class="form-control"
        value="{{ $permintaanSuratDetail->hubungan_pelapor }}"
      />
      @if($errors->has('hubungan_pelapor'))
        <p class="text-danger">
          {{ $errors->first('hubungan_pelapor') }}
        </p>
      @endif
    </div>
  </div>
</div>
