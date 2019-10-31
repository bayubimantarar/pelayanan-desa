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
  <style>
    #scrollable-dropdown-menu .tt-dropdown-menu {
      max-height: 150px;
      overflow-y: auto;
    }
  </style>
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <ul class="breadcrumb">
        <li><a href="#">Dasbor</a></li>
        <li><a href="#">KAUR Pemerintahan - SKTM</a></li>
        <li class="active">Form Tambah</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Form Tambah Data Keterangan Tidak Mampu
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="/kaur-kesra/sktm/ubah/{{ $sktm->id }}" method="post">
                <h4>
                  <b>
                    IDENTITAS PENDUDUK
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
                  name="penduduk_id"
                  id="master-penduduk-id"
                  value="{{ $sktm->penduduk_id }}"
                />
                @include('layouts.partials.form_ubah_identitas_penduduk')
                <h4>
                  <b>
                    KETERANGAN SURAT
                  </b>
                </h4>
                <hr />
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                      <label
                        for=""
                        class="control-label"
                      >
                        Jenis SKTM <small class="text-danger">*</small>
                      </label>
                      <select
                        name="jenis_sktm"
                        id="jenis-sktm"
                        class="form-control"
                      >
                        <option
                          value="Kesehatan"
                          {{ $sktm->jenis_sktm == 'Kesehatan' ? 'selected' : '' }}
                        >
                          Kesehatan
                        </option>
                        <option
                          value="Pendidikan"
                          {{ $sktm->jenis_sktm == 'Pendidikan' ? 'selected' : '' }}
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
                          value="{{ $sktm->nama }}"
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
                          value="{{ $sktm->tempat_lahir }}"
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
                            value="{{ $sktm->tanggal_lahir }}"
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
                              {{ $sktm->jenis_kelamin == $item->keterangan ? 'selected' : '' }}
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
                          value="{{ $sktm->nama_sekolah }}"
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
                          value="{{ $sktm->kelas }}"
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
                          value="{{ $sktm->jurusan }}"
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
                        >{{ $sktm->alamat_sekolah }}</textarea>
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
                            {{ $sktm->diwakili_oleh == 'Ayah' ? 'selected' : '' }}
                          >
                            Ayah
                          </option>
                          <option
                            value="Ibu"
                            {{ $sktm->diwakili_oleh == 'Ibu' ? 'selected' : '' }}
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
                      >{{ $sktm->redaksi }}</textarea>
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
                      >{{ $sktm->keperluan }}</textarea>
                      @if($errors->has('keperluan'))
                        <p class="text-danger">
                          {{ $errors->first('keperluan') }}
                        </p>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label for="">
                        Ditanda Tangani Oleh <small class="text-danger">*</small>
                      </label>
                      <select
                        name="perangkat_id"
                        id=""
                        class="form-control"
                      >
                        <option value="0">
                          -
                        </option>
                        @foreach($perangkat as $item)
                          <option
                            value="{{ $item->id }}"
                            {{ $sktm->perangkat_id == $item->id ? 'selected' : '' }}
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
  <script>
    var jenis_sktm = $('#jenis-sktm').val();
    var penduduk_id = $('#master-penduduk-id').val();

    if (penduduk_id != 0 || penduduk_id != null) {
      $.ajax({
        url: '/kependudukan/penduduk/api/data-by-id/'+penduduk_id,
        type: 'get',
        dataType: 'json',
        success: function(result){
          $('#nik').val(result.nik);
          $('#nama').val(result.nama);
          $('#tempat-lahir').val(result.tempat_lahir);
          $('#tanggal-lahir').val(result.tanggal_lahir);
          $('#jenis-kelamin').val(result.jenis_kelamin);
          $('#status-perkawinan').val(result.status_perkawinan);
          $('#agama').val(result.agama);
          $('#pendidikan').val(result.pendidikan);
          $('#pekerjaan').val(result.pekerjaan);
          $('#alamat').val(result.alamat);
        }
      });
    }

    if (jenis_sktm != "Pendidikan") {
      $('#sktm-pendidikan').hide();
    }else{
      $('#sktm-pendidikan').show();
    }

    $('#nik').typeahead({
      source: function(query, process) {
        $.ajax({
            url: '/kependudukan/penduduk/api/data-nik',
            type: 'get',
            dataType: 'json',
            success: function(json){
              return process(json)
            }
        });
      },
      autoSelect: true,
      templates: {
        suggestion: function(result){
          return 'Klik Tambah Data Penduduk, jika tidak menemukan data.';
        }
      },
      afterSelect: function(result){
        var nik = $('#nik').val();
        $.ajax({
          url: '/kependudukan/penduduk/api/data/'+nik,
          type: 'get',
          dataType: 'json',
          success: function(data){
            $('#master-penduduk-id').val(data.id);
            $('#nama').val(data.nama);
            $('#tempat-lahir').val(data.tempat_lahir);
            $('#tanggal-lahir').val(data.tanggal_lahir);
            $('#jenis-kelamin').val(data.jenis_kelamin);
            $('#status-perkawinan').val(data.status_perkawinan);
            $('#agama').val(data.agama);
            $('#pendidikan').val(data.pendidikan);
            $('#pekerjaan').val(data.pekerjaan);
            $('#alamat').val(data.alamat);
          }
        });
      }
    });
    $('#nama').typeahead({
      source: function(query, process) {
        $.ajax({
            url: '/kependudukan/penduduk/api/data-nama',
            type: 'get',
            dataType: 'json',
            success: function(json){
              return process(json)
            }
        });
      },
      autoSelect: true,
      templates: {
        suggestion: function(result){
          return 'Klik Tambah Data Penduduk, jika tidak menemukan data.';
        }
      },
      afterSelect: function(result){
        var nama = $('#nama').val();
        $.ajax({
          url: '/kependudukan/penduduk/api/data-by-nama/'+nama,
          type: 'get',
          dataType: 'json',
          success: function(data){
            $('#master-penduduk-id').val(data.id);
            $('#nik').val(data.nik);
            $('#nama').val(data.nama);
            $('#tempat-lahir').val(data.tempat_lahir);
            $('#tanggal-lahir').val(data.tanggal_lahir);
            $('#jenis-kelamin').val(data.jenis_kelamin);
            $('#status-perkawinan').val(data.status_perkawinan);
            $('#agama').val(data.agama);
            $('#pendidikan').val(data.pendidikan);
            $('#pekerjaan').val(data.pekerjaan);
            $('#alamat').val(data.alamat);
          }
        });
      }
    });
    $('#tanggal-lahir-anak').datetimepicker({
      format: 'DD-MM-YYYY',
      viewMode: 'years'
    });
    $('#ubah-keterangan-redaksi').click(function(e){
      e.preventDefault();
      $('#redaksi').prop('readonly', false);
      $('#redaksi').focus();
      $('#ubah-keterangan-redaksi').attr('disabled', true);
    });
    $('#jenis-sktm').change(function(e){
      var jenis_sktm = $('#jenis-sktm').val();

      if (jenis_sktm === "Pendidikan") {
        $('#sktm-pendidikan').show();
      }else{
        $('#sktm-pendidikan').hide();
      }
    });
  </script>
@endsection