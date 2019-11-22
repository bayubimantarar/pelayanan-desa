@extends('layouts.main')

@section('title')
  Dasbor | Pelayanan Desa Cilame
@endsection

@section('css')
  <!-- -->
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <ul class="breadcrumb">
        <li><a href="/">Dasbor</a></li>
        <li><a href="/dasbor/master/pengguna">Master - Pengguna</a></li>
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
                <form action="/dasbor/master/pengguna/ubah/{{ $pengguna->id }}" method="post">
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
                  <div class="form-group {{ $errors->has('nama') ? 'has-error has-feedback' : '' }}">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-xs-12">
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
                          id="nama"
                          value="{{ $pengguna->nama }}"
                        />
                        @if($errors->has('nama'))
                          <p class="text-danger">
                            {{ $errors->first('nama') }}
                          </p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                      <div class="form-group {{ $errors->has('email') ? 'has-error has-feedback' : '' }}">
                        <label for="" class="control-label">
                          Email
                        </label>
                        <input
                          type="text"
                          name="email"
                          class="form-control"
                          value="{{ $pengguna->email }}"
                        />
                        @if($errors->has('email'))
                          <p class="text-danger">
                            {{ $errors->first('email') }}
                          </p>
                        @endif
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                      <div class="form-group {{ $errors->has('password') ? 'has-error has-feedback' : '' }}">
                        <label for="" class="control-label">
                          Kata Sandi
                        </label>
                        <input
                          type="password"
                          name="password"
                          class="form-control"
                        />
                        @if($errors->has('password'))
                          <p class="text-danger">
                            {{ $errors->first('password') }}
                          </p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                      <div class="form-group {{ $errors->has('nomor_telepon') ? 'has-error has-feedback' : '' }}">
                        <label for="" class="control-label">
                          Nomor Telepon
                        </label>
                        <input
                          type="number"
                          name="nomor_telepon"
                          class="form-control"
                          value="{{ $pengguna->nomor_telepon }}"
                        />
                        @if($errors->has('nomor_telepon'))
                          <p class="text-danger">
                            {{ $errors->first('nomor_telepon') }}
                          </p>
                        @endif
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                      <div class="form-group {{ $errors->has('alamat') ? 'has-error has-feedback' : '' }}">
                        <label for="" class="control-label">
                          Alamat
                        </label>
                        <textarea
                          name="alamat"
                          class="form-control"
                          rows="5"
                        >{{ $pengguna->alamat }}</textarea>
                        @if($errors->has('alamat'))
                          <p class="text-danger">
                            {{ $errors->first('alamat') }}
                          </p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-xs-12">
                        <label for="control-label">
                          Jenis Pengguna
                        </label>
                        <select
                          name="jenis_pengguna"
                          class="form-control"
                        >
                          <option
                            value="Admin"
                            {{ $pengguna->jenis_pengguna == 'Admin' ? 'selected' : '' }}
                          >
                            Admin
                          </option>
                          <option
                            value="Pelayanan"
                            {{ $pengguna->jenis_pengguna == 'Pelayanan' ? 'selected' : '' }}
                          >
                            Pelayanan
                          </option>
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
  <!-- -->
@endsection
