@extends('layouts.main')

@section('title')
  Form Tambah | Pelayanan Desa Cilame
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
        <li><a href="#">KAUR Umum - SKCK</a></li>
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
              <form action="/dasbor/kaur-umum/skck/simpan" method="post">
                <h4>
                  <b>IDENTITAS PENDUDUK</b>
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
                  <b>KETERANGAN SURAT</b>
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
                        value="{{ old('rt') }}"
                      >
                      @if($errors->has('rt'))
                        <p class="text-danger">
                          {{ $errors->first('rt') }}
                        </p>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-xs-12">
                    <div class="form-group {{ $errors->has('rt') ? 'has-error has-feedback' : '' }}">
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
                          value="{{ old('tertanggal_rt') }}"
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
                        value="{{ old('rw') }}"
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
                          value="{{ old('tertanggal_rw') }}"
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
                <div class="form-group {{ $errors->has('rt') ? 'has-error has-feedback' : '' }}">
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
                          <i class="fa fa-pencil"></i> Ubah
                        </button>
                      </label>
                      <textarea
                        name="redaksi"
                        class="form-control"
                        id="redaksi"
                        rows="5"
                        readonly
                      >Orang tersebut sebagaimana dalam catatan kami berkelakuan baik, belum pernah tersangkut perkara pidana, tidak terlibat minuman keras ataupun perjudian.</textarea>
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
                        Keterangan Keperluan <small class="text-danger">*</small>
                      </label>
                      <textarea
                        name="keperluan"
                        class="form-control"
                        id="keperluan"
                        rows="5"
                      >{{ old('keperluan') }}</textarea>
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
    src="/assets/js/moment.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/js/bootstrap-datetimepicker.min.js"
  ></script>
  @yield('identitas_penduduk_js')
  <script>
    $('#tertanggal-rt').datetimepicker({
      locale: 'id',
      format: 'DD-MM-YYYY'
    });
    $('#tertanggal-rw').datetimepicker({
      locale: 'id',
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
