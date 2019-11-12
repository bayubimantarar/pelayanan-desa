@extends('layouts.frontend.main')
@section('title')
Beranda
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
    Kegiatan
  </b>
</h3>
    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card">
          <img src="/assets/frontend/img/card.png" class="card-img-top" height="270">
          <div class="card-body">
            <p class="card-text">
              Desa Cilame bekerjasama dengan dinas tenaga kerja membuat sebuah workshop "Pelatihan Membuat Keajinan Lidi" yang diadakan ...
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card">
          <img src="/assets/frontend/img/card.png" class="card-img-top" height="270">
          <div class="card-body">
            <p class="card-text">
              Desa Cilame bekerjasama dengan dinas tenaga kerja membuat sebuah workshop "Pelatihan Membuat Keajinan Lidi" yang diadakan ...
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card">
          <img src="/assets/frontend/img/card.png" class="card-img-top" height="270">
          <div class="card-body">
            <p class="card-text">
              Desa Cilame bekerjasama dengan dinas tenaga kerja membuat sebuah workshop "Pelatihan Membuat Keajinan Lidi" yang diadakan ...
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
@endsection
