@extends('layouts.main')

@section('title')
  Dasbor | Pelayanan Desa Cilame
@endsection

@section('css')
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/css/bootstrap-datetimepicker.min.css"
  />
  <link
    rel="stylesheet"
    href="/assets/css/select2.css"
  />
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <ul class="breadcrumb">
        <li><a href="#">Dasbor</a></li>
        <li><a href="#">KAUR Kesra - Keterangan Kelahiran</a></li>
        <li class="active">Form Tambah</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Form Tambah Data Keterangan Kelahiran
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="/dasbor/kaur-kesra/keterangan-kelahiran/ubah/{{ $keteranganKelahiran->id }}" method="post">
                <h4>
                  <b>
                    Identitas
                  </b>
                </h4>
                <hr />
                <input
                  type="hidden"
                  name="_token"
                  value="{{ csrf_token() }}"
                />
                <input
                  type="hidden"
                  name="_method"
                  value="put"
                />
                <input
                  type="hidden"
                  name="pengguna_id"
                  value="{{ Auth::guard('pengguna')->User()->id }}"
                />
                <input
                  type="hidden"
                  name="penduduk_id"
                  id="master-penduduk-id"
                  value="{{ $keteranganKelahiran->penduduk_id }}"
                />
                @section('nik')
                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
                      <label
                        class="control-label"
                        for="penduduk-id"
                      >
                        NIK
                        <a
                          href="/dasbor/kependudukan/penduduk/form-tambah"
                        >
                          <i class="fa fa-plus"></i>
                          Tambah Data Penduduk
                        </a>
                      </label>
                      <select
                        name="nik_identitas"
                        class="form-control"
                        id="nik"
                        autocomplete="off"
                      >
                        <option
                          value="{{ $keteranganKelahiran->penduduk->nik }}"
                          selected="selected"
                        >
                          {{ $keteranganKelahiran->penduduk->nik }}
                        </option>
                      </select>
                    </div>
                  </div>
                @endsection
                @include('layouts.partials.form_ubah_identitas_penduduk')
                <h4>
                  <b>
                    Identitas Anak
                  </b>
                </h4>
                <hr />
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
                        value="{{ $keteranganKelahiran->nama_anak }}"
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
                  <div class="col-lg-3 col-md-3 col-xs-12">
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
                        value="{{ $keteranganKelahiran->tempat_lahir_anak }}"
                      />
                      @if($errors->has('tempat_lahir_anak'))
                        <p class="text-danger">
                          {{ $errors->first('tempat_lahir_anak') }}
                        </p>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-xs-12">
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
                          value="{{ $keteranganKelahiran->tanggal_lahir_anak }}"
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
                  <div class="col-lg-3 col-md-3 col-xs-12">
                    <div class="form-group">
                      <label
                        for=""
                        class="control-label"
                      >
                        Hari Lahir <small class="text-danger">*</small>
                      </label>
                      <input
                        type="text"
                        name="hari_lahir_anak"
                        class="form-control"
                        id="hari-lahir-anak"
                        value="{{ $keteranganKelahiran->hari_lahir_anak }}"
                        readonly
                      />
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-xs-12">
                    <div class="form-group">
                      <label
                        for=""
                        class="control-label"
                      >
                        Jam Lahir
                      </label>
                      <div
                        class="input-group date"
                        id="jam-lahir-anak"
                      >
                        <input
                          type="text"
                          name="jam_lahir_anak"
                          class="form-control"
                          value="{{ $keteranganKelahiran->jam_lahir_anak }}"
                        />
                        <span class="input-group-addon">
                          <span class="fa fa-clock-o"></span>
                        </span>
                      </div>
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
                            {{ $keteranganKelahiran->jenis_kelamin_anak == $item->keterangan ? 'selected' : '' }}
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
                        value="{{ $keteranganKelahiran->anak_ke }}"
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
                      >{{ $keteranganKelahiran->alamat_anak }}</textarea>
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
                        value="{{ $keteranganKelahiran->nama_ayah }}"
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
                        value="{{ $keteranganKelahiran->umur_ayah }}"
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
                            {{ $keteranganKelahiran->agama_ayah == $item->keterangan ? 'selected' : '' }}
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
                        value="{{ $keteranganKelahiran->pekerjaan_ayah }}"
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
                      >{{ $keteranganKelahiran->alamat_ayah }}</textarea>
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
                        value="{{ $keteranganKelahiran->nama_ibu }}"
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
                        value="{{ $keteranganKelahiran->umur_ibu }}"
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
                            {{ $keteranganKelahiran->agama_ibu == $item->keterangan ? 'selected' : '' }}
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
                        value="{{ $keteranganKelahiran->pekerjaan_ibu }}"
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
                      >{{ $keteranganKelahiran->alamat_ibu }}</textarea>
                    </div>
                  </div>
                </div>
                <h4>
                  <b>
                    Keterangan Surat
                  </b>
                </h4>
                <hr />
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label
                        for=""
                        class="control-label"
                      >
                        Ditanda Tangani Oleh
                      </label>
                      <select
                        name="perangkat_id"
                        class="form-control"
                        id="profil-perangkat-id"
                      >
                        <option value="0">
                          -
                        </option>
                        @foreach($perangkat as $item)
                          <option
                            value="{{ $item->id }}"
                            {{ $keteranganKelahiran->perangkat_id == $item->id ? 'selected' : '' }}
                          >
                            {{ $item->jabatan }} - {{ $item->nama }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <p>
                  <small>
                    <code>
                      Label ber-simbol (*) perlu diisi/dipilih.
                    </code>
                  </small>
                </p>
                <button
                  type="submit"
                  class="btn btn-sm btn-social btn-vk"
                >
                  <i class="fa fa-check"></i> Simpan
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script
    type="text/javascript"
    src="/assets/js/bootstrap-typehead.min.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/js/moment.min.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/js/bootstrap-datetimepicker.min.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/frontend/js/select2.js"
  ></script>
  @yield('identitas_penduduk_js')
  <script>
    $('#tanggal-lahir-anak').datetimepicker({
      format: 'DD-MM-YYYY',
      viewMode: 'years',
      locale: 'id',
    }).on('dp.change', function(e){
      // console.log(e.date);
      console.log(e.date._d.getDay());
      var day = e.date._d.getDay();

      if (day == 1) {
        $('#hari-lahir-anak').val('Senin');
      }else if(day == 2){
        $('#hari-lahir-anak').val('Selasa');
      }else if(day == 3){
        $('#hari-lahir-anak').val('Rabu');
      }else if(day == 4){
        $('#hari-lahir-anak').val('Kamis');
      }else if(day == 5){
        $('#hari-lahir-anak').val('Jumat');
      }else if(day == 6){
        $('#hari-lahir-anak').val('Sabtu');
      }else if(day == 0){
        $('#hari-lahir-anak').val('Minggu');
      }
    });
    $('#jam-lahir-anak').datetimepicker({
      format: 'HH:mm',
    });
    $('#tanggal-lahir-ayah').datetimepicker({
      format: 'DD-MM-YYYY',
      viewMode: 'years'
    });
    $('#tanggal-lahir-ibu').datetimepicker({
      format: 'DD-MM-YYYY',
      viewMode: 'years'
    });
    $('#tanggal-lahir-ghoib').datetimepicker({
      format: 'DD-MM-YYYY',
      viewMode: 'years'
    });
    $('#ubah-keterangan-redaksi').click(function(e){
      e.preventDefault();
      $('#redaksi').prop('readonly', false);
      $('#redaksi').focus();
      $('#ubah-keterangan-redaksi').attr('disabled', true);
    });
  </script>
@endsection
