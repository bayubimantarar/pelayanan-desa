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
        <li><a href="/dasbor/master/status-perkawinan">Master - Status Perkawinan</a></li>
        <li class="active">Form Tambah</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Form Tambah Data Status Perkawinan
        </div>
        <div class="panel-body">
          <div class="row">
              <div class="col-lg-12">
                <form action="/dasbor/master/status-perkawinan/simpan" method="post">
                  <input
                    type="hidden"
                    name="_token"
                    value="{{ csrf_token() }}"
                  />
                  <div class="form-group {{ $errors->has('keterangan') ? 'has-error has-feedback' : '' }}">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-xs-12">
                        <label
                          class="control-label"
                          for="keterangan"
                        >
                          Keterangan <small class="text-danger">*</small>
                        </label>
                        <input
                          type="text"
                          name="keterangan"
                          class="form-control"
                          id="keterangan"
                          value="{{ old('keterangan') }}"
                        />
                        @if($errors->has('keterangan'))
                          <p class="text-danger">
                            {{ $errors->first('keterangan') }}
                          </p>
                        @endif
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
