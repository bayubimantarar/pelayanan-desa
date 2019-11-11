<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group {{ $errors->has('nama_anak') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Nama Lengkap <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="nama_anak"
        class="form-control"
        value="{{ $permintaanSuratDetail->nama_anak }}"
      />
      @if($errors->has('nama_anak'))
        <p class="text-danger">
          {{ $errors->first('nama_anak') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group {{ $errors->has('tempat_lahir_anak') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Tempat Lahir <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="tempat_lahir_anak"
        class="form-control"
        value="{{ $permintaanSuratDetail->tempat_lahir_anak }}"
      />
      @if($errors->has('tempat_lahir_anak'))
        <p class="text-danger">
          {{ $errors->first('tempat_lahir_anak') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group {{ $errors->has('tanggal_lahir_anak') ? 'has-error has-feedback' : '' }}">
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
          name="tanggal_lahir_anak"
          class="form-control"
          value="{{ $permintaanSuratDetail->tanggal_lahir_anak }}"
        />
        <span class="input-group-addon">
          <span class="fa fa-calendar"></span>
        </span>
      </div>
      @if($errors->has('tanggal_lahir_anak'))
        <p class="text-danger">
          {{ $errors->first('tanggal_lahir_anak') }}
        </p>
      @endif
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
        Jenis Kelamin <small class="text-danger">*</small>
      </label>
      <select
        name="jenis_kelamin_anak"
        class="form-control"
      >
        @foreach($jenisKelamin as $item)
          <option
            value="{{ $item->keterangan}}"
            {{ $permintaanSuratDetail->jenis_kelamin_anak == $item->keterangan ? 'selected' : '' }}
          >
            {{ $item->keterangan}}
          </option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group {{ $errors->has('anak_ke') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Anak Ke <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="anak_ke"
        class="form-control"
        value="{{ $permintaanSuratDetail->anak_ke }}"
      />
      @if($errors->has('anak_ke'))
        <p class="text-danger">
          {{ $errors->first('anak_ke') }}
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
        Alamat
      </label>
      <textarea
        name="alamat_anak"
        rows="5"
        class="form-control"
      >{{ $permintaanSuratDetail->alamat_anak }}</textarea>
    </div>
  </div>
</div>
<h4>
  <b>
    Identitas Ayah & Ibu
  </b>
</h4>
<hr />
<div class="row">
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group {{ $errors->has('nama_ayah') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Nama Lengkap Ayah <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="nama_ayah"
        class="form-control"
        value="{{ $permintaanSuratDetail->nama_ayah }}"
      />
      @if($errors->has('nama_ayah'))
        <p class="text-danger">
          {{ $errors->first('nama_ayah') }}
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
        Umur Ayah
      </label>
      <input
        type="number"
        name="umur_ayah"
        class="form-control"
        value="{{ $permintaanSuratDetail->umur_ayah }}"
      />
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Agama Ayah
      </label>
      <select
        name="agama_ayah"
        class="form-control"
      >
        @foreach($agama as $item)
          <option
            value="{{ $item->keterangan }}"
            {{ $permintaanSuratDetail->agama_ayah == $item->keterangan ? 'selected' : '' }}
          >
            {{ $item->keterangan }}
          </option>
        @endforeach
      </select>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Pekerjaan Ayah
      </label>
      <input
        type="text"
        name="pekerjaan_ayah"
        class="form-control"
        value="{{ $permintaanSuratDetail->pekerjaan_ayah }}"
      />
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Alamat Ayah
      </label>
      <textarea
        name="alamat_ayah"
        class="form-control"
        rows="5"
      >{{ $permintaanSuratDetail->alamat_ayah }}</textarea>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group {{ $errors->has('nama_ibu') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Nama Lengkap Ibu <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="nama_ibu"
        class="form-control"
        value="{{ $permintaanSuratDetail->nama_ibu }}"
      />
    </div>
    @if($errors->has('nama_ibu'))
        <p class="text-danger">
          {{ $errors->first('nama_ibu') }}
        </p>
      @endif
  </div>
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Umur Ibu
      </label>
      <input
        type="number"
        name="umur_ibu"
        class="form-control"
        value="{{ $permintaanSuratDetail->umur_ibu }}"
      />
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Agama Ibu
      </label>
      <select
        name="agama_ibu"
        class="form-control"
      >
        @foreach($agama as $item)
          <option
            value="{{ $item->keterangan }}"
            {{ $permintaanSuratDetail->agama_ibu == $item->keterangan ? 'selected' : '' }}
          >
            {{ $item->keterangan }}
          </option>
        @endforeach
      </select>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Pekerjaan Ibu
      </label>
      <input
        type="text"
        name="pekerjaan_ibu"
        class="form-control"
        value="{{ $permintaanSuratDetail->pekerjaan_ibu }}"
      />
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group">
      <label for="">
        Alamat Ibu
      </label>
      <textarea
        name="alamat_ibu"
        class="form-control"
        rows="5"
      >{{ $permintaanSuratDetail->alamat_ibu }}</textarea>
    </div>
  </div>
</div>
