@extends('layouts.main')

@section('title')
  Dasbor &raquo; KAUR Pemerintahan &raquo; Keterangan KK Sementara &raquo; Form Tambah | Pelayanan Desa Cilame
@endsection

@section('css')
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
        <li><a href="#">KAUR Pemerintahan - Keterangan Beda Identitas</a></li>
        <li class="active">Form Tambah</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Form Tambah
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="/dasbor/kaur-pemerintahan/keterangan-beda-identitas/simpan" method="post">
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
                  name="pengguna_id"
                  value="{{ Auth::guard('pengguna')->User()->id }}"
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
                <div class="form-group {{ $errors->has('jumlah_kesalahan') ? 'has-error has-feedback' : '' }}">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                      <label
                        for=""
                        class="control-label"
                      >
                        Jumlah Kesalahan Data <small class="text-danger">*</small>
                      </label>
                      <input
                        type="number"
                        name="jumlah_kesalahan"
                        class="form-control"
                        id="jumlah-kesalahan"
                        value="{{ old('jumlah_kesalahan') }}"
                      />
                      @if($errors->has('jumlah_kesalahan'))
                        <p class="text-danger">
                          {{ $errors->first('jumlah_kesalahan') }}
                        </p>
                      @endif
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
                        Redaksi Akhir Informasi Tercantum <small class="text-danger">*</small>
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
                        Keterangan Redaksi <small class="text-danger">*</small>
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
                            {{ old('perangkat_id') == $item->id ? 'selected' : '' }}
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
  @yield('identitas_penduduk_js')
  <script>
    var jumlah_kesalahan = $('#jumlah-kesalahan').val();

    if (jumlah_kesalahan != 0) {
      for(x=0; x<jumlah_kesalahan; x++){
        element =
          '<div class="row">'+
            '<div class="col-lg-6 col-md-6 col-xs-12">'+
              '<div class="form-group {{ $errors->has('data.'.$total) ? 'has-error has-feedback' : '' }}">'+
                '<label>Data <small class="text-danger">*</small></label>'+
                '<input type="text" name="data['+x+']" class="form-control" value="{{ old('data.'.$total) }}"/>'+
                '<p>{{ $errors->first('data.'.$total) }}</p>'+
              '</div>'+
            '</div>'+
            '<div class="col-lg-6 col-md-6 col-xs-12">'+
              '<div class="form-group">'+
                '<label>Keterangan <small class="text-danger">*</small></label>'+
                '<input type="text" name="keterangan['+x+']" class="form-control" />'+
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
                  '<label>Data <small class="text-danger">*</small></label>'+
                  '<input type="text" name="data[]" class="form-control" />'+
                '</div>'+
              '</div>'+
              '<div class="col-lg-6 col-md-6 col-xs-12">'+
                '<div class="form-group">'+
                  '<label>Keterangan <small class="text-danger">*</small></label>'+
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
