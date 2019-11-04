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
      <h1 class="page-header">Form Tambah Data Perangkat</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Form Tambah Data Perangkat
        </div>
        <div class="panel-body">
          <div class="row">
              <div class="col-lg-12">
                <form action="/dasbor/profil/perangkat/simpan" method="post">
                  <input
                    type="hidden"
                    name="_token"
                    value="{{ csrf_token() }}"
                  />
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-12">
                      <div class="form-group {{ $errors->has('nama') ? 'has-error has-feedback' : '' }}">
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-xs-12">
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
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12">
                      <div class="form-group {{ $errors->has('jabatan') ? 'has-error has-feedback' : '' }}">
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-xs-12">
                            <label
                              class="control-label"
                              for="jabatan"
                            >
                              Jabatan
                            </label>
                            <input
                              type="text"
                              name="jabatan"
                              class="form-control"
                              id="jabatan"
                              value="{{ old('jabatan') }}"
                            />
                            @if($errors->has('jabatan'))
                              <p class="text-danger">
                                {{ $errors->first('jabatan') }}
                              </p>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12">
                      <div class="form-group {{ $errors->has('status') ? 'has-error has-feedback' : '' }}">
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-xs-12">
                            <label
                              class="control-label"
                              for="status"
                            >
                              Bertanggung Jawab Atas Tanda Tangan Surat
                            </label>
                            <select
                              name="status"
                              id="status"
                              class="form-control"
                            >
                              <option
                                value="1"
                                {{ old('status') == '1' ? 'selected' : '' }}
                              >
                                Ya
                              </option>
                              <option
                                value="0"
                                {{ old('status') == '0' ? 'selected ': ''}}
                              >
                                Tidak
                              </option>
                            </select>
                            @if($errors->has('stau'))
                              <p class="text-danger">
                                {{ $errors->first('stau') }}
                              </p>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
