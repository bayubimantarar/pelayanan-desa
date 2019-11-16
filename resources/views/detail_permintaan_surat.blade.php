@extends('layouts.frontend.main')

@section('title')
Pelayanan &raquo; Permintaan Surat
@endsection

@section('content')
<div class="container">
  <!-- Page Heading/Breadcrumbs -->
  <h1 class="mt-4 mb-3">
    <small>Permintaan Surat</small>
  </h1>

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.html">Beranda</a>
    </li>
    <li class="breadcrumb-item active">Permintaan Surat</li>
  </ol>

  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 mb-4">
      <ul class="timeline">
        <li>
          <p>
            <b>
              Surat keterangan usaha sudah diambil
            </b>
          </p>
          <p><i class="fa fa-calendar"></i> 21 Maret 2014</p>
          <p>Surat sudah diambil oleh yang bersangkutan.</p>
        </li>
        <li>
          <p>
            <b>
              Surat keterangan usaha sudah diproses
            </b>
          </p>
          <p><i class="fa fa-calendar"></i> 4 Maret 2014</p>
          <p>
            Surat sudah diproses oleh <b>Staf Desa</b> - <b>Resti Wulandari</b> dan ditanda tangani oleh <b>Kepala Desa</b> -  <b>John Doe, S.kom</b>.<br /> Surat sudah bisa diambil di kantor desa.
          </p>
        </li>
        <li>
          <p>
            <b>
              Surat keterangan usaha belum diproses
            </b>
          </p>
          <p><i class="fa fa-calendar"></i> 1 April 2014</p>
          <p>Fusce ullamcorper ligula sit amet quam accumsan aliquet. Sed nulla odio, tincidunt vitae nunc vitae, mollis pharetra velit. Sed nec tempor nibh...</p>
        </li>
      </ul>
    </div>
  </div>
</div>
<br />
@endsection
