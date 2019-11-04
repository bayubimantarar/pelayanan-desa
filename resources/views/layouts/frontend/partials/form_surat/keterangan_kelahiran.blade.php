<h4>
  <b>
    Identitas Anak
  </b>
</h4>
<hr />
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Nama Lengkap <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="nama_anak"
        class="form-control {{ $errors->has('nama_anak') ? 'is-invalid' : '' }}"
        value="{{ old('nama_anak') }}"
      />
      @if($errors->has('nama_anak'))
        <div class="invalid-feedback">
          {{ $errors->first('nama_anak') }}
        </div>
      @endif
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group ">
      <label
        for=""
        class="control-label"
      >
        Tempat Lahir <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="tempat_lahir_anak"
        class="form-control {{ $errors->has('tempat_lahir_anak') ? 'is-invalid' : '' }}"
        value="{{ old('tempat_lahir_anak') }}"
      />
      @if($errors->has('tempat_lahir_anak'))
        <div class="invalid-feedback">
          {{ $errors->first('tempat_lahir_anak') }}
        </div>
      @endif
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Tanggal Lahir <small class="text-danger">*</small>
      </label>
      <input
        type="date"
        name="tanggal_lahir_anak"
        class="form-control {{ $errors->has('tanggal_lahir_anak') ? 'is-invalid' : '' }}"
        value="{{ old('tanggal_lahir_anak') }}"
      />
      @if($errors->has('tanggal_lahir_anak'))
        <div class="invalid-feedback">
          {{ $errors->first('tanggal_lahir_anak') }}
        </div>
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
            {{ old('jenis_kelamin_anak') == $item->keterangan ? 'selected' : '' }}
          >
            {{ $item->keterangan}}
          </option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-xs-12">
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Anak Ke <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="anak_ke"
        class="form-control {{ $errors->has('anak_ke') ? 'is-invalid' : '' }}"
        value="{{ old('anak_ke') }}"
      />
      @if($errors->has('anak_ke'))
        <div class="invalid-feedback">
          {{ $errors->first('anak_ke') }}
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
        Alamat
      </label>
      <textarea
        name="alamat_anak"
        rows="5"
        class="form-control"
      >{{ old('alamat_anak') }}</textarea>
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
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Nama Lengkap Ayah <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="nama_ayah"
        class="form-control {{ $errors->has('nama_ayah') ? 'is-invalid' : '' }}"
        value="{{ old('nama_ayah') }}"
      />
      @if($errors->has('nama_ayah'))
        <div class="invalid-feedback">
          {{ $errors->first('nama_ayah') }}
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
        Umur Ayah
      </label>
      <input
        type="number"
        name="umur_ayah"
        class="form-control"
        value="{{ old('umur_ayah') }}"
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
            {{ old('agama_ayah') == $item->keterangan ? 'selected' : '' }}
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
        value="{{ old('pekerjaan_ayah') }}"
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
      >{{ old('alamat_ayah') }}</textarea>
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
        Nama Lengkap Ibu <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="nama_ibu"
        class="form-control {{ $errors->has('nama_ibu') ? 'is-invalid' : '' }}"
        value="{{ old('nama_ibu') }}"
      />
      @if($errors->has('nama_ibu'))
        <div class="invalid-feedback">
          {{ $errors->first('nama_ibu') }}
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
        Umur Ibu
      </label>
      <input
        type="number"
        name="umur_ibu"
        class="form-control"
        value="{{ old('umur_ibu') }}"
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
            {{ old('agama_ibu') == $item->keterangan ? 'selected' : '' }}
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
        value="{{ old('pekerjaan_ibu') }}"
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
      >{{ old('alamat_ibu') }}</textarea>
    </div>
  </div>
</div>
