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
        <li><a href="#">KAUR Kesra - Keterangan Janda Duda</a></li>
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
              <form action="/kaur-kesra/keterangan-janda-duda/simpan" method="post">
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
                @include('layouts.partials.identitas_penduduk')
                <h4>
                  <b>
                    KETERANGAN SURAT
                  </b>
                </h4>
                <hr />
                <div class="form-group">
                  <div class="row">
                    <div class="col-6 col-md-6 col-xs-12">
                      <label for="">
                        Status <small class="text-danger">*</small>
                      </label>
                      <select
                        name="status"
                        class="form-control"
                      >
                        <option value="Janda">
                          Janda
                        </option>
                        <option value="Duda">
                          Duda
                        </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group">
                      <label for="">
                        Nama Lengkap <small class="text-danger">*</small>
                      </label>
                      <input
                        type="text"
                        name="nama"
                        class="form-control"
                      />
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group">
                      <label for="">
                        Nomor Pensiun
                      </label>
                      <input
                        type="text"
                        name="nomor_pensiun"
                        class="form-control"
                      />
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group">
                      <label for="">
                        Tanggal Meninggal
                      </label>
                      <div
                        class="input-group date"
                        id="tanggal-meninggal"
                      >
                        <input
                          type="text"
                          name="tanggal_meninggal"
                          class="form-control"
                          value="{{ old('tanggal_lahir') }}"
                        />
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label for="">
                        Penerima Pensiun Dari Departemen/Instansi
                      </label>
                      <textarea
                        name=""
                        class="form-control"
                        rows="5"
                      ></textarea>
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
                          <option value="{{ $item->id }}">
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
    $('#sktm-pendidikan').hide();
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
