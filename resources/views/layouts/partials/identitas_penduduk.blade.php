<input
  type="hidden"
  name="penduduk_id"
  id="master-penduduk-id"
/>
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group {{ $errors->has('nik') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="nik"
      >
        NIK
      <a
        href="/master/penduduk/form-tambah"
      >
        <i class="fa fa-plus"></i>
        Tambah Data Penduduk
      </a>
      </label>
      <div class="scrollable-dropdown-menu">

      <input
        type="number"
        name="nik"
        class="form-control"
        id="nik"
        value="{{ old('nik') }}"
        autocomplete="off"
      />
      </div>
      @if($errors->has('nik'))
        <p class="text-danger">
          {{ $errors->first('nik') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group {{ $errors->has('nama') ? 'has-error has-feedback' : '' }}">
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
        name="nama"
        class="form-control"
        id="nama"
        value="{{ old('nama') }}"
        autocomplete="off"
      />
      @if($errors->has('nama'))
        <p class="text-danger">
          {{ $errors->first('nama') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group">
      <label
        class="control-label"
        for="tempat-lahir"
      >
        Tempat Lahir
      </label>
      <input
        type="text"
        name="jenis_kelamin"
        class="form-control"
        id="tempat-lahir"
        readonly
      />
      @if($errors->has('jenis_kelamin'))
        <p class="text-danger">
          {{ $errors->first('jenis_kelamin') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group">
      <label
        class="control-label"
        for="tanggal-lahir"
      >
        Tanggal Lahir
      </label>
      <input
        type="text"
        name="jenis_kelamin"
        class="form-control"
        id="tanggal-lahir"
        readonly
      />
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group">
      <label
        class="control-label"
        for="jenis-kelamin"
      >
        Jenis Kelamin
      </label>
      <input
        type="text"
        name="jenis_kelamin"
        class="form-control"
        id="jenis-kelamin"
        readonly
      />
      @if($errors->has('jenis_kelamin'))
        <p class="text-danger">
          {{ $errors->first('jenis_kelamin') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group">
      <label
        class="control-label"
        for="nama"
      >
        Status Perkawinan
      </label>
      <input
        type="text"
        name="nama"
        class="form-control"
        id="status-perkawinan"
        readonly
      />
      @if($errors->has('nama'))
        <p class="text-danger">
          {{ $errors->first('nama') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group">
      <label
        class="control-label"
        for="tempat-lahir"
      >
        Agama
      </label>
      <input
        type="text"
        name="jenis_kelamin"
        class="form-control"
        id="agama"
        readonly
      />
      @if($errors->has('jenis_kelamin'))
        <p class="text-danger">
          {{ $errors->first('jenis_kelamin') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group">
      <label
        class="control-label"
        for="tanggal-lahir"
      >
        Pendidikan
      </label>
      <input
        type="text"
        name="jenis_kelamin"
        class="form-control"
        id="pendidikan"
        readonly
      />
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group">
      <label
        class="control-label"
        for="jenis-kelamin"
      >
        Pekerjaan
      </label>
      <input
        type="text"
        name="jenis_kelamin"
        class="form-control"
        id="pekerjaan"
        readonly
      />
      @if($errors->has('jenis_kelamin'))
        <p class="text-danger">
          {{ $errors->first('jenis_kelamin') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label
        class="control-label"
        for="alamat"
      >
        Alamat
      </label>
      <textarea
        name="alamat"
        class="form-control"
        id="alamat"
        rows="5"
        readonly
      ></textarea>
    </div>
  </div>
</div>
