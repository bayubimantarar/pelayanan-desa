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
      <div class="col-lg-5 col-md-5 col-xs-12">
        <p>Desa {{ $pemerintahan->desa }} merupakan desa terluas, yaitu sebesar 25 Rukun Warga dengan jumlah penduduk sekitar 27000 jiwa.</p>
        <small>
          <b>
            <i>
              "Terjuwudnya masyarakat yang cerdas, kreatif, dan mandiri."
            </i>
          </b>
        </small>
      </div>
      <div class="col-lg-7 col-md-7 col-xs-12">
        <p>
          Misi
        </p>
        <ul>
          <li>Mendukung kreativitas dan peningkatan kualitas pada masyarakat</li>
          <li>Mendorong peningkatan kegiatan pemberdayaan perkonomian masyarakat</li>
          <li>Meningkatkan kapasitas aparat pemerintahan desa dan kemasyarakatan desa</li>
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
