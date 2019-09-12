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
      <h1 class="page-header">Form Tambah Data SKCK</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Form Tambah Data SKCK
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="/kaur-umum/skck/simpan" method="post">
                <h4>
                  Identitas Penduduk
                </h4>
                <hr />
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
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-xs-12">
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
                        readonly
                      />
                      @if($errors->has('nama'))
                        <p class="text-danger">
                          {{ $errors->first('nama') }}
                        </p>
                      @endif
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12">
                      <label
                        class="control-label"
                        for="jenis-kelamin"
                      >
                        Jenis Kelamin
                      </label>
                      <input
                        type="text"
                        name="jenis_kelamin"
                        class="form-control"
                        id="jenis-kelamin"
                        readonly
                      />
                      @if($errors->has('jenis_kelamin'))
                        <p class="text-danger">
                          {{ $errors->first('jenis_kelamin') }}
                        </p>
                      @endif
                    </div>
                  </div>
                </div>
                <h4>
                  Keterangan Surat
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
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-xs-12">
                      <label for="">
                        RT
                      </label>
                      <input
                        type="number"
                        name="rt"
                        class="form-control"
                      >
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12">
                      <label for="">
                        Tertanggal dari RT
                      </label>
                      <div
                        class="input-group date"
                        id="tertanggal-rt"
                      >
                        <input
                          type="text"
                          name="tertanggal_rt"
                          class="form-control"
                        />
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12">
                      <label for="">
                        RW
                      </label>
                      <input
                        type="number"
                        name="rw"
                        class="form-control"
                        id="datetimepicker"
                      >
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12">
                      <label for="">
                        Tertanggal dari RW
                      </label>
                      <div
                        class="input-group date"
                        id="tertanggal-rw"
                      >
                        <input
                          type="text"
                          name="tertanggal_rw"
                          class="form-control"
                        />
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label for="">
                        Keterangan Redaksi <a href="#"><i class="fa fa-pencil"></i> Ubah</a>
                      </label>
                      <textarea
                        name="redaksi"
                        class="form-control"
                        id=""
                        rows="5"
                        readonly
                      >Orang tersebut sebagaimana dalam catatan kami berkelakuan baik, belum pernah tersangkut perkara pidana, tidak terlibat minuman keras ataupun perjudian.</textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label for="">
                        Keterangan Keperluan
                      </label>
                      <textarea
                        name="redaksi"
                        class="form-control"
                        id=""
                        rows="5"
                      ></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label for="">
                        Ditanda Tangani Oleh
                      </label>
                      <select
                        name=""
                        id=""
                        class="form-control"
                      >
                        <option value="">
                          Kepala Desa - Aas Mohamad Asor, SH
                        </option>
                      </select>
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
  <script>
    $('#nik').typeahead({
      source: function(query, process) {
        $.ajax({
            url: '/master/penduduk/api/data-nik',
            type: 'get',
            dataType: 'json',
            success: function(json){
              return process(json)
            }
        });
      },
      autoSelect: true,
      afterSelect: function(result){
        var nik = $('#nik').val();
        $.ajax({
          url: '/master/penduduk/api/data/'+nik,
          type: 'get',
          dataType: 'json',
          success: function(data){
            $('#nama').val(data.nama);
            $('#jenis-kelamin').val(data.jenis_kelamin);
          }
        });
      }
    });
    $('#tertanggal-rt').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#tertanggal-rw').datetimepicker({
      format: 'DD-MM-YYYY'
    });
  </script>
@endsection
