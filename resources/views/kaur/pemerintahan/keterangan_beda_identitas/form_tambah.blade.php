@extends('layouts.main')

@section('title')
  Dasbor &raquo; KAUR Pemerintahan &raquo; Keterangan KK Sementara &raquo; Form Tambah | Pelayanan Desa Cilame
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
        <li><a href="#">KAUR Pemerintahan - Keterangan Beda Identitas</a></li>
        <li class="active">Form Tambah</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Form Data Baru Keterangan Kartu Keluarga Sementara
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="/kaur-pemerintahan/keterangan-beda-identitas/simpan" method="post">
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
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label
                        class="control-label"
                        for="alamat"
                      >
                        Redaksi Awal Informasi Tercantum
                        <button
                          id="ubah-keterangan-redaksi-tercantum-awal"
                          class="btn btn-sm btn-social btn-warning"
                        >
                          <i class="fa fa-pencil"></i> Ubah
                        </button>
                      </label>
                      <textarea
                        class="form-control"
                        name="redaksi_tercantum_awal"
                        id="redaksi-tercantum-awal"
                        rows="5"
                        readonly
                      >Seperti yang tercantum di</textarea>
                    </div>
                  </div>
                </div>
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
                        Jumlah Kesalahan Data
                      </label>
                      <input
                        type="number"
                        name="jumlah_kesalahan"
                        class="form-control"
                        id="jumlah-kesalahan"
                      />
                    </div>
                  </div>
                </div>
                <div id="form-keluarga"></div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label
                        class="control-label"
                        for="alamat"
                      >
                        Redaksi Akhir Informasi Tercantum
                        <button
                          id="ubah-keterangan-redaksi-tercantum-akhir"
                          class="btn btn-sm btn-social btn-warning"
                        >
                          <i class="fa fa-pencil"></i> Ubah
                        </button>
                      </label>
                      <textarea
                        name="redaksi_tercantum_akhir"
                        class="form-control"
                        id="redaksi-tercantum-akhir"
                        rows="5"
                        readonly
                      >Seperti yang tercantum di</textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label for="">
                        Keterangan Redaksi
                        <button
                          id="ubah-keterangan-redaksi"
                          class="btn btn-sm btn-social btn-warning"
                        >
                          <i class="fa fa-pencil"></i> Ubah
                        </button>
                      </label>
                      <textarea
                        name="redaksi"
                        class="form-control"
                        id="redaksi"
                        rows="5"
                        readonly
                      >Bersangkutan benar sebagai penduduk / warga Desa Cilame, dimana terdapat perbedaan penulisan namun dari kedua data tersebut masih menunjukan orang yang sama.</textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label for="">
                        Ditanda Tangani Oleh
                      </label>
                      <select
                        name="profil_perangkat_id"
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
    src="/assets/js/moment.min.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/js/bootstrap-datetimepicker.min.js"
  ></script>
  <script>
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
    $('#ubah-keterangan-redaksi').click(function(event){
      event.preventDefault();
      $('#redaksi').prop('readonly', false);
      $('#redaksi').focus();
      $('#ubah-keterangan-redaksi').attr('disabled', true);
    });
    $('#ubah-keterangan-redaksi-tercantum-awal').click(function(event){
      event.preventDefault();
      $('#redaksi-tercantum-awal').prop('readonly', false);
      $('#redaksi-tercantum-awal').focus();
      $('#ubah-keterangan-redaksi-tercantum-awal').attr('disabled', true);
    });
    $('#ubah-keterangan-redaksi-tercantum-akhir').click(function(event){
      event.preventDefault();
      $('#redaksi-tercantum-akhir').prop('readonly', false);
      $('#redaksi-tercantum-akhir').focus();
      $('#ubah-keterangan-redaksi-tercantum-akhir').attr('disabled', true);
    });
    $('#jumlah-kesalahan').keyup(function(event){
      var element;
      var jumlah_kesalahan = $('#jumlah-kesalahan').val();
      if(jumlah_kesalahan == 0 || jumlah_kesalahan == '') {
        $('#form-keluarga').empty().hide();
      }else{
        for(x=0; x<jumlah_kesalahan; x++){
          element =
            '<div class="row">'+
              '<div class="col-lg-6 col-md-6 col-xs-12">'+
                '<div class="form-group">'+
                  '<label>Data</label>'+
                  '<input type="text" name="data[]" class="form-control" />'+
                '</div>'+
              '</div>'+
              '<div class="col-lg-6 col-md-6 col-xs-12">'+
                '<div class="form-group">'+
                  '<label>Keterangan</label>'+
                  '<input type="text" name="keterangan[]" class="form-control" />'+
                '</div>'+
              '</div>'+
            '</div>';
          $('#form-keluarga').append(element).show();
          $('.tanggal-lahir').datetimepicker({
            format: 'DD-MM-YYYY',
            viewMode: 'years'
          });
        }
      }
    });
  </script>
@endsection
