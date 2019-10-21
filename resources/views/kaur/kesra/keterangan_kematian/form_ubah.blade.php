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
        <li><a href="#">KAUR Kesra - Keterangan Kematian</a></li>
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
              <form action="/kaur-kesra/keterangan-kematian/ubah/{{ $keteranganKematian->id }}" method="post">
                <h4>
                  <b>
                    Identitas Penduduk
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
                  value="{{ $keteranganKematian->penduduk_id }}"
                />
                @include('layouts.partials.form_ubah_identitas_penduduk')
                <h4>
                  <b>
                    KETERANGAN SURAT
                  </b>
                </h4>
                <hr />
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
                        value="{{ $keteranganKematian->nama }}"
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
                        value="{{ $keteranganKematian->tempat_lahir }}"
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
                          value="{{ $keteranganKematian->tanggal_lahir }}"
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
                            {{ $keteranganKematian->jenis_kelamin == $item->keterangan ? 'selected' : '' }}
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
                  <div class="col-lg-4 col-md-4 col-xs-12">
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
                          value="{{ $keteranganKematian->tanggal_meninggal }}"
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
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group">
                      <label
                        for=""
                        class="control-label"
                      >
                        Hari
                      </label>
                      <input
                        type="text"
                        name="hari_meninggal"
                        class="form-control"
                        id="hari-meninggal"
                        value="{{ $keteranganKematian->hari_meninggal }}"
                        readonly
                      />
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group">
                      <label for="">
                        Jam
                      </label>
                      <div
                        class="input-group date"
                        id="jam-meninggal"
                      >
                        <input
                          type="text"
                          name="jam_meninggal"
                          class="form-control"
                          value="{{ $keteranganKematian->jam_meninggal }}"
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
                        value="{{ $keteranganKematian->alamat_meninggal }}"
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
                        value="{{ $keteranganKematian->penyebab_meninggal }}"
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
                        value="{{ $keteranganKematian->hubungan_pelapor }}"
                      />
                      @if($errors->has('hubungan_pelapor'))
                        <p class="text-danger">
                          {{ $errors->first('hubungan_pelapor') }}
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
                            {{ $keteranganKematian->perangkat_id == $item->id ? 'selected' : '' }}
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
    src="/assets/js/moment-with-locales.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/js/bootstrap-datetimepicker.min.js"
  ></script>
  <script>
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
    $('#tanggal-meninggal').datetimepicker({
      format: 'DD-MM-YYYY',
      locale: 'id',
    }).on('dp.change', function(e){
      // console.log(e.date);
      console.log(e.date._d.getDay());
      var day = e.date._d.getDay();

      if (day == 1) {
        $('#hari-meninggal').val('Senin');
      }else if(day == 2){
        $('#hari-meninggal').val('Selasa');
      }else if(day == 3){
        $('#hari-meninggal').val('Rabu');
      }else if(day == 4){
        $('#hari-meninggal').val('Kamis');
      }else if(day == 5){
        $('#hari-meninggal').val('Jumat');
      }else if(day == 6){
        $('#hari-meninggal').val('Sabtu');
      }else if(day == 0){
        $('#hari-meninggal').val('Minggu');
      }
    });
    $('#jam-meninggal').datetimepicker({
      format: 'HH:mm',
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
