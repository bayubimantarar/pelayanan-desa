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
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <ul class="breadcrumb">
        <li><a href="#">Dasbor</a></li>
        <li><a href="#">KAUR Tantrib & Umum - Keterangan Izin Rame-Rame</a></li>
        <li class="active">Form Tambah</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Form Tambah Data Keterangan Izin Rame
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="/kaur-tantrib-dan-umum/keterangan-izin-rame/ubah/{{ $keteranganIzinRame->id }}" method="post">
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
                  name="pengguna_id"
                  value="{{ Auth::guard('pengguna')->User()->id }}"
                />
                <input
                  type="hidden"
                  name="penduduk_id"
                  id="master-penduduk-id"
                  value="{{ $keteranganIzinRame->penduduk_id }}"
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
                      <label for="">
                        Surat Pengantar Dari
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-3 col-xs-12">
                    <div class="form-group {{ $errors->has('rt') ? 'has-error has-feedback' : '' }}">
                      <label
                        for=""
                        class="control-label"
                      >
                        RT <small class="text-danger">*</small>
                      </label>
                      <input
                        type="number"
                        name="rt"
                        class="form-control"
                        value="{{ $keteranganIzinRame->rt }}"
                      >
                      @if($errors->has('rt'))
                        <p class="text-danger">
                          {{ $errors->first('rt') }}
                        </p>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-xs-12">
                    <div class="form-group {{ $errors->has('tertanggal_rt') ? 'has-error has-feedback' : '' }}">
                      <label
                        for=""
                        class="control-label"
                      >
                        Tertanggal dari RT <small class="text-danger">*</small>
                      </label>
                      <div
                        class="input-group date"
                        id="tertanggal-rt"
                      >
                        <input
                          type="text"
                          name="tertanggal_rt"
                          class="form-control"
                          value="{{ $keteranganIzinRame->tertanggal_rt_edit }}"
                        />
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                      @if($errors->has('tertanggal_rt'))
                        <p class="text-danger">
                          {{ $errors->first('tertanggal_rt') }}
                        </p>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-xs-12">
                    <div class="form-group {{ $errors->has('rw') ? 'has-error has-feedback' : '' }}">
                      <label
                        for=""
                        class="control-label"
                      >
                        RW <small class="text-danger">*</small>
                      </label>
                      <input
                        type="number"
                        name="rw"
                        class="form-control"
                        value="{{ $keteranganIzinRame->rw }}"
                      >
                      @if($errors->has('rw'))
                        <p class="text-danger">
                          {{ $errors->first('rw') }}
                        </p>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-xs-12">
                    <div class="form-group {{ $errors->has('tertanggal_rw') ? 'has-error has-feedback' : '' }}">
                      <label
                        for=""
                        class="control-label"
                      >
                        Tertanggal dari RW <small class="text-danger">*</small>
                      </label>
                      <div
                        class="input-group date"
                        id="tertanggal-rw"
                      >
                        <input
                          type="text"
                          name="tertanggal_rw"
                          class="form-control"
                          value="{{ $keteranganIzinRame->tertanggal_rw_edit }}"
                        />
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                      @if($errors->has('tertanggal_rw'))
                        <p class="text-danger">
                          {{ $errors->first('tertanggal_rw') }}
                        </p>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-3">
                    <div class="form-group {{ $errors->has('acara') ? 'has-error has-feedback' : '' }}">
                      <label
                        for=""
                        class="control-label"
                      >
                        Acara <small class="text-danger">*</small>
                      </label>
                      <input
                        type="text"
                        name="acara"
                        class="form-control"
                        value="{{ $keteranganIzinRame->acara }}"
                      >
                      @if($errors->has('acara'))
                        <p class="text-danger">
                          {{ $errors->first('acara') }}
                        </p>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <div class="form-group {{ $errors->has('tanggal_pelaksanaan') ? 'has-error has-feedback' : '' }}">
                      <label
                        for=""
                        class="control-label"
                      >
                        Tanggal Pelaksanaan <small class="text-danger">*</small>
                      </label>
                      <div
                        class="input-group date"
                        id="tanggal-pelaksanaan"
                      >
                        <input
                          type="text"
                          name="tanggal_pelaksanaan"
                          class="form-control"
                          value="{{ $keteranganIzinRame->tanggal_pelaksanaan }}"
                        />
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                      @if($errors->has('tanggal_pelaksanaan'))
                        <p class="text-danger">
                          {{ $errors->first('tanggal_pelaksanaan') }}
                        </p>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <div class="form-group {{ $errors->has('kegiatan') ? 'has-error has-feedback' : '' }}">
                      <label
                        for="kegiatan"
                        class="control-label"
                      >
                        Jenis Kegiatan / Hiburan <small class="text-danger">*</small>
                      </label>
                      <input
                        type="text"
                        name="kegiatan"
                        class="form-control"
                        id="kegiatan"
                        value="{{ $keteranganIzinRame->kegiatan }}"
                      >
                      @if($errors->has('kegiatan'))
                        <p class="text-danger">
                          {{ $errors->first('kegiatan') }}
                        </p>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <div class="form-group {{ $errors->has('waktu_pelaksanaan') ? 'has-error has-feedback' : '' }}">
                      <label
                        for="waktu-pelaksanaan"
                        class="control-label"
                      >
                        Waktu Pelaksanaan <small class="text-danger">*</small>
                      </label>
                      <input
                        type="text"
                        name="waktu_pelaksanaan"
                        class="form-control"
                        id="waktu-pelaksanaan"
                        value="{{ $keteranganIzinRame->waktu_pelaksanaan }}"
                      >
                      @if($errors->has('waktu_pelaksanaan'))
                        <p class="text-danger">
                          {{ $errors->first('waktu_pelaksanaan') }}
                        </p>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('alamat_pelaksanaan') ? 'has-error has-feedback' : '' }}">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label
                        for="alamat-pelaksanaan"
                        class="control-label"
                      >
                        Alamat Pelaksanaan <small class="text-danger">*</small>
                      </label>
                      <textarea
                        name="alamat_pelaksanaan"
                        class="form-control"
                        id="alamat-pelaksanaan"
                        rows="5"
                      >{{ $keteranganIzinRame->alamat_pelaksanaan }}</textarea>
                      @if($errors->has('alamat_pelaksanaan'))
                        <p class="text-danger">
                          {{ $errors->first('alamat_pelaksanaan') }}
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
                        class="form-control"
                      >
                        <option value="0">
                          -
                        </option>
                        @foreach($perangkat as $item)
                          <option
                            value="{{ $item->id }}"
                            {{ $keteranganIzinRame->perangkat_id == $item->id ? 'selected' : '' }}
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
    $('#tertanggal-rt').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#tertanggal-rw').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#tanggal-pelaksanaan').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#ubah-keterangan-redaksi').click(function(e){
      e.preventDefault();
      $('#redaksi').prop('readonly', false);
      $('#redaksi').focus();
      $('#ubah-keterangan-redaksi').attr('disabled', true);
    });
  </script>
@endsection
