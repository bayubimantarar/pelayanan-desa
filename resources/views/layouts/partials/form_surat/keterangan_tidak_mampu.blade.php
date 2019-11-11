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
          {{ $permintaanSuratDetail->jenis_sktm == 'Kesehatan' ? 'selected' : '' }}
        >
          Kesehatan
        </option>
        <option
          value="Pendidikan"
          {{ $permintaanSuratDetail->jenis_sktm == 'Pendidikan' ? 'selected' : '' }}
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
          value="{{ $permintaanSuratDetail->nama_sktm }}"
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
          value="{{ $permintaanSuratDetail->tempat_lahir_sktm }}"
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
            value="{{ $permintaanSuratDetail->tanggal_lahir_sktm }}"
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
              {{ $permintaanSuratDetail->jenis_kelamin_sktm == $item->keterangan ? 'selected' : '' }}
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
      <div class="form-group {{ $errors->has('nama_sekolah') ? 'has-error has-feedback' : '' }}">
        <label
          for=""
          class="control-label"
        >
          Nama Sekolah / Institusi <small class="text-danger">*</small>
        </label>
        <input
          type="text"
          name="nama_sekolah"
          class="form-control"
          value="{{ $permintaanSuratDetail->nama_sekolah }}"
        />
        @if($errors->has('nama_sekolah'))
          <p class="text-danger">
            {{ $errors->first('nama_sekolah') }}
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
          Kelas
        </label>
        <input
          type="text"
          name="kelas"
          class="form-control"
          value="{{ $permintaanSuratDetail->kelas }}"
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
          value="{{ $permintaanSuratDetail->jurusan }}"
        />
      </div>
    </div>
  </div>
  <div class="form-group {{ $errors->has('alamat_sekolah') ? 'has-error has-feedback' : '' }}">
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
          class="form-control"
          rows="5"
        >{{ $permintaanSuratDetail->alamat_sekolah }}</textarea>
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
            {{ $permintaanSuratDetail->diwakili_oleh == 'Ayah' ? 'selected' : '' }}
          >
            Ayah
          </option>
          <option
            value="Ibu"
            {{ $permintaanSuratDetail->diwakili_oleh == 'Ibu' ? 'selected' : '' }}
          >
            Ibu
          </option>
          <option
            value="Wali"
            {{ $permintaanSuratDetail->diwakili_oleh == 'Wali' ? 'selected' : '' }}
          >
            Wali
          </option>
        </select>
      </div>
    </div>
  </div>
</div>
<div class="form-group {{ $errors->has('redaksi') ? 'has-error has-feedback' : '' }}">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label
        for=""
        class="control-label"
      >
        Keterangan Redaksi <small class="text-danger">*</small>
        <button
          id="ubah-keterangan-redaksi"
          class="btn btn-sm btn-social btn-warning"
        >
          <i class="fa fa-pencil"></i> Ubah Keterangan Redaksi
        </button>
      </label>
      <textarea
        name="redaksi"
        class="form-control"
        id="redaksi"
        rows="5"
        readonly
      >Bersangkutan adalah benar sebagai penduduk / warga Desa Cilame yang berdomisili sesuai alamat tersebut di atas dan sepengetahuan kami termasuk kategori tidak mampu (Pra-KS) karena tidak mempunyai penghasilan tetap dan kekayaan yang dapat diandalkan.</textarea>
      @if($errors->has('redaksi'))
        <p class="text-danger">
          {{ $errors->first('redaksi') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="form-group {{ $errors->has('keperluan') ? 'has-error has-feedback' : '' }}">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label
        for=""
        class="control-label"
      >
        Keperluan <small class="text-danger">*</small>
      </label>
      <textarea
        name="keperluan"
        class="form-control"
        id="keperluan"
        rows="5"
      >{{ $permintaanSuratDetail->keperluan_sktm }}</textarea>
      @if($errors->has('keperluan'))
        <p class="text-danger">
          {{ $errors->first('keperluan') }}
        </p>
      @endif
    </div>
  </div>
</div>
