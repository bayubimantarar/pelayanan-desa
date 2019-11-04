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
        name="nama_almarhum"
        class="form-control {{ $errors->has('nama_almarhum') ? 'is-invalid' : '' }}"
        value="{{ old('nama_almarhum') }}"
      />
      @if($errors->has('nama_almarhum'))
        <div class="invalid-feedback">
          {{ $errors->first('nama_almarhum') }}
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
        Tempat Lahir <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="tempat_lahir_almarhum"
        class="form-control {{ $errors->has('tempat_lahir_almarhum') ? 'is-invalid' : '' }}"
        value="{{ old('tempat_lahir_almarhum') }}"
      />
      @if($errors->has('tempat_lahir_almarhum'))
        <div class="invalid-feedback">
          {{ $errors->first('tempat_lahir_almarhum') }}
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
        name="tanggal_lahir_almarhum"
        class="form-control {{ $errors->has('tanggal_lahir_almarhum') ? 'is-invalid' : '' }}"
        value="{{ old('tanggal_lahir_almarhum') }}"
      />
      @if($errors->has('tanggal_lahir_almarhum'))
        <div class="invalid-feedback">
          {{ $errors->first('tanggal_lahir_almarhum') }}
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
        name="jenis_kelamin_almarhum"
        class="form-control"
      >
        @foreach($jenisKelamin as $item)
          <option
            value="{{ $item->keterangan }}"
            {{ old('jenis_kelamin_almarhum') == $item->keterangan ? 'selected' : '' }}
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
    <div class="form-group">
      <label
        for=""
        class="control-label"
      >
        Tanggal <small class="text-danger">*</small>
      </label>
      <input
        type="date"
        name="tanggal_meninggal"
        class="form-control {{ $errors->has('tanggal_meninggal') ? 'is-invalid' : '' }}"
        value="{{ old('tanggal_meninggal') }}"
      />
      @if($errors->has('tanggal_meninggal'))
        <div class="invalid-feedback">
          {{ $errors->first('tanggal_meninggal') }}
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
        Meninggal Di <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="alamat_meninggal"
        class="form-control {{ $errors->has('alamat_meninggal') ? 'is-invalid' : '' }}"
        value="{{ old('alamat_meninggal') }}"
      />
      @if($errors->has('alamat_meninggal'))
        <div class="invalid-feedback">
          {{ $errors->first('alamat_meninggal') }}
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
        Penyebab <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="penyebab"
        class="form-control {{ $errors->has('penyebab') ? 'is-invalid' : '' }}"
        value="{{ old('penyebab') }}"
      />
      @if($errors->has('penyebab'))
        <div class="invalid-feedback">
          {{ $errors->first('penyebab') }}
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
        Hubungan Pelapor <small class="text-danger">*</small>
      </label>
      <input
        type="text"
        name="hubungan_pelapor"
        class="form-control {{ $errors->has('hubungan_pelapor') ? 'is-invalid' : '' }}"
        value="{{ old('hubungan_pelapor') }}"
      />
      @if($errors->has('hubungan_pelapor'))
        <div class="invalid-feedback">
          {{ $errors->first('hubungan_pelapor') }}
        </div>
      @endif
    </div>
  </div>
</div>
