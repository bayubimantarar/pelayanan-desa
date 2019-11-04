<div class="form-group">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-xs-12">
      <label for="">
        Jenis SKTM <small class="text-danger">*</small>
      </label>
      <select
        name="jenis_sktm"
        id="jenis-sktm"
        class="form-control"
      >
        <option
          value="Kesehatan"
          {{ old('jenis_sktm') == 'Kesehatan' ? 'selected' : '' }}
        >
          Kesehatan
        </option>
        <option
          value="Pendidikan"
          {{ old('jenis_sktm') == 'Pendidikan' ? 'selected' : '' }}
        >
          Pendidikan
        </option>
      </select>
    </div>
  </div>
</div>
<div id="sktm-pendidikan">
  <div class="row">
    <div class="col-lg-3 col-md-3 col-xs-12">
      <div class="form-group">
        <label
          for=""
          class="control-label"
        >
          Nama Lengkap <small class="text-danger">*</small>
        </label>
        <input
          type="text"
          name="nama_sktm"
          class="form-control {{ $errors->has('nama_sktm') ? 'is-invalid' : '' }}"
          value="{{ old('nama_sktm') }}"
        />
        @if($errors->has('nama_sktm'))
          <div class="invalid-feedback">
            {{ $errors->first('nama_sktm') }}
          </div>
        @endif
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-xs-12">
      <div class="form-group">
        <label
          class="control-label"
        >
          Tempat Lahir <small class="text-danger">*</small>
        </label>
        <input
          type="text"
          name="tempat_lahir_sktm"
          class="form-control {{ $errors->has('tempat_lahir_sktm') ? 'is-invalid' : '' }}"
          value="{{ old('tempat_lahir_sktm') }}"
        />
        @if($errors->has('tempat_lahir_sktm'))
          <div class="invalid-feedback">
            {{ $errors->first('tempat_lahir_sktm') }}
          </div>
        @endif
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-xs-12">
      <div class="form-group">
        <label
          for=""
          class="control-label"
        >
          Tanggal Lahir <small class="text-danger">*</small>
        </label>
        <input
          type="date"
          name="tanggal_lahir_sktm"
          class="form-control {{ $errors->has('tanggal_lahir_sktm') ? 'is-invalid' : '' }}"
          value="{{ old('tanggal_lahir_sktm') }}"
        />
        @if($errors->has('tanggal_lahir_sktm'))
          <div class="invalid-feedback">
            {{ $errors->first('tanggal_lahir_sktm') }}
          </div>
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
          name="jenis_kelamin_sktm"
          class="form-control"
        >
          @foreach($jenisKelamin as $item)
            <option
              value="{{ $item->keterangan }}"
              {{ old('jenis_kelamin') == $item->keterangan ? 'selected' : '' }}
            >
              {{ $item->keterangan }}
            </option>
          @endforeach
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
          Nama Sekolah / Institusi <small class="text-danger">*</small>
        </label>
        <input
          type="text"
          name="nama_sekolah"
          class="form-control {{ $errors->has('nama_sekolah') ? 'is-invalid' : '' }}"
          value="{{ old('nama_sekolah') }}"
        />
        @if($errors->has('nama_sekolah'))
          <div class="invalid-feedback">
            {{ $errors->first('nama_sekolah') }}
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
          Kelas
        </label>
        <input
          type="text"
          name="kelas"
          class="form-control"
          value="{{ old('kelas') }}"
        />
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-xs-12">
      <div class="form-group">
        <label
          for=""
          class="control-label"
        >
          Jurusan
        </label>
        <input
          type="text"
          name="jurusan"
          class="form-control"
          value="{{ old('jurusan') }}"
        />
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
          Alamat Sekolah / Institusi <small class="text-danger">*</small>
        </label>
        <textarea
          name="alamat_sekolah"
          class="form-control {{ $errors->has('alamat_sekolah') ? 'is-invalid' : '' }}"
          rows="5"
        >{{ old('alamat_sekolah') }}</textarea>
        @if($errors->has('alamat_sekolah'))
          <p class="text-danger">
            {{ $errors->first('alamat_sekolah') }}
          </p>
        @endif
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-xs-12">
        <label
          for=""
          class="control-label"
        >
          Diwakili Oleh <small class="text-danger">*</small>
        </label>
        <select
          name="diwakili_oleh"
          class="form-control"
        >
          <option
            value="Ayah"
            {{ old('diwakili_oleh') == 'Ayah' ? 'selected' : '' }}
          >
            Ayah
          </option>
          <option
            value="Ibu"
            {{ old('diwakili_oleh') == 'Ibu' ? 'selected' : '' }}
          >
            Ibu
          </option>
          <option
            value="Wali"
            {{ old('diwakili_oleh') == 'Wali' ? 'selected' : '' }}
          >
            Wali
          </option>
        </select>
      </div>
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
        Keperluan <small class="text-danger">*</small>
      </label>
      <textarea
        name="keperluan_sktm"
        class="form-control {{ $errors->has('keperluan_sktm') ? 'is-invalid' : '' }}"
        id="keperluan-sktm"
        rows="5"
      >{{ old('keperluan_sktm') }}</textarea>
      @if($errors->has('keperluan_sktm'))
          <div class="invalid-feedback">
            {{ $errors->first('keperluan_sktm') }}
          </div>
        @endif
    </div>
  </div>
</div>
