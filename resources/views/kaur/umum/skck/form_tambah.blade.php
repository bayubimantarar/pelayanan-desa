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
              <form action="/master/penduduk/simpan" method="post">
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
                    <div class="col-lg-6 col-md-6 col-xs-12">
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
                  </div>
                </div>
                <h4>
                  Keterangan Surat
                </h4>
                <hr />
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
        }
      });
    }
  });
</script>
@endsection
