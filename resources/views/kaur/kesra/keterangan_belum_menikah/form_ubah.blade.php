@extends('layouts.main')

@section('title')
  Dasbor | Pelayanan Desa Cilame
@endsection

@section('css')
  <link
    rel="stylesheet"
    href="/assets/css/select2.css"
  />
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <ul class="breadcrumb">
        <li><a href="#">Dasbor</a></li>
        <li><a href="#">KAUR Kesra - Keterangan Belum Menikah</a></li>
        <li class="active">Form Tambah</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Form Tambah Data Keterangan Belum Menikah
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="/dasbor/kaur-kesra/keterangan-belum-menikah/ubah/{{ $keteranganBelumMenikah->id }}" method="post">
                <h4>
                  <b>
                    IDENTITAS PENDUDUK
                  </b>
                </h4>
                <hr />
                <input
                  type="hidden"
                  name="_token"
                  value="{{ csrf_token() }}"
                />
                <input
                  type="hidden"
                  name="_method"
                  value="put"
                />
                <input
                  type="hidden"
                  name="pengguna_id"
                  value="{{ Auth::guard('pengguna')->User()->id }}"
                />
                <input
                  type="hidden"
                  name="penduduk_id"
                  id="master-penduduk-id"
                  value="{{ $keteranganBelumMenikah->penduduk_id }}"
                />
                @section('nik')
                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
                      <label
                        class="control-label"
                        for="penduduk-id"
                      >
                        NIK
                        <a
                          href="/dasbor/kependudukan/penduduk/form-tambah"
                        >
                          <i class="fa fa-plus"></i>
                          Tambah Data Penduduk
                        </a>
                      </label>
                      <select
                        name="nik_identitas"
                        class="form-control"
                        id="nik"
                        autocomplete="off"
                      >
                        <option
                          value="{{ $keteranganBelumMenikah->penduduk->nik }}"
                          selected="selected"
                        >
                          {{ $keteranganBelumMenikah->penduduk->nik }}
                        </option>
                      </select>
                    </div>
                  </div>
                @endsection
                @include('layouts.partials.form_ubah_identitas_penduduk')
                <h4>
                  <b>
                    KETERANGAN SURAT
                  </b>
                </h4>
                <hr />
                <div class="form-group {{ $errors->has('keperluan') ? 'has-error has-feedback' : '' }}">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label
                        for=""
                        class="control-label"
                      >
                        Keperluan <small class="text-danger">*</small>
                      </label>
                      <textarea
                        name="keperluan"
                        class="form-control"
                        rows="5"
                      >{{ $keteranganBelumMenikah->keperluan }}</textarea>
                      @if($errors->has('keperluan'))
                        <p class="text-danger">
                          {{ $errors->first('keperluan') }}
                        </p>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label for="">
                        Ditanda Tangani Oleh <small class="text-danger">*</small>
                      </label>
                      <select
                        name="perangkat_id"
                        id=""
                        class="form-control"
                      >
                        <option value="0">
                          -
                        </option>
                        @foreach($perangkat as $item)
                          <option
                            value="{{ $item->id }}"
                            {{ $keteranganBelumMenikah->perangkat_id == $item->id ? 'selected' : '' }}
                          >
                            {{ $item->jabatan }} - {{ $item->nama }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <p>
                  <small>
                    <code>
                      Label ber-simbol (*) perlu diisi/dipilih.
                    </code>
                  </small>
                </p>
                <button
                  type="submit"
                  class="btn btn-sm btn-social btn-vk"
                >
                  <i class="fa fa-check"></i> Simpan
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  @yield('identitas_penduduk_js')
@endsection
