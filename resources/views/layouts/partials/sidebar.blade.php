<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
      <li class="sidebar-search">
        <div class="input-group custom-search-form">
          <input type="text" class="form-control" placeholder="Cari...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
                <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </li>
      <li>
        <a href="/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
      </li>
      @if(Auth::guard('pengguna')->User()->jenis_pengguna === "Admin")
        <li
          class="{{ Request::segment(1) === 'profil' ? 'active' : ''}}"
        >
          <a href="#">
            <i class="fa fa-bar-chart-o fa-fw"></i> Data Desa<span class="fa arrow"></span>
          </a>
          <ul class="nav nav-second-level">
            <li>
              <a
                href="/profil/pemerintahan"
                class="{{ Request::segment(2) === 'pemerintahan' ? 'active' : ''}}"
              >
                <i class="fa fa-building-o"></i>
                Profil Desa
              </a>
            </li>
            <li>
              <a
                href="/profil/perangkat"
                class="{{ Request::segment(2) === 'perangkat' ? 'active' : ''}}"
              >
                <i class="fa fa-users"></i>
                Perangkat Desa
              </a>
            </li>
          </ul>
        </li>
      @endif
      @if(Auth::guard('pengguna')->User()->jenis_pengguna === "Admin")
        <li
          class="{{ Request::segment(1) === 'master' ? 'active' : ''}}"
        >
          <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Data Master<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a
                href="/master/agama"
                class="{{ Request::segment(2) === 'agama' ? 'active' : ''}}">
                <i class="fa fa-file-o"></i>
                Agama
              </a>
            </li>
            <li>
              <a
                href="/master/pendidikan"
                class="{{ Request::segment(2) === 'pendidikan' ? 'active' : ''}}"
              >
                <i class="fa fa-file-o"></i>
                Pendidikan
              </a>
            </li>
            <li>
              <a
                href="/master/jenis-kelamin"
                class="{{ Request::segment(2) === 'jenis-kelamin' ? 'active' : ''}}"
              >
                <i class="fa fa-file-o"></i>
                Jenis Kelamin
              </a>
            </li>
            <li>
              <a
                href="/master/status-perkawinan"
                class="{{ Request::segment(2) === 'status-perkawinan' ? 'active' : ''}}"
              >
                <i class="fa fa-file-o"></i>
                Status Perkawinan
              </a>
            </li>
          </ul>
        </li>
      @endif
      <li class="{{ Request::segment(1) === 'kependudukan' ? 'active' : ''}}">
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Data Kependudukan<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
          <li>
            <a
              href="/kependudukan/penduduk"
              class="{{ Request::segment(2) === 'penduduk' ? 'active' : ''}}"
            >
              <i class="fa fa-file-o"></i>
              Data Penduduk
            </a>
          </li>
        </ul>
      </li>
      <li class="{{ Request::segment(1) === 'kaur-ekbang' ? 'active' : ''}}">
        <a href="#">
          <i class="fa fa-bar-chart-o fa-fw"></i> KAUR Ekbang
          <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
          <li>
            <a
              href="/kaur-ekbang/keterangan-usaha"
              class="{{ Request::segment(2) === 'keterangan-usaha' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. Usaha
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-bar-chart-o fa-fw"></i> KAUR Umum
          <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
          <li>
            <a href="/kaur-umum/skck">
              <i class="fa fa-file-text-o"></i>
              Ket. SKCK
            </a>
          </li>
          <li>
            <a href="/kaur-umum/keterangan-ghoib">
              <i class="fa fa-file-text-o"></i>
              Ket. Ghoib
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-bar-chart-o fa-fw"></i> KAUR Tantrib & Umum
          <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
          <li>
            <a href="/kaur-tantrib-dan-umum/keterangan-bersih-diri">
              <i class="fa fa-file-text-o"></i>
              Ket. Bersih Diri
            </a>
          </li>
          <li>
            <a href="/kaur-tantrib-dan-umum/keterangan-kehilangan">
              <i class="fa fa-file-text-o"></i>
              Ket. Kehilangan
            </a>
          </li>
          <li>
            <a href="/kaur-tantrib-dan-umum/keterangan-izin-rame">
              <i class="fa fa-file-text-o"></i>
              Ket. Izin rame-rame
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-bar-chart-o fa-fw"></i> KAUR Pemerintahan
          <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
          <li>
            <a href="/kaur-pemerintahan/keterangan-domisili">
              <i class="fa fa-file-text-o"></i>
              Ket. Domisili
            </a>
          </li>
          {{-- <li>
            <a href="/kaur-pemerintahan/keterangan-surat-pindah">
              <i class="fa fa-file-text-o"></i>
              Ket. Surat Pindah
            </a>
          </li> --}}
          <li>
            <a href="/kaur-pemerintahan/keterangan-beda-identitas">
              <i class="fa fa-file-text-o"></i>
              Ket. Beda Identitas
            </a>
          </li>
          <li>
            <a href="/kaur-pemerintahan/keterangan-kk-sementara">
              <i class="fa fa-file-text-o"></i>
              Ket. KK Sementara
            </a>
          </li>
          <li>
            <a href="/kaur-pemerintahan/keterangan-ktp-sementara">
              <i class="fa fa-file-text-o"></i>
              Ket. KTP Sementara
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-bar-chart-o fa-fw"></i> KAUR Kesra
          <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
          <li>
            <a href="/kaur-kesra/sktm">
              <i class="fa fa-file-text-o"></i>
              Ket. SKTM
            </a>
          </li>
          <li>
            <a href="/kaur-kesra/keterangan-kelahiran">
              <i class="fa fa-file-text-o"></i>
              Ket. Kelahiran
            </a>
          </li>
          <li>
            <a href="/kaur-kesra/keterangan-kematian">
              <i class="fa fa-file-text-o"></i>
              Ket. Kematian
            </a>
          </li>
          <li>
            <a href="/kaur-kesra/keterangan-janda-duda">
              <i class="fa fa-file-text-o"></i>
              Ket. Janda/Duda
            </a>
          </li>
          <li>
            <a href="/kaur-kesra/keterangan-penghasilan">
              <i class="fa fa-file-text-o"></i>
              Ket. Penghasilan
            </a>
          </li>
          <li>
            <a href="/kaur-kesra/keterangan-tidak-bekerja">
              <i class="fa fa-file-text-o"></i>
              Ket. Tidak Bekerja
            </a>
          </li>
          <li>
            <a href="/kaur-kesra/keterangan-belum-menikah">
              <i class="fa fa-file-text-o"></i>
              Ket. Belum Menikah
            </a>
          </li>
          <li>
            <a href="/kaur-kesra/keterangan-tanggungan-keluarga">
              <i class="fa fa-file-text-o"></i>
              Ket. Tanggungan Keluarga
            </a>
          </li>
          <li>
            <a href="/kaur-kesra/keterangan-belum-memiliki-rumah">
              <i class="fa fa-file-text-o"></i>
              Ket. Belum Memiliki Rumah
            </a>
          </li>
          {{-- <li>
            <a href="/kaur-kesra/keterangan-ahli-waris">
              <i class="fa fa-file-text-o"></i>
              Ket. Ahli Waris
            </a>
          </li> --}}
        </ul>
      </li>
    </ul>
  </div>
</div>
