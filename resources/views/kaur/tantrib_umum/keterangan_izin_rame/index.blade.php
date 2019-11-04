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
      <ul class="breadcrumb">
        <li><a href="#">Dasbor</a></li>
        <li class="active">KAUR Tantrib & Umum - Keterangan Izin Rame-Rame</li>
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
      <p>
        <a
          href="/dasbor/kaur-tantrib-dan-umum/keterangan-izin-rame/form-tambah"
          class="btn btn-sm btn-social btn-vk"
        >
          <i class="fa fa-plus"></i> Tambah
        </a>
      </p>
      <div class="panel panel-default">
        <div class="panel-heading">
          Tabel Data
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table
              width="100%"
              class="table table-striped table-bordered table-hover"
              id="keterangan-izin-rame-table"
            >
              <thead>
                <tr>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Alamat</th>
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
    var keterangan_izin_rame = $('#keterangan-izin-rame-table').DataTable({
      ajax: {
        url: '/dasbor/kaur-tantrib-dan-umum/keterangan-izin-rame/data',
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
