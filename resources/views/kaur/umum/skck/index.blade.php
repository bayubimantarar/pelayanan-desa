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
      <h1 class="page-header">SKCK</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <p>
        <a href="/kaur-umum/skck/form-tambah" class="btn btn-sm btn-primary">
          <i class="fa fa-plus"></i> Tambah Data SKCK
        </a>
      </p>
      <div class="panel panel-default">
        <div class="panel-heading">
          Tabel Data SKCK
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table
              width="100%"
              class="table table-striped table-bordered table-hover"
              id="skck-table"
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
    var skck_table = $('#skck-table').DataTable({
      ajax: {
        url: '/kaur-umum/skck/data',
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

    // function destroy(id)
    // {
    //   var confirmation = confirm("Yakin akan menghapus data ini?");

    //   if (confirmation) {
    //     $.ajax({
    //         headers: {
    //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: '/master/penduduk/hapus/'+id,
    //         type: 'delete',
    //         dataType: 'json',
    //         success: function(result){
    //           alert('Data berhasil dihapus!');
    //           skck_table.ajax.reload();
    //         }
    //     });
    //   }
    // }
  </script>
@endsection
