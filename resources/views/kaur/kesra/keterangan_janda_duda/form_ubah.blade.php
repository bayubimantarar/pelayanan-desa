@extends('layouts.main')

@section('title')
  Dasbor | Pelayanan Desa Cilame
@endsection

@section('css')
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/css/bootstrap-datetimepicker.min.css"
  />
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
        <li><a href="#">KAUR Kesra - Keterangan Janda Duda</a></li>
        <li class="active">Form Tambah</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Form Tambah Data Keterangan Tidak Mampu
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="/dasbor/kaur-kesra/keterangan-janda-duda/ubah/{{ $keteranganJandaDuda->id }}" method="post">
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
                  value="{{ $keteranganJandaDuda->penduduk_id }}"
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
                          value="{{ $keteranganJandaDuda->penduduk->nik }}"
                          selected="selected"
                        >
                          {{ $keteranganJandaDuda->penduduk->nik }}
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
                <div class="form-group">
                  <div class="row">
                    <div class="col-6 col-md-6 col-xs-12">
                      <label for="">
                        Status <small class="text-danger">*</small>
                      </label>
                      <select
                        name="status"
                        class="form-control"
                      >
                        <option
                          value="Janda"
                          {{ $keteranganJandaDuda->status == 'Janda' ? 'selected' : '' }}
                        >
                          Janda
                        </option>
                        <option
                          value="Duda"
                          {{ $keteranganJandaDuda->status == 'Duda' ? 'selected' : '' }}
                        >
                          Duda
                        </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group {{ $errors->has('nama') ? 'has-error has-feedback' : '' }}">
                      <label
                        for=""
                        class="control-label"
                      >
                        Nama Lengkap <small class="text-danger">*</small>
                      </label>
                      <input
                        type="text"
                        name="nama"
                        class="form-control"
                        value="{{ $keteranganJandaDuda->nama }}"
                      />
                      @if($errors->has('nama'))
                        <p class="text-danger">
                          {{ $errors->first('nama') }}
                        </p>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group">
                      <label
                        for=""
                        class="control-label"
                      >
                        Nomor Pensiun
                      </label>
                      <input
                        type="text"
                        name="nomor_pensiun"
                        class="form-control"
                        value="{{ $keteranganJandaDuda->nomor_pensiun }}"
                      />
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group {{ $errors->has('tanggal_meninggal') ? 'has-error has-feedback' : '' }}">
                      <label
                        for=""
                        class="control-label"
                      >
                        Tanggal Meninggal <small class="text-danger">*</small>
                      </label>
                      <div
                        class="input-group date"
                        id="tanggal-meninggal"
                      >
                        <input
                          type="text"
                          name="tanggal_meninggal"
                          class="form-control"
                          value="{{ $keteranganJandaDuda->tanggal_meninggal }}"
                        />
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                      @if($errors->has('tanggal_meninggal'))
                        <p class="text-danger">
                          {{ $errors->first('tanggal_meninggal') }}
                        </p>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label
                        for=""
                        class="control-label"
                      >
                        Penerima Pensiun Dari Departemen/Instansi
                      </label>
                      <textarea
                        name="pensiunan"
                        class="form-control"
                        rows="5"
                      >{{ $keteranganJandaDuda->pensiunan }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label
                        for=""
                        class="control-label"
                      >
                        Ditanda Tangani Oleh <small class="text-danger">*</small>
                      </label>
                      <select
                        name="perangkat_id"
                        class="form-control"
                      >
                        <option value="0">
                          -
                        </option>
                        @foreach($perangkat as $item)
                          <option
                            value="{{ $item->id }}"
                            {{ $keteranganJandaDuda->perangkat_id == $item->id ? 'selected' : '' }}
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
  <script
    type="text/javascript"
    src="/assets/js/moment-with-locales.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/js/bootstrap-datetimepicker.min.js"
  ></script>
  @yield('identitas_penduduk_js')
  <script>
    $('#tanggal-meninggal').datetimepicker({
      locale: 'id',
      format: 'DD-MM-YYYY',
      viewMode: 'years'
    }).on('dp.change', function(e){
      var day = e.date._d.getDay();

      if (day == 1) {
        $('#hari-meninggal').val('Senin');
      }else if(day == 2){
        $('#hari-meninggal').val('Selasa');
      }else if(day == 3){
        $('#hari-meninggal').val('Rabu');
      }else if(day == 4){
        $('#hari-meninggal').val('Kamis');
      }else if(day == 5){
        $('#hari-meninggal').val('Jumat');
      }else if(day == 6){
        $('#hari-meninggal').val('Sabtu');
      }else if(day == 0){
        $('#hari-meninggal').val('Minggu');
      }
    });

    $('#ubah-keterangan-redaksi').click(function(e){
      e.preventDefault();
      $('#redaksi').prop('readonly', false);
      $('#redaksi').focus();
      $('#ubah-keterangan-redaksi').attr('disabled', true);
    });
  </script>
@endsection
