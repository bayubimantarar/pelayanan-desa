<input
  type="hidden"
  name="penduduk_id"
  id="master-penduduk-id"
  value="{{ $keteranganUsaha->penduduk_id }}"
/>
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="penduduk-id"
      >
        NIK
        <a
          href="/master/penduduk/form-tambah"
        >
          <i class="fa fa-plus"></i>
          Tambah Data Penduduk
        </a>
      </label>
      <input
        type="number"
        class="form-control"
        id="nik"
        autocomplete="off"
        value=""
      />
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="nama"
      >
        Nama Lengkap
      <a
        href="/master/penduduk/form-tambah"
      >
        <i class="fa fa-plus"></i>
        Tambah Data Penduduk
      </a>
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="nama"
        value="{{ old('nama') }}"
        autocomplete="off"
      />
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="tempat-lahir"
      >
        Tempat Lahir
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="tempat-lahir"
        readonly
      />
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="tanggal-lahir"
      >
        Tanggal Lahir
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="tanggal-lahir"
        readonly
      />
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="jenis-kelamin"
      >
        Jenis Kelamin
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="jenis-kelamin"
        readonly
      />
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="nama"
      >
        Status Perkawinan
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="status-perkawinan"
        readonly
      />
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="tempat-lahir"
      >
        Agama
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="agama"
        readonly
      />
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="tanggal-lahir"
      >
        Pendidikan
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="pendidikan"
        readonly
      />
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="jenis-kelamin"
      >
        Pekerjaan
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="pekerjaan"
        readonly
      />
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="alamat"
      >
        Alamat
      </label>
      <textarea
        name=""
        class="form-control"
        id="alamat"
        rows="5"
        readonly
      ></textarea>
    </div>
  </div>
</div>
@if($errors->has('penduduk_id'))
  <p class="text-danger">
    {{ $errors->first('penduduk_id') }}
  </p>
@endif
