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
        <li><a href="#">KAUR Umum - Keterangan Ghoib</a></li>
        <li class="active">Form Tambah</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Form Tambah Data Keterangan Ghoib
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="/dasbor/kaur-umum/keterangan-ghoib/simpan" method="post">
                <h4>
                  Identitas Penduduk
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
                <h4>
                  Keterangan Surat
                </h4>
                <hr />
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
                      >Bersangkutan adalah benar sebagai penduduk / warga Desa Cilame Kecamatan Ngamprah Kabupaten Bandung Barat. Saat ini yang bersangkutan :</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group {{ $errors->has('nama') ? 'has-error has-feedback' : '' }}">
                      <label
                        class="control-label"
                        for="nama"
                      >
                        Nama Lengkap <small class="text-danger">*</small>
                      </label>
                      <input
                        type="text"
                        name="nama"
                        class="form-control"
                        value="{{ old('nama') }}"
                      >
                      @if($errors->has('nama'))
                        <p class="text-danger">
                          {{ $errors->first('nama') }}
                        </p>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group {{ $errors->has('tempat_lahir') ? 'has-error has-feedback' : '' }}">
                      <label
                        class="control-label"
                        for="tempat-lahir"
                      >
                        Tempat Lahir <small class="text-danger">*</small>
                      </label>
                      <input
                        type="text"
                        name="tempat_lahir"
                        class="form-control"
                        value="{{ old('tempat_lahir') }}"
                      >
                      @if($errors->has('tempat_lahir'))
                        <p class="text-danger">
                          {{ $errors->first('tempat_lahir') }}
                        </p>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error has-feedback' : '' }}">
                      <label
                        class="control-label"
                        for="tanggal-lahir-ghoib"
                      >
                        Tanggal Lahir <small class="text-danger">*</small>
                      </label>
                      <div
                        class="input-group date"
                        id="tanggal-lahir-ghoib"
                      >
                        <input
                          type="text"
                          name="tanggal_lahir"
                          class="form-control"
                          value="{{ old('tanggal_lahir') }}"
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
                </div>
                <div class="form-group {{ $errors->has('alamat') ? 'has-error has-feedback' : '' }}">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label
                        class="control-label"
                        for="alamat"
                      >
                        Alamat <small class="text-danger">*</small>
                      </label>
                      <textarea
                        name="alamat"
                        class="form-control"
                        id=""
                        rows="5"
                      >{{ old('alamat') }}</textarea>
                      @if($errors->has('alamat'))
                        <p class="text-danger">
                          {{ $errors->first('alamat') }}
                        </p>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('alasan') ? 'has-error has-feedback' : '' }}">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label
                        for=""
                        class="control-label"
                      >
                        Alasan Ghoib <small class="text-danger">*</small>
                      </label>
                      <textarea
                        name="alasan"
                        class="form-control"
                        id="alasan"
                        rows="5"
                      >{{ old('alasan') }}</textarea>
                      @if($errors->has('alasan'))
                        <p class="text-danger">
                          {{ $errors->first('alasan') }}
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
                        id="profil-perangkat-id"
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
