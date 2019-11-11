<div class="form-group">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-xs-12">
      <label for="">
        Surat Pengantar Dari
      </label>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('rt') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        RT <small class="text-danger">*</small>
      </label>
      <input
        type="number"
        name="rt"
        class="form-control"
        value="{{ $permintaanSuratDetail->rt_skck }}"
      >
      @if($errors->has('rt'))
        <p class="text-danger">
          {{ $errors->first('rt') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('rt') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Tertanggal dari RT <small class="text-danger">*</small>
      </label>
      <div
        class="input-group date"
        id="tertanggal-rt"
      >
        <input
          type="text"
          name="tertanggal_rt"
          class="form-control"
          value="{{ $permintaanSuratDetail->tertanggal_rt_skck }}"
        />
        <span class="input-group-addon">
          <span class="fa fa-calendar"></span>
        </span>
      </div>
      @if($errors->has('tertanggal_rt'))
        <p class="text-danger">
          {{ $errors->first('tertanggal_rt') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('rw') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        RW <small class="text-danger">*</small>
      </label>
      <input
        type="number"
        name="rw"
        class="form-control"
        value="{{ $permintaanSuratDetail->rw_skck }}"
      >
      @if($errors->has('rw'))
        <p class="text-danger">
          {{ $errors->first('rw') }}
        </p>
      @endif
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
    <div class="form-group {{ $errors->has('tertanggal_rw') ? 'has-error has-feedback' : '' }}">
      <label
        for=""
        class="control-label"
      >
        Tertanggal dari RW <small class="text-danger">*</small>
      </label>
      <div
        class="input-group date"
        id="tertanggal-rw"
      >
        <input
          type="text"
          name="tertanggal_rw"
          class="form-control"
          value="{{ $permintaanSuratDetail->tertanggal_rw_skck }}"
        />
        <span class="input-group-addon">
          <span class="fa fa-calendar"></span>
        </span>
      </div>
      @if($errors->has('tertanggal_rw'))
        <p class="text-danger">
          {{ $errors->first('tertanggal_rw') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="form-group {{ $errors->has('rt') ? 'has-error has-feedback' : '' }}">
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
      >Orang tersebut sebagaimana dalam catatan kami berkelakuan baik, belum pernah tersangkut perkara pidana, tidak terlibat minuman keras ataupun perjudian.</textarea>
      @if($errors->has('redaksi'))
        <p class="text-danger">
          {{ $errors->first('redaksi') }}
        </p>
      @endif
    </div>
  </div>
</div>
<div class="form-group {{ $errors->has('keperluan') ? 'has-error has-feedback' : '' }}">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <label
        for=""
        class="control-label"
      >
        Keterangan Keperluan <small class="text-danger">*</small>
      </label>
      <textarea
        name="keperluan"
        class="form-control"
        id="keperluan"
        rows="5"
      >{{ $permintaanSuratDetail->keperluan_skck }}</textarea>
      @if($errors->has('keperluan'))
        <p class="text-danger">
          {{ $errors->first('keperluan') }}
        </p>
      @endif
    </div>
  </div>
</div>
