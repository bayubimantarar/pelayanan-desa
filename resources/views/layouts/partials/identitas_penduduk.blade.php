<input
  type="hidden"
  name="penduduk_id"
  id="master-penduduk-id"
  value="{{ old('penduduk_id') }}"
/>
<div class="row">
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
        @if((old('nik_identitas')))
          <option
            value="{{ old('nik_identitas') }}"
            selected="selected"
          >
            {{ old('nik_identitas') }}
          </option>
        @endif
      </select>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="nama"
      >
        Nama Lengkap
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="nama"
        value="{{ old('nama') }}"
        readonly
      />
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="tempat-lahir"
      >
        Tempat Lahir
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="tempat-lahir"
        readonly
      />
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="tanggal-lahir"
      >
        Tanggal Lahir
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="tanggal-lahir"
        readonly
      />
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="jenis-kelamin"
      >
        Jenis Kelamin
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="jenis-kelamin"
        readonly
      />
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="nama"
      >
        Status Perkawinan
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="status-perkawinan"
        readonly
      />
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="tempat-lahir"
      >
        Agama
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="agama"
        readonly
      />
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="tanggal-lahir"
      >
        Pendidikan
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="pendidikan"
        readonly
      />
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="jenis-kelamin"
      >
        Pekerjaan
      </label>
      <input
        type="text"
        name=""
        class="form-control"
        id="pekerjaan"
        readonly
      />
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 {{ $errors->has('penduduk_id') ? 'has-error has-feedback' : '' }}">
      <label
        class="control-label"
        for="alamat"
      >
        Alamat
      </label>
      <textarea
        name=""
        class="form-control"
        id="alamat"
        rows="5"
        readonly
      ></textarea>
    </div>
  </div>
</div>
@if($errors->has('penduduk_id'))
  <p class="text-danger">
    {{ $errors->first('penduduk_id') }}
  </p>
@endif

@section('identitas_penduduk_js')
  <script>
    var penduduk_id = $('#master-penduduk-id').val();

    if (penduduk_id != '') {
      $.ajax({
        url: '/dasbor/kependudukan/penduduk/api/data-by-id/'+penduduk_id,
        type: 'get',
        dataType: 'json',
        success: function(data){
          $('#nama').val(data.nama);
          $('#tempat-lahir').val(data.tempat_lahir);
          $('#tanggal-lahir').val(data.tanggal_lahir);
          $('#jenis-kelamin').val(data.jenis_kelamin);
          $('#status-perkawinan').val(data.status_perkawinan);
          $('#agama').val(data.agama);
          $('#pendidikan').val(data.pendidikan);
          $('#pekerjaan').val(data.pekerjaan);
          $('#alamat').val(data.alamat);
        }
      })
    }

    $('#nik').select2({
      debug: true,
      placeholder: 'Cari Data Dengan No. KTP',
      allowClear: true,
      ajax: {
        url: '/api/kependudukan/penduduk/data-penduduk',
        dataType: 'json',
        allowClear: true,
        cache: true,
        placeholder: 'Cari data dengan No. KTP',
        data: function (params) {
          return {
            q: params.term
          };
        },
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.nik,
                id: item.nik
              }
            })
          };
        },
      }
    });

    $('#nik').on('change', function(e){
      var nik = $('#nik').val();

      if(nik == '' || nik == null){
        $('#master-penduduk-id').val('');
        $('#nama').val('');
        $('#tempat-lahir').val('');
        $('#tanggal-lahir').val('');
        $('#jenis-kelamin').val('');
        $('#status-perkawinan').val('');
        $('#agama').val('');
        $('#pendidikan').val('');
        $('#pekerjaan').val('');
        $('#alamat').val('');

        $('#data-validation').hide();
        $('#nama').removeClass('is-valid');
      }else{
        $.ajax({
          url: '/api/kependudukan/penduduk/data/'+nik,
          type: 'get',
          dataType: 'json',
          success: function(data){
            $('#master-penduduk-id').val(data.id);
            $('#nama').val(data.nama);
            $('#tempat-lahir').val(data.tempat_lahir);
            $('#tanggal-lahir').val(data.tanggal_lahir);
            $('#jenis-kelamin').val(data.jenis_kelamin);
            $('#status-perkawinan').val(data.status_perkawinan);
            $('#agama').val(data.agama);
            $('#pendidikan').val(data.pendidikan);
            $('#pekerjaan').val(data.pekerjaan);
            $('#alamat').val(data.alamat);
          }
        });
      }
    });
  </script>
@endsection
