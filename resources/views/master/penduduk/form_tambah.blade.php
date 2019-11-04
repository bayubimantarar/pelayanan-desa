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
      <h1 class="page-header">Form Tambah Data Penduduk</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Form Tambah Data Penduduk
        </div>
        <div class="panel-body">
          <h4>
            Identitas Penduduk
          </h4>
          <hr />
          <div class="row">
              <div class="col-lg-12">
                <form action="/dasbor/master/penduduk/simpan" method="post">
                  <input
                    type="hidden"
                    name="_token"
                    value="{{ csrf_token() }}"
                  />
                  <div class="form-group {{ $errors->has('nik') ? 'has-error has-feedback' : '' }}">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-xs-12">
                        <label
                          class="control-label"
                          for="nik"
                        >
                          NIK
                        </label>
                        <input
                          type="text"
                          name="nik"
                          class="form-control"
                          id="nik"
                          value="{{ old('nik') }}"
                        />
                        @if($errors->has('nik'))
                          <p class="text-danger">
                            {{ $errors->first('nik') }}
                          </p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-xs-12">
                      <div class="form-group {{ $errors->has('nama') ? 'has-error has-feedback' : '' }}">
                        <label
                          class="control-label"
                          for="nama"
                        >
                          Nama Lengkap
                        </label>
                        <input
                          type="text"
                          name="nama"
                          class="form-control"
                          id="nama"
                          value="{{ old('nama') }}"
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
                          class="control-label"
                          for="tempat-lahir"
                        >
                          Tempat Lahir
                        </label>
                        <input
                          type="text"
                          name="tempat_lahir"
                          class="form-control"
                          id="tempat-lahir"
                          value="{{ old('tempat_lahir') }}"
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
                          class="control-label"
                          for="tanggal-lahir"
                        >
                          Tanggal Lahir
                        </label>
                        <div
                          class="input-group date"
                          id="tanggal-lahir"
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
                    <div class="col-lg-3 col-md-3 col-xs-12">
                      <div class="form-group">
                        <label
                          class="control-label"
                          for="jenis-kelamin"
                        >
                          Jenis Kelamin
                        </label>
                        <select
                          name="jenis_kelamin"
                          class="form-control"
                          id="jenis-kelamin"
                        >
                          @foreach($jenisKelamin as $item)
                            <option
                              value="{{ $item->keterangan }}"
                              {{ old('jenis_kelamin') === $item->keterangan ? 'selected' : ''}}
                            >
                              {{ $item->keterangan }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-xs-12">
                      <div class="form-group">
                        <label
                        class="control-label"
                        for="status-perkawinan"
                      >
                        Status Perkawinan
                      </label>
                      <select
                        name="status_perkawinan"
                        class="form-control"
                        id="status-perkawinan"
                      >
                        @foreach($statusPerkawinan as $item)
                          <option
                            value="{{ $item->keterangan }}"
                            {{ old('status_perkawinan') === $item->keterangan ? 'selected' : ''}}
                          >
                            {{ $item->keterangan }}
                          </option>
                        @endforeach
                      </select>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12">
                      <div class="form-group">
                        <label
                          class="control-label"
                          for="agama"
                        >
                          Agama
                        </label>
                        <select
                          name="agama"
                          class="form-control"
                          id="agama"
                        >
                          @foreach($agama as $item)
                            <option
                              value="{{ $item->keterangan }}"
                              {{ old('agama') === $item->keterangan ? 'selected' : ''}}
                            >
                              {{ $item->keterangan }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12">
                      <div class="form-group">
                        <label
                          class="control-label"
                          for="pendidikan"
                        >
                          Pendidikan
                        </label>
                        <select
                          name="pendidikan"
                          class="form-control"
                          id="pendidikan"
                        >
                          @foreach($pendidikan as $item)
                            <option
                              value="{{ $item->keterangan }}"
                              {{ old('pendidikan') === $item->keterangan ? 'selected' : ''}}
                            >
                              {{ $item->keterangan }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12">
                      <div class="form-group {{ $errors->has('pekerjaan') ? 'has-error has-feedback' : '' }}">
                        <label
                          class="control-label"
                          for="pekerjaan"
                        >
                          Pekerjaan
                        </label>
                        <input
                          type="text"
                          name="pekerjaan"
                          class="form-control"
                          id="pekerjaan"
                          value="{{ old('pekerjaan') }}"
                        />
                        @if($errors->has('pekerjaan'))
                          <p class="text-danger">
                            {{ $errors->first('pekerjaan') }}
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
                          Alamat
                        </label>
                        <textarea
                          name="alamat"
                          class="form-control"
                          id="alamat"
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
                  <button
                    type="submit"
                    class="btn btn-primary"
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
    src="/assets/js/moment.min.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/js/moment.with-locales.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/js/bootstrap-datetimepicker.min.js"
  ></script>
  <script>
    $('#tanggal-lahir').datetimepicker({
      format: 'DD-MM-YYYY',
      viewMode: 'years'
    });
  </script>
@endsection
