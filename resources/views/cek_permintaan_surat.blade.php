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
      <form action="/cek-permintaan-surat/detail" action="get">
        <div class="form-group">
          <div class="row">
            <div class="col-lg-6 col-md-12-col-xs-12">
              <label for="">
                Kode Permintaan Surat <small class="text-danger">*</small>
              </label>
              <input
                type="text"
                name="kode_permintaan_surat"
                class="form-control"
              />
            </div>
          </div>
        </div>
        <button
          type="submit"
          id="kirim"
          class="btn btn-primary"
        >
          Cek Permintaan Surat
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
