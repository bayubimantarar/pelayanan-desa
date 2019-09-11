@extends('layouts.main')

@section('title')
  Dasbor | Pelayanan Desa Cilame
@endsection

@section('css')
<!-- no custom css in this page -->
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
          <div class="row">
              <div class="col-lg-12">
                <form action="/master/penduduk/simpan" method="post">
                  <input
                    type="hidden"
                    name="_token"
                    value="{{ csrf_token() }}"
                  />
                  <div class="form-group {{ $errors->has('nik') ? 'has-error has-feedback' : '' }}">
                    <div class="row">
                      <div class="col-lg-5 col-md-5 col-xs-12">
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
                  <div class="form-group {{ $errors->has('nama') ? 'has-error has-feedback' : '' }}">
                    <div class="row">
                      <div class="col-lg-5 col-md-5 col-xs-12">
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
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-5 col-md-5 col-xs-12">
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
                          <option
                            value="Laki-laki"
                            {{ old('jenis_kelamin') === 'Laki-laki' ? 'selected' : ''}}
                          >
                            Laki-laki
                          </option>
                          <option
                            value="Perempuan"
                            {{ old('jenis_kelamin') === 'Perempuan' ? 'selected' : ''}}
                          >
                            Perempuan
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-5 col-md-5 col-xs-12">
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
                          <option
                            value="Kawin"
                            {{ old('status_perkawinan') === 'Kawin' ? 'selected' : ''}}
                          >
                            Kawin
                          </option>
                          <option
                            value="Belum Kawin"
                            {{ old('status_perkawinan') === 'Belum Kawin' ? 'selected' : ''}}
                          >
                            Belum Kawin
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-5 col-md-5 col-xs-12">
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
                          <option
                            value="Islam"
                            {{ old('agama') === 'Islam' ? 'selected' : ''}}
                          >
                            Islam
                          </option>
                          <option
                            value="Kristen"
                            {{ old('agama') === 'Kristen' ? 'selected' : ''}}
                          >
                            Kristen
                          </option>
                          <option
                            value="Katolik"
                            {{ old('agama') === 'Katolik' ? 'selected' : ''}}
                          >
                            Katolik
                          </option>
                          <option
                            value="Hindu"
                            {{ old('agama') === 'Hindu' ? 'selected' : ''}}
                          >
                            Hindu
                          </option>
                          <option
                            value="Buddha"
                            {{ old('agama') === 'Buddha' ? 'selected' : ''}}
                          >
                            Buddha
                          </option>
                          <option
                            value="Kong Hu Cu"
                            {{ old('agama') === 'Kong Hu Cu' ? 'selected' : ''}}
                          >
                            Kong Hu Cu
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-5 col-md-5 col-xs-12">
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
                          <option
                            value="SD"
                            {{ old('pendidikan') === 'SD' ? 'selected' : ''}}
                          >
                            SD
                          </option>
                          <option
                            value="SMP"
                            {{ old('pendidikan') === 'SMP' ? 'selected' : ''}}
                          >
                            SMP
                          </option>
                          <option
                            value="SMA"
                            {{ old('pendidikan') === 'SMA' ? 'selected' : ''}}
                          >
                            SMA
                          </option>
                          <option
                            value="D3"
                            {{ old('pendidikan') === 'D3' ? 'selected' : ''}}
                          >
                            D3
                          </option>
                          <option
                            value="S1"
                            {{ old('pendidikan') === 'S1' ? 'selected' : ''}}
                          >
                            S1
                          </option>
                          <option
                            value="S2"
                            {{ old('pendidikan') === 'S2' ? 'selected' : ''}}
                          >
                            S2
                          </option>
                          <option
                            value="S3"
                            {{ old('pendidikan') === 'S3' ? 'selected' : ''}}
                          >
                            S3
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('pekerjaan') ? 'has-error has-feedback' : '' }}">
                    <div class="row">
                      <div class="col-lg-5 col-md-5 col-xs-12">
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
                      <div class="col-lg-5 col-md-5 col-xs-12">
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
<!-- no custom js in this page -->
@endsection
