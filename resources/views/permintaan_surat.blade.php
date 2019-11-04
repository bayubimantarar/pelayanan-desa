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

    @if(session('notification'))
      <div class="alert {{ session('status') == true ? 'alert-success' : 'alert-danger' }}" role="alert">
        {{ session('notification') }}
      </div>
    @endif

  <!-- Contact Form -->
  <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 mb-4">
      <form action="/permintaan-surat/kirim" action="post">
        <input
          type="hidden"
          name="_token"
          value="{{ $token }}"
        />
        <div class="row">
          <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="form-group">
              <label
                class="control-label"
                for="nik"
              >
                No. KTP <small class="text-danger">*</small>
              </label>
              <input
                type="number"
                name="nik"
                id="nik"
                class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}"
                value="{{ old('nik') }}"
              />
              @if($errors->has('nik'))
                <div class="invalid-feedback">
                  {{ $errors->first('nik') }}
                </div>
              @endif
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="form-group">
              <label>
                Nama Lengkap <small class="text-danger">*</small>
              </label>
              <input
                type="text"
                name="nama"
                class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                value="{{ old('nama') }}"
              />
              @if($errors->has('nama'))
                <div class="invalid-feedback">
                  {{ $errors->first('nama') }}
                </div>
              @endif
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="form-group">
              <label>
              Nomor Telepon
                <small class="text-danger">*</small> <code>Nomor Aktif</code>
              </label>
              <input
                type="number"
                class="form-control {{ $errors->has('nomor_telepon') ? 'is-invalid' : '' }}"
                name="nomor_telepon"
                value="{{ old('nomor_telepon') }}"
              />
              @if($errors->has('nomor_telepon'))
                <div class="invalid-feedback">
                  {{ $errors->first('nomor_telepon') }}
                </div>
              @endif
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
              <label>
                Alamat <small class="text-danger">*</small>
              </label>
              <textarea
                class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}"
                name="alamat"
                rows="5"
              >{{ old('alamat') }}</textarea>
              @if($errors->has('alamat'))
                <div class="invalid-feedback">
                  {{ $errors->first('alamat') }}
                </div>
              @endif
            </div>
          </div>
        </div>
        <div class="control-group form-group">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
              <label>
                Surat
                <small class="text-danger">*</small>
              </label>
              <select
                name="surat"
                class="form-control {{ $errors->has('surat') ? 'is-invalid' : '' }}"
                id="surat"
              >
                <option
                  value=""
                >
                  --- Pilih Surat ---
                </option>
                @foreach($surat as $item)
                  <option
                    value="{{ $item->keterangan }}"
                    {{ old('surat') == $item->keterangan ? 'selected' : '' }}
                  >
                    {{ $item->keterangan }}
                  </option>
                @endforeach
              </select>
              @if($errors->has('surat'))
                <div class="invalid-feedback">
                  {{ $errors->first('surat') }}
                </div>
              @endif
            </div>
          </div>
        </div>
        <div id="form-surat">
          <div id="keterangan-usaha">
            @include('layouts.frontend.partials.form_surat.keterangan_usaha')
          </div>
          <div id="keterangan-catatan-kepolisian">
            @include('layouts.frontend.partials.form_surat.keterangan_catatan_kepolisian')
          </div>
          <div id="keterangan-ghoib">
            @include('layouts.frontend.partials.form_surat.keterangan_ghoib')
          </div>
          <div id="keterangan-bersih-diri">
            @include('layouts.frontend.partials.form_surat.keterangan_bersih_diri')
          </div>
          <div id="keterangan-kehilangan">
            @include('layouts.frontend.partials.form_surat.keterangan_kehilangan')
          </div>
          <div id="keterangan-izin-rame">
            @include('layouts.frontend.partials.form_surat.keterangan_izin_rame')
          </div>
          <div id="keterangan-domisili">
            @include('layouts.frontend.partials.form_surat.keterangan_domisili')
          </div>
          <div id="keterangan-beda-identitas">
            @include('layouts.frontend.partials.form_surat.keterangan_beda_identitas')
          </div>
          <div id="keterangan-kartu-keluarga-sementara">
            @include('layouts.frontend.partials.form_surat.keterangan_kartu_keluarga_sementara')
          </div>
          <div id="keterangan-tanda-penduduk-sementara">
            @include('layouts.frontend.partials.form_surat.keterangan_tanda_penduduk_sementara')
          </div>
          <div id="keterangan-tidak-mampu">
            @include('layouts.frontend.partials.form_surat.keterangan_tidak_mampu')
          </div>
          <div id="keterangan-kelahiran">
            @include('layouts.frontend.partials.form_surat.keterangan_kelahiran')
          </div>
          <div id="keterangan-kematian">
            @include('layouts.frontend.partials.form_surat.keterangan_kematian')
          </div>
          <div id="keterangan-janda-atau-duda">
            @include('layouts.frontend.partials.form_surat.keterangan_janda_atau_duda')
          </div>
          <div id="keterangan-penghasilan">
            @include('layouts.frontend.partials.form_surat.keterangan_penghasilan')
          </div>
          <div id="keterangan-tidak-bekerja">
            @include('layouts.frontend.partials.form_surat.keterangan_tidak_bekerja')
          </div>
          <div id="keterangan-belum-menikah">
            @include('layouts.frontend.partials.form_surat.keterangan_belum_menikah')
          </div>
          <div id="keterangan-tanggungan-keluarga">
            @include('layouts.frontend.partials.form_surat.keterangan_tanggungan_keluarga')
          </div>
          <div id="keterangan-belum-memiliki-rumah">
            @include('layouts.frontend.partials.form_surat.keterangan_belum_memiliki_rumah')
          </div>
        </div>
        <p>
          <code>
            ** Untuk ke-akuratan data dan informasi; <b>Penduduk</b> disarankan untuk melakukan proses permintaan surat melalui kantor desa setempat **
          </code>
        </p>
        <button
          type="submit"
          id="kirim"
          class="btn btn-primary"
        >
          Kirim Permintaan Surat
        </button>
      </form>
    </div>
  </div>
</div>

<script
  type="text/javascript"
  src="/assets/frontend/vendor/jquery/jquery.min.js"
></script>
<script>
  var surat = $('#surat').val();

  if (surat != '') {
    if (surat == 'Keterangan Usaha') {
        var tersedia = true;
        $('#keterangan-usaha').show();

        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Tidak Bekerja') {
        var tersedia = true;
        $('#keterangan-tidak-bekerja').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Catatan Kepolisian (SKCK)'){
        var tersedia = true;
        $('#keterangan-catatan-kepolisian').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Ghoib'){
        var tersedia = true;
        $('#keterangan-ghoib').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Bersih Diri'){
        var tersedia = true;
        $('#keterangan-bersih-diri').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Kehilangan'){
        var tersedia = true;
        $('#keterangan-kehilangan').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Izin Rame-Rame'){
        var tersedia = true;
        $('#keterangan-izin-rame').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Domisili'){
        var tersedia = true;
        $('#keterangan-domisili').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Beda Identitas'){
        var tersedia = false;
        $('#keterangan-beda-identitas').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Kartu Keluarga Sementara'){
        var tersedia = false;
        $('#keterangan-kartu-keluarga-sementara').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Tanda Penduduk Sementara'){
        var tersedia = true;
        $('#keterangan-tanda-penduduk-sementara').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Tidak Mampu'){
        var tersedia = true;
        var jenis_sktm = $('#jenis-sktm').val();
        $('#keterangan-tidak-mampu').show();


        if (jenis_sktm == "Pendidikan") {
          $('#sktm-pendidikan').show();
        }else{
          $('#sktm-pendidikan').hide();
        }

        $('#jenis-sktm').change(function(e){
          var jenis_sktm = $('#jenis-sktm').val();

          $('#sktm-pendidikan').hide();

          if (jenis_sktm == "Pendidikan") {
            $('#sktm-pendidikan').show();
          }else{
            $('#sktm-pendidikan').hide();
          }
        });

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Kelahiran'){
        var tersedia = true;
        $('#keterangan-kelahiran').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Kematian'){
        var tersedia = true;
        $('#keterangan-kematian').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Janda atau Duda'){
        var tersedia = true;
        $('#keterangan-janda-atau-duda').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Penghasilan'){
        var tersedia = true;
        $('#keterangan-penghasilan').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Belum Menikah'){
        var tersedia = true;
        $('#keterangan-belum-menikah').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Tanggungan Keluarga'){
        var tersedia = false;
        $('#keterangan-tanggungan-keluarga').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Belum Memiliki Rumah'){
        var tersedia = true;
        $('#keterangan-belum-memiliki-rumah').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
      }

  }else{
    $('#form-surat > div').hide();
    $('#sktm-pendidikan').hide();
  }

  $('#surat').change(function(){
    var surat = $('#surat').val();

    if (surat != '') {
      $('#form-surat').show();

      if (surat == 'Keterangan Usaha') {
        var tersedia = true;
        $('#keterangan-usaha').show();

        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Tidak Bekerja') {
        var tersedia = true;
        $('#keterangan-tidak-bekerja').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Catatan Kepolisian (SKCK)'){
        var tersedia = true;
        $('#keterangan-catatan-kepolisian').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Ghoib'){
        var tersedia = true;
        $('#keterangan-ghoib').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Bersih Diri'){
        var tersedia = true;
        $('#keterangan-bersih-diri').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Kehilangan'){
        var tersedia = true;
        $('#keterangan-kehilangan').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Izin Rame-Rame'){
        var tersedia = true;
        $('#keterangan-izin-rame').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Domisili'){
        var tersedia = true;
        $('#keterangan-domisili').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Beda Identitas'){
        var tersedia = false;
        $('#keterangan-beda-identitas').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Kartu Keluarga Sementara'){
        var tersedia = false;
        $('#keterangan-kartu-keluarga-sementara').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Tanda Penduduk Sementara'){
        var tersedia = true;
        $('#keterangan-tanda-penduduk-sementara').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Tidak Mampu'){
        var tersedia = true;
        $('#keterangan-tidak-mampu').show();

        $('#jenis-sktm').change(function(e){
          var jenis_sktm = $('#jenis-sktm').val();
          $('#sktm-pendidikan').hide();

          if (jenis_sktm === "Pendidikan") {
            $('#sktm-pendidikan').show();
          }else{
            $('#sktm-pendidikan').hide();
          }
        });

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Kelahiran'){
        var tersedia = true;
        $('#keterangan-kelahiran').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Kematian'){
        var tersedia = true;
        $('#keterangan-kematian').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Janda atau Duda'){
        var tersedia = true;
        $('#keterangan-janda-atau-duda').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Penghasilan'){
        var tersedia = true;
        $('#keterangan-penghasilan').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Belum Menikah'){
        var tersedia = true;
        $('#keterangan-belum-menikah').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-tanggungan-keluarga').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Tanggungan Keluarga'){
        var tersedia = false;
        $('#keterangan-tanggungan-keluarga').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-belum-memiliki-rumah').hide();
      }else if(surat == 'Keterangan Belum Memiliki Rumah'){
        var tersedia = true;
        $('#keterangan-belum-memiliki-rumah').show();

        $('#keterangan-usaha').hide();
        $('#keterangan-tidak-bekerja').hide();
        $('#keterangan-catatan-kepolisian').hide();
        $('#keterangan-ghoib').hide();
        $('#keterangan-bersih-diri').hide();
        $('#keterangan-kehilangan').hide();
        $('#keterangan-izin-rame').hide();
        $('#keterangan-domisili').hide();
        $('#keterangan-beda-identitas').hide();
        $('#keterangan-kartu-keluarga-sementara').hide();
        $('#keterangan-tanda-penduduk-sementara').hide();
        $('#keterangan-tidak-mampu').hide();
        $('#keterangan-kelahiran').hide();
        $('#keterangan-kematian').hide();
        $('#keterangan-janda-atau-duda').hide();
        $('#keterangan-penghasilan').hide();
        $('#keterangan-belum-menikah').hide();
        $('#keterangan-tanggungan-keluarga').hide();
      }
    }else if(surat == ''){
      $('#form-surat > div').hide();
    }

    if (surat != '') {
      if(tersedia == true) {
        $('#kirim').attr('disabled', false).removeClass('disabled');;
      }else{
        $('#kirim').attr('disabled', true).addClass('disabled');
      }
    }else{

    }
  });
</script>
@endsection
