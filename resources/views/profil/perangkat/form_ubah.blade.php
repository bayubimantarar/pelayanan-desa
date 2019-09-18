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
      <h1 class="page-header">Form Ubah Data Perangkat</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Form Ubah Data Perangkat
        </div>
        <div class="panel-body">
          <div class="row">
              <div class="col-lg-12">
                <form action="/profil/perangkat/ubah/{{ $perangkat->id }}" method="post">
                  <input
                    type="hidden"
                    name="_method"
                    value="put"
                  />
                  <input
                    type="hidden"
                    name="_token"
                    value="{{ csrf_token() }}"
                  />
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
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
                              value="{{ $perangkat->nama }}"
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
                    <div class="col-lg-6 col-md-6 col-xs-12">
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
                              value="{{ $perangkat->jabatan }}"
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
  <!-- -->
@endsection
