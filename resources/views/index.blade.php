@extends('layouts.frontend.main')

@section('title')
  Beranda | Desa {{ $pemerintahan->desa }}
@endsection

@section('content')
  @include('layouts.frontend.partials.header')
  <div class="container">
    <h3 class="my-4">
      <b>
        Desaku
      </b>
    </h3>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-xs-12">
        <p>
          Misi
        </p>
        <small>
          <b>
            <i>
              "{{ $pemerintahan->visi }}"
            </i>
          </b>
        </small>
      </div>
      <div class="col-lg-6 col-md-6 col-xs-12">
        <p>
          Visi
        </p>
        <ul>
          @foreach($misi as $item)
            <li>{{ $item }}</li>
          @endforeach
        </ul>
      </div>
    </div>
    <hr />
    <h3 class="my-4">
      <b>
        Kabar Desa
      </b>
    </h3>
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card">
          <img src="/uploads/img/kabar-desa@1.jpg" class="card-img-top" height="270">
          <div class="card-body">
            <p class="card-text">
              Masyarakat desa Cilame terutama para perempuan bekerja sebagai pemetik daun teh.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card">
          <img src="/uploads/img/kabar-desa@2.jpg" class="card-img-top" height="270">
          <div class="card-body">
            <p class="card-text">
              Para ibu-ibu desa Cilame sedang bergotong royong dalam pembangunan desa.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card">
          <img src="/uploads/img/kabar-desa@3.jpg" class="card-img-top" height="270">
          <div class="card-body">
            <p class="card-text">
              Pasar tradisional yang ada di desa Cilame, menjadi tumpuan ekonomi bagi masyarakat.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
