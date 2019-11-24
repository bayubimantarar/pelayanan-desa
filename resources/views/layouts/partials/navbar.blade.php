<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a
      class="navbar-brand"
      href="/dasbor"
    >
      <img
        src="/uploads/img/{{ $pemerintahan->logo }}"
        alt=""
        height="30"
        style="display: inline;"
      />
      Desa Cilame
    </a>
  </div>
  <!-- /.navbar-header -->

  <ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-envelope fa-fw"></i>
            @if($totalPermintaanSurat != 0)
              <span class="badge">{{ $totalPermintaanSurat }}</span>
            @endif
              Permintaan Surat <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-messages">
          @foreach($permintaanSurat as $item)
            <li>
              <a href="/dasbor/pelayanan/permintaan-surat">
                <div>
                  <strong>{{ $item->nama }}</strong>
                  <span class="pull-right text-muted">
                    {{ $item->tanggal_permintaan }}
                  </span>
                </div>
                <div>
                  Permintaan Surat : {{ $item->surat }}
                </div>
              </a>
            </li>
            <li class="divider"></li>
            @endforeach
            <li>
                <a class="text-center" href="/dasbor/pelayanan/permintaan-surat">
                    <strong>Lihat Semua Permintaan Surat</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
        <!-- /.dropdown-messages -->
    </li>
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
              <li>
                <a href="#">
                  <i class="fa fa-user fa-fw"></i>
                  {{ Auth::guard('pengguna')->User()->nama }}
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-gear fa-fw"></i>
                  Pengaturan
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a
                  href="#"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >
                  <i class="fa fa-sign-out fa-fw"></i>
                  Keluar
                </a>
                <form
                  id="logout-form"
                  action="/dasbor/autentikasi/logout"
                  method="POST"
                  style="display: none;"
                >
                  <input
                    type="hidden"
                    name="_token"
                    value="{{ csrf_token() }}"
                  />
                </form>
              </li>
          </ul>
          <!-- /.dropdown-user -->
      </li>
      <!-- /.dropdown -->
  </ul>
  <!-- /.navbar-top-links -->


        @include('layouts.partials.sidebar')
  <!-- /.navbar-static-side -->
</nav>
