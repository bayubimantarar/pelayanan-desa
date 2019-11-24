@extends('layouts.main')

@section('title')
  Dasbor | Pelayanan Desa Cilame
@endsection

@section('css')
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/vendor/datatables/css/dataTables.bootstrap.css"
  />
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/vendor/datatables-responsive/dataTables.responsive.css"
  />
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <ul class="breadcrumb">
        <li><a href="#">Dasbor</a></li>
        <li class="active">Pelayanan - Permintaan Surat</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      @if(session('notification'))
        <div class="alert alert-success" role="alert">
          {{ session('notification') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      <div class="panel panel-default">
        <div class="panel-heading">
          Tabel Data
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table
              width="100%"
              class="table table-striped table-bordered table-hover"
              id="permintaan-surat-table"
            >
              <thead>
                <tr>
                  <th>NIK</th>
                  <th>Permintaan Surat</th>
                  <th width="130">Status Pengambilan</th>
                  <th width="150">Opsi</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script
    type="text/javascript"
    src="/assets/vendor/datatables/js/jquery.dataTables.min.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/vendor/datatables-responsive/dataTables.responsive.js"
  ></script>
  <script>
    var permintaan_surat_table = $('#permintaan-surat-table').DataTable({
      ajax: {
        url: '/dasbor/pelayanan/pengambilan-surat/data',
        type: 'GET'
      },
      datatype: 'json',
      columns: [
        {data: 'permintaan_surat.nik'},
        {data: 'permintaan_surat.surat'},
        {data: 'status_pengambilan'},
        {data: 'action'}
      ],
      responsive: true
    });
  </script>
@endsection
