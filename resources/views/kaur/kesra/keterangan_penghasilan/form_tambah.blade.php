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
        <li><a href="#">KAUR Kesra - Keterangan Penghasilan</a></li>
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
              <form action="/dasbor/kaur-kesra/keterangan-penghasilan/simpan" method="post">
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
                  name="pengguna_id"
                  value="{{ Auth::guard('pengguna')->User()->id }}"
                />
                @include('layouts.partials.identitas_penduduk')
                <h4>
                  <b>
                    KETERANGAN SURAT
                  </b>
                </h4>
                <hr />
                <div class="form-group {{ $errors->has('penghasilan') ? 'has-error has-feedback' : '' }}">
                  <div class="row">
                    <div class="col-6 col-md-6 col-xs-12">
                      <label
                        for=""
                        class="control-label"
                      >
                        Penghasilan Rp. <small class="text-danger">*</small>
                      </label>
                      <input
                        type="text"
                        name="penghasilan"
                        class="form-control"
                        value="{{ old('penghasilan') }}"
                      />
                      @if($errors->has('penghasilan'))
                        <p class="text-danger">
                          {{ $errors->first('penghasilan') }}
                        </p>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('redaksi') ? 'has-error has-feedback' : '' }}">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label
                        for=""
                        class="control-label"
                      >
                        Keterangan Redaksi <small class="text-danger">*</small>
                        <button
                          id="ubah-keterangan-redaksi"
                          class="btn btn-sm btn-social btn-warning"
                        >
                          <i class="fa fa-pencil"></i> Ubah
                        </button>
                      </label>
                      <textarea
                        name="redaksi"
                        class="form-control"
                        id="redaksi"
                        rows="5"
                        readonly
                      >Surat Keterangan ini diperlukan untuk keperluan</textarea>
                      @if($errors->has('redaksi'))
                        <p class="text-danger">
                          {{ $errors->first('redaksi') }}
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
    src="/assets/js/bootstrap-typehead.min.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/js/moment-with-locales.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/js/bootstrap-datetimepicker.min.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/js/jquery-mask.js"
  ></script>
  <script
    type="text/javascript"
    src="/assets/frontend/js/select2.js"
  ></script>
  @yield('identitas_penduduk_js')
  <script>
    $('#tanggal-lahir-anak').datetimepicker({
      format: 'DD-MM-YYYY',
      viewMode: 'years'
    });

    $('#tanggal-meninggal').datetimepicker({
      format: 'DD-MM-YYYY',
      locale: 'id',
    }).on('dp.change', function(e){
      // console.log(e.date);
      console.log(e.date._d.getDay());
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

    // $('#penghasilan-mask').mask('000.000.000', {
    //   reverse: true,
    //   onChange: function(result){
    //     console.log(Math.trunc(result));
    //   }
    // });

    $('#ubah-keterangan-redaksi').click(function(e){
      e.preventDefault();
      $('#redaksi').prop('readonly', false);
      $('#redaksi').focus();
      $('#ubah-keterangan-redaksi').attr('disabled', true);
    });
  </script>
@endsection
