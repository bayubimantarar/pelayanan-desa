@extends('layouts.frontend.main')

@section('title')
Pelayanan &raquo; Permintaan Surat
@endsection

@section('content')
<div class="container">
  <!-- Page Heading/Breadcrumbs -->
  <h1 class="mt-4 mb-3">
    <small>Peta</small>
  </h1>

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/">Beranda</a>
    </li>
    <li class="breadcrumb-item active">
      Peta
    </li>
  </ol>

  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 mb-4">
      <iframe
        width="100%"
        height="400px"
        frameborder="0"
        scrolling="no"
        marginheight="0"
        marginwidth="0"
        src="http://maps.google.com/maps?q=-6.844742,107.518958&z=17&output=embed"
      ></iframe>
    </div>
  </div>
</div>
@endsection
