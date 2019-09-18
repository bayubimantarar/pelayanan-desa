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
      <h1 class="page-header">Form Tambah Data Pendidikan</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Form Tambah Data Pendidikan
        </div>
        <div class="panel-body">
          <div class="row">
              <div class="col-lg-12">
                <form action="/master/pendidikan/simpan" method="post">
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
                          Keterangan
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
