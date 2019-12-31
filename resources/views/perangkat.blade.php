@extends('layouts.frontend.main')

@section('title')
  Pelayanan &raquo; Permintaan Surat
@endsection

@section('content')
<div class="container">
  <!-- Page Heading/Breadcrumbs -->
  <h1 class="mt-4 mb-3">
    <small>Perangkat</small>
  </h1>

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/">Beranda</a>
    </li>
    <li class="breadcrumb-item active">
      Perangkat
    </li>
  </ol>

  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 mb-4">
      <div class="row">
        @foreach($perangkat as $item)
          <div class="col-lg-3 col-md-3 col-xs-12 mb-4">
            <div class="card h-100">
              <img
                class="card-img-top"
                src="/uploads/img/{{ $item->jenis_kelamin == 'Laki-laki' ? 'avatar-male.png' : 'avatar-female.png' }}"
                alt="Card image"
              />
              <div class="card-body" style="text-align: center;">
                <p class="card-title">
                  <b>
                    {{ $item->nama }}
                  </b>
                </p>
                <p class="card-text">{{ $item->jabatan }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
