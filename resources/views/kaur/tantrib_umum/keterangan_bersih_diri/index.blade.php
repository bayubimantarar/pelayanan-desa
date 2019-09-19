@extends('layouts.main')

@section('title')
  Dasbor | Pelayanan Desa Cilame
@endsection

@section('css')
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/vendor/datatables-plugins/dataTables.bootstrap.css"
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
      <h1 class="page-header">Keterangan Bersih Diri</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <p>
        <a href="/kaur-tantrib-dan-umum/keterangan-bersih-diri/form-tambah" class="btn btn-sm btn-primary">
          <i class="fa fa-plus"></i> Tambah Data Keterangan Bersih Diri
        </a>
      </p>
      <div class="panel panel-default">
        <div class="panel-heading">
          Tabel Data Keterangan Bersih Diri
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table
              width="100%"
              class="table table-striped table-bordered table-hover"
              id="keterangan-bersi-diri-table"
            >
              <thead>
                <tr>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Opsi</th>
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
    var keterangan_bersih_diri = $('#keterangan-bersi-diri-table').DataTable({
      ajax: {
        url: '/kaur-tantrib-dan-umum/keterangan-bersih-diri/data',
        type: 'get'
      },
      datatype: 'json',
      columns: [
        {data: 'penduduk.nik'},
        {data: 'penduduk.nama'},
        {data: 'penduduk.alamat'},
        {data: 'action'}
      ],
      responsive: true
    });
  </script>
@endsection
