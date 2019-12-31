<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pengaturan website</title>

  <!-- Bootstrap core CSS -->
  <link
    href="/assets/frontend/vendor/bootstrap/css/bootstrap.css"
    rel="stylesheet"
  />

  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/vendor/font-awesome/css/font-awesome.min.css"
  />

  <!-- Custom styles for this template -->
  <link
    rel="stylesheet"
    href="/assets/frontend/css/modern-business.css"
  />

  <link
    rel="stylesheet"
    href="/assets/frontend/css/select2.css"
  />

  <link
    rel="stylesheet"
    href="/assets/frontend/css/select2-bootstrap4.css"
  />

  <link
    rel="stylesheet"
    href="/assets/frontend/css/tagsinput.css"
  />

  <link
    rel="stylesheet"
    type="text/css"
    href="/assets/vendor/font-awesome/css/font-awesome.min.css"
  />

  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap"
  />

  <style>
      .stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
  .disabled {
    cursor: not-allowed;
  }
  </style>
</head>

<body>
  <div class="container">
    <div class="stepwizard">
      <div class="stepwizard-row setup-panel">
          <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary">1</a>
            <p>
              Pengantar
            </p>
          </div>
          <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default disabled" disabled="disabled">2</a>
            <p>Profil Desa</p>
          </div>
          <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default disabled" disabled="disabled">3</a>
            <p>Pengguna</p>
          </div>
          <div class="stepwizard-step">
            <a href="#step-4" type="button" class="btn btn-default disabled" disabled="disabled">4</a>
            <p>Selesai</p>
          </div>
      </div>
    </div>
    <form action="/pengaturan-website/simpan" method="post" enctype="multipart/form-data">
      <input
        type="hidden"
        name="_token"
        value="{{ csrf_token() }}"
      />
      <div class="row setup-content" id="step-1">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-xs-12">
            <h3>
              Pengaturan website
            </h3>
            <hr />
            <p>
              Selamat datang di <b>Sistem Informasi Administrasi Desa</b>, ikut beberapa langkah-langkahnya untuk menyelesaikan pengaturan website seperti pengisian <b>Profil Desa</b> dan <b>Pengguna</b>.
            </p>
            <br />
            <button class="btn btn-primary nextBtn pull-right" type="button">
              Selanjutnya &raquo;
            </button>
          </div>
        </div>
      </div>
      <div class="row setup-content" id="step-2">
        <div class="col-lg-12 col-md-12 col-xs-12">
          <h3>
            Profil Desa
          </h3>
          <hr />
          <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-12">
              <div class="form-group">
                <label class="control-label">
                  Kabupaten <small class="text-danger">*</small>
                </label>
                <input
                  type="text"
                  name="kabupaten"
                  class="form-control"
                  required
                />
                <div class="invalid-feedback">
                  Kabupaten perlu diisi
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-12">
              <div class="form-group">
                <label class="control-label">
                  Kecamatan <small class="text-danger">*</small>
                </label>
                <input
                  type="text"
                  name="kecamatan"
                  class="form-control"
                  required
                />
                <div class="invalid-feedback">
                  Kecamatan perlu diisi
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-12">
              <div class="form-group">
                <label class="control-label">
                  Desa <small class="text-danger">*</small>
                </label>
                <input
                  type="text"
                  name="desa"
                  class="form-control"
                  required
                />
                <div class="invalid-feedback">
                  Desa perlu diisi
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-12">
              <div class="form-group">
                <label class="control-label">
                  Nama Kepala Desa <small class="text-danger">*</small>
                </label>
                <input
                  type="text"
                  name="nama_kepala_desa"
                  class="form-control"
                  required
                />
                <div class="invalid-feedback">
                  Nama kepala desa perlu diisi
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12">
              <label for="" class="control-label">
                Email <small class="text-danger">*</small>
              </label>
              <input
                type="text"
                name="email_desa"
                name="email"
                class="form-control"
                required
              >
              <div class="invalid-feedback">
                Email perlu diisi
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12">
              <label for="" class="control-label">
                Alamat <small class="text-danger">*</small>
              </label>
              <textarea
                name="alamat_desa"
                class="form-control"
                rows="5"
                required
              ></textarea>
              <div class="invalid-feedback">
                Alamat perlu diisi
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12">
              <label
                for=""
                class="control-label"
              >
                Logo
              </label>
              <input
                type="file"
                id="logo"
                name="logo"
              >
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
              <label for="">
                Visi
              </label>
              <textarea
                name="visi"
                class="form-control"
                rows="5"
                required
              ></textarea>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
              <label for="">
                Misi
              </label>
              <input type="text" name="misi" id="misi" class="form-control" />
            </div>
          </div>
          <br />
          <button class="btn btn-primary nextBtn pull-right" type="button">
            Selanjutnya &raquo;
          </button>
        </div>
      </div>
      <div class="row setup-content" id="step-3">
        <div class="col-lg-12 col-md-12 col-xs-12">
          <h3>
            Pengguna
          </h3>
          <hr />
          <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12">
              <div class="form-group">
                <label class="control-label">
                  Nama Lengkap <small class="text-danger">*</small>
                </label>
                <input
                  type="text"
                  name="nama"
                  class="form-control"
                  required
                />
                <div class="invalid-feedback">
                  Nama lengkap perlu diisi
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12">
              <div class="form-group">
                <label class="control-label">
                  Nomor Telepon <small class="text-danger">*</small>
                </label>
                <input
                  type="text"
                  name="nomor_telepon"
                  class="form-control"
                  required
                />
                <div class="invalid-feedback">
                  Nama lengkap perlu diisi
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12">
              <div class="form-group">
                <label class="control-label">
                  Alamat <small class="text-danger">*</small>
                </label>
                <textarea
                  name="alamat"
                  class="form-control"
                  rows="5"
                  required
                ></textarea>
                <div class="invalid-feedback">
                  Alamat perlu diisi
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
              <label for="" class="control-label">
                Email <small class="text-danger">*</small>
              </label>
              <input
                type="text"
                name="email"
                class="form-control"
                required
              >
              <div class="invalid-feedback">
                Email perlu diisi
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
              <label for="" class="control-label">
                Kata Sandi <small class="text-danger">*</small>
              </label>
              <input
                type="password"
                name="password"
                class="form-control"
                required
              >
              <div class="invalid-feedback">
                Kata sandi perlu diisi
              </div>
            </div>
          </div>
          <br />
          <button class="btn btn-primary nextBtn pull-right" type="button">
            Selanjutnya &raquo;
          </button>
        </div>
      </div>
      <div class="row setup-content" id="step-4">
        <div class="col-lg-12 col-md-12 col-xs-12">
          <h3>
            Selesai
          </h3>
          <hr />
          Pengisian <b>Profil Desa</b> dan <b>Pengguna</b> telah selesai, selanjutnya tekan tombol <code>Selesai</code> untuk mulai melihat website.
          <br />
          <button class="btn btn-success nextBtn pull-right" type="submit">
            Selesai &check;
          </button>
        </div>
      </div>
    </form>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="/assets/frontend/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/frontend/js/tagsinput.js"></script>
  <script>
    $(document).ready(function () {
      var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');
        allPreviousBtn = $('previousBtn');

        allWells.hide();

      navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
          $item = $(this);

        if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)');
        }
      });

    allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        curInputs = curStep.find("input[type='text'],input[type='url'],input[type='password'],textarea"),
        isValid = true;

        $(".form-control").removeClass("is-invalid");

        for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
            isValid = false;
            $(curInputs[i]).closest(".form-control").addClass("is-invalid");
          }
        }

        if(isValid){
          nextStepWizard.removeClass('disabled').trigger('click');
        }
    });

    $('div.setup-panel div a.btn-primary').trigger('click');

    $('#misi').tagsinput();
  });
  </script>
</body>

</html>
