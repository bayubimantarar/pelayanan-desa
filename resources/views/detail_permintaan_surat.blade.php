@extends('layouts.frontend.main')

@section('title')
Pelayanan &raquo; Permintaan Surat
@endsection

@section('content')
<div class="container">
  <!-- Page Heading/Breadcrumbs -->
  <h1 class="mt-4 mb-3">
    <small>Cek Permintaan Surat</small>
  </h1>

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/">Beranda</a>
    </li>
    <li class="breadcrumb-item active">
      Cek Permintaan Surat
    </li>
  </ol>

  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 mb-4">
      @if($totalPermintaanSuratStatus != 0)
        <ul class="timeline">
          @foreach($permintaanSuratStatus as $item)
            <li>
              <p>
                <b>
                  {{ $item->status_proses }}
                </b>
              </p>
              <p><i class="fa fa-calendar"></i> {{ $item->tanggal_status }}</p>
              <p>{{ $item->keterangan }}</p>
            </li>
          @endforeach
        </ul>
      @else
        <p>
          Tidak ada permintaan surat yang sesuai dengan kode {{ $kodePermintaanSurat }}
        </p>
      @endif
    </div>
  </div>
</div>
<br />
@endsection
