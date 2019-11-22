@extends('layouts.main')

@section('title')
  Dasbor &raquo; Pelayanan - Permintaan Surat &raquo; Form Proses | Pelayanan Desa Cilame
@endsection

@section('css')
  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/css/bootstrap-datetimepicker.min.css"
  />
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <ul class="breadcrumb">
        <li><a href="/">Dasbor</a></li>
        <li><a href="/dasbor/pelayanan/permintaan-surat">Pelayanan - Permintaan Surat</a></li>
        <li class="active">Form Proses</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Form Proses
        </div>
        <div class="panel-body">
          <h4>
            Identitas Permintaan Surat
          </h4>
          <hr />
          <div class="row">
              <div class="col-lg-12">
                <form action="/dasbor/pelayanan/permintaan-surat/proses/{{ $permintaanSurat->id }}" method="post">
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
                    value="{{ $permintaanSurat->penduduk_id }}"
                  />
                  <input
                    type="hidden"
                    name="kode_permintaan_surat"
                    value="{{ $permintaanSurat->kode_permintaan_surat }}"
                  />
                  <input
                    type="hidden"
                    name="surat"
                    value="{{ $permintaanSurat->surat }}"
                  />
                  @include('layouts.partials.detail_identitas_penduduk')
                  <h4>
                    Keterangan Surat
                  </h4>
                  <hr />
                  @if($permintaanSurat->surat == 'Keterangan Usaha')
                    @include('layouts.partials.form_surat.keterangan_usaha')
                  @elseif($permintaanSurat->surat == 'Keterangan Catatan Kepolisian (SKCK)')
                    @include('layouts.partials.form_surat.keterangan_catatan_kepolisian')
                  @elseif($permintaanSurat->surat == 'Keterangan Ghoib')
                    @include('layouts.partials.form_surat.keterangan_ghoib')
                  @elseif($permintaanSurat->surat == 'Keterangan Belum Memiliki Rumah')
                    @include('layouts.partials.form_surat.keterangan_belum_memiliki_rumah')
                  @elseif($permintaanSurat->surat == 'Keterangan Bersih Diri')
                    @include('layouts.partials.form_surat.keterangan_bersih_diri')
                  @elseif($permintaanSurat->surat == 'Keterangan Izin Rame-Rame')
                    @include('layouts.partials.form_surat.keterangan_izin_rame')
                  @elseif($permintaanSurat->surat == 'Keterangan Domisili')
                    @include('layouts.partials.form_surat.keterangan_domisili')
                  @elseif($permintaanSurat->surat == 'Keterangan Tanda Penduduk Sementara')
                    @include('layouts.partials.form_surat.keterangan_kartu_tanda_penduduk_sementara')
                  @elseif($permintaanSurat->surat == 'Keterangan Tidak Mampu')
                    @include('layouts.partials.form_surat.keterangan_tidak_mampu')
                  @elseif($permintaanSurat->surat == 'Keterangan Kelahiran')
                    @include('layouts.partials.form_surat.keterangan_kelahiran')
                  @elseif($permintaanSurat->surat == 'Keterangan Kematian')
                    @include('layouts.partials.form_surat.keterangan_kematian')
                  @elseif($permintaanSurat->surat == 'Keterangan Janda atau Duda')
                    @include('layouts.partials.form_surat.keterangan_janda_duda')
                  @elseif($permintaanSurat->surat == 'Keterangan Penghasilan')
                    @include('layouts.partials.form_surat.keterangan_penghasilan')
                  @elseif($permintaanSurat->surat == 'Keterangan Tidak Bekerja')
                    @include('layouts.partials.form_surat.keterangan_tidak_bekerja')
                  @elseif($permintaanSurat->surat == 'Keterangan Belum Menikah')
                    @include('layouts.partials.form_surat.keterangan_belum_menikah')
                  @endif
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                      <div class="form-group {{ $errors->has('tanggal_pengambilan') ? 'has-error has-feedback' : '' }}">
                        <label
                          class="control-label"
                          for="tanggal-pengambilan"
                        >
                          Tanggal Pengambilan <small class="text-danger">*</small>
                        </label>
                        <div
                          class="input-group date"
                          id="tanggal-pengambilan"
                        >
                          <input
                            type="text"
                            name="tanggal_pengambilan"
                            class="form-control"
                            value="{{ old('tanggal_lahir') }}"
                          />
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                        @if($errors->has('tanggal_lahir'))
                          <p class="text-danger">
                            {{ $errors->first('tanggal_lahir') }}
                          </p>
                        @endif
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                      <div class="form-group">
                        <label
                          for=""
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
                              {{ old('perangkat_id') == $item->id ? 'selected' : '' }}
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
    src="/assets/js/moment.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/js/moment.with-locales.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/js/bootstrap-datetimepicker.min.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/js/jquery-mask.js"
  ></script>
  @yield('identitas_penduduk_js')
  <script>
    $('#tanggal-pengambilan').datetimepicker({
      locale: 'id',
      format: 'DD-MM-YYYY'
    });

    $('#tanggal-pelaksanaan').datetimepicker({
      locale: 'id',
      format: 'DD-MM-YYYY'
    });

    $('#tanggal-lahir-ghoib').datetimepicker({
      locale: 'id',
      format: 'DD-MM-YYYY',
      viewMode: 'years'
    });

    $('#tanggal-pengambilan').datetimepicker({
      locale: 'id',
      format: 'DD-MM-YYYY'
    });

    $('#tertanggal-rt').datetimepicker({
      locale: 'id',
      format: 'DD-MM-YYYY'
    });

    $('#tertanggal-rw').datetimepicker({
      locale: 'id',
      format: 'DD-MM-YYYY'
    });

    var jenis_sktm = $('#jenis-sktm').val();

    if (jenis_sktm != "Pendidikan") {
      $('#sktm-pendidikan').hide();
    }else{
      $('#sktm-pendidikan').show();
    }

    $('#jenis-sktm').change(function(e){
      var jenis_sktm = $('#jenis-sktm').val();

      if (jenis_sktm === "Pendidikan") {
        $('#sktm-pendidikan').show();
      }else{
        $('#sktm-pendidikan').hide();
      }
    });

    $('#tanggal-lahir-anak').datetimepicker({
      locale: 'id',
      format: 'DD-MM-YYYY',
      viewMode: 'years'
    });

    $('#tanggal-meninggal').datetimepicker({
      locale: 'id',
      format: 'DD-MM-YYYY',
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

    // $('#penghasilan').mask('0.000.000.000', {reverse: true});

    $('#ubah-keterangan-redaksi').click(function(e){
      e.preventDefault();
      $('#redaksi').prop('readonly', false);
      $('#redaksi').focus();
      $('#ubah-keterangan-redaksi').attr('disabled', true);
    });
  </script>
@endsection
