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
        <a href="/dasbor"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
      </li>
      @if(Auth::guard('pengguna')->User()->jenis_pengguna === "Admin")
        <li
          class="{{ Request::segment(2) === 'profil' ? 'active' : ''}}"
        >
          <a href="#">
            <i class="fa fa-bar-chart-o fa-fw"></i> Data Profil<span class="fa arrow"></span>
          </a>
          <ul class="nav nav-second-level">
            <li>
              <a
                href="/dasbor/profil/pemerintahan"
                class="{{ Request::segment(3) === 'pemerintahan' ? 'active' : ''}}"
              >
                <i class="fa fa-building-o"></i>
                Profil Desa
              </a>
            </li>
            <li>
              <a
                href="/dasbor/profil/perangkat"
                class="{{ Request::segment(3) === 'perangkat' ? 'active' : ''}}"
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
          class="{{ Request::segment(2) === 'master' ? 'active' : ''}}"
        >
          <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Data Master<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a
                href="/dasbor/master/surat"
                class="{{ Request::segment(3) === 'surat' ? 'active' : ''}}">
                <i class="fa fa-file-o"></i>
                Surat
              </a>
            </li>
            <li>
              <a
                href="/dasbor/master/agama"
                class="{{ Request::segment(3) === 'agama' ? 'active' : ''}}">
                <i class="fa fa-file-o"></i>
                Agama
              </a>
            </li>
            <li>
              <a
                href="/dasbor/master/pengguna"
                class="{{ Request::segment(3) === 'pengguna' ? 'active' : ''}}">
                <i class="fa fa-file-o"></i>
                Pengguna
              </a>
            </li>
            <li>
              <a
                href="/dasbor/master/pendidikan"
                class="{{ Request::segment(3) === 'pendidikan' ? 'active' : ''}}"
              >
                <i class="fa fa-file-o"></i>
                Pendidikan
              </a>
            </li>
            <li>
              <a
                href="/dasbor/master/jenis-kelamin"
                class="{{ Request::segment(3) === 'jenis-kelamin' ? 'active' : ''}}"
              >
                <i class="fa fa-file-o"></i>
                Jenis Kelamin
              </a>
            </li>
            <li>
              <a
                href="/dasbor/master/status-perkawinan"
                class="{{ Request::segment(3) === 'status-perkawinan' ? 'active' : ''}}"
              >
                <i class="fa fa-file-o"></i>
                Status Perkawinan
              </a>
            </li>
          </ul>
        </li>
      @endif
      <li class="{{ Request::segment(2) === 'kependudukan' ? 'active' : ''}}">
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Data Kependudukan<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
          <li>
            <a
              href="/dasbor/kependudukan/penduduk"
              class="{{ Request::segment(3) === 'penduduk' ? 'active' : ''}}"
            >
              <i class="fa fa-file-o"></i>
              Data Penduduk
            </a>
          </li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) === 'pelayanan' ? 'active' : ''}}">
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Data Pelayanan<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
          <li>
            <a
              href="/dasbor/pelayanan/permintaan-surat"
              class="{{ Request::segment(3) === 'permintaan-surat' ? 'active' : ''}}"
            >
              <i class="fa fa-file-o"></i>
              Permintaan Surat
            </a>
          </li>
          <li>
            <a
              href="/dasbor/pelayanan/pengambilan-surat"
              class="{{ Request::segment(3) === 'pengambilan-surat' ? 'active' : ''}}"
            >
              <i class="fa fa-file-o"></i>
              Pengambilan Surat
            </a>
          </li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) === 'kaur-ekbang' ? 'active' : ''}}">
        <a href="#">
          <i class="fa fa-bar-chart-o fa-fw"></i> KAUR Ekbang
          <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
          <li>
            <a
              href="/dasbor/kaur-ekbang/keterangan-usaha"
              class="{{ Request::segment(3) === 'keterangan-usaha' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. Usaha
            </a>
          </li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) === 'kaur-umum' ? 'active' : ''}}">
        <a href="#">
          <i class="fa fa-bar-chart-o fa-fw"></i> KAUR Umum
          <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
          <li>
            <a
              href="/dasbor/kaur-umum/skck"
              class="{{ Request::segment(3) === 'skck' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. SKCK
            </a>
          </li>
          <li>
            <a
              href="/dasbor/kaur-umum/keterangan-ghoib"
              class="{{ Request::segment(3) === 'keterangan-ghoib' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. Ghoib
            </a>
          </li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) === 'kaur-tantrib-dan-umum' ? 'active' : ''}}">
        <a href="#">
          <i class="fa fa-bar-chart-o fa-fw"></i> KAUR Tantrib & Umum
          <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
          <li>
            <a
              href="/dasbor/kaur-tantrib-dan-umum/keterangan-bersih-diri"
              class="{{ Request::segment(3) === 'keterangan-bersih-diri' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. Bersih Diri
            </a>
          </li>
          <li>
            <a
              href="/dasbor/kaur-tantrib-dan-umum/keterangan-kehilangan"
              class="{{ Request::segment(3) === 'keterangan-kehilangan' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. Kehilangan
            </a>
          </li>
          <li>
            <a
              href="/dasbor/kaur-tantrib-dan-umum/keterangan-izin-rame"
              class="{{ Request::segment(3) === 'keterangan-izin-rame' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. Izin rame-rame
            </a>
          </li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) === 'kaur-pemerintahan' ? 'active' : ''}}">
        <a href="#">
          <i class="fa fa-bar-chart-o fa-fw"></i> KAUR Pemerintahan
          <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
          <li>
            <a
              href="/dasbor/kaur-pemerintahan/keterangan-domisili"
              class="{{ Request::segment(3) === 'keterangan-domisili' ? 'active' : ''}}"
            >
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
            <a
              href="/dasbor/kaur-pemerintahan/keterangan-beda-identitas"
              class="{{ Request::segment(3) === 'keterangan-beda-identitas' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. Beda Identitas
            </a>
          </li>
          <li>
            <a
              href="/dasbor/kaur-pemerintahan/keterangan-kk-sementara"
              class="{{ Request::segment(3) === 'keterangan-kk-sementara' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. KK Sementara
            </a>
          </li>
          <li>
            <a
              href="/dasbor/kaur-pemerintahan/keterangan-ktp-sementara"
              class="{{ Request::segment(3) === 'keterangan-ktp-sementara' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. KTP Sementara
            </a>
          </li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) === 'kaur-kesra' ? 'active' : ''}}">
        <a href="#">
          <i class="fa fa-bar-chart-o fa-fw"></i> KAUR Kesra
          <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
          <li>
            <a
              href="/dasbor/kaur-kesra/sktm"
              class="{{ Request::segment(3) === 'sktm' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. SKTM
            </a>
          </li>
          <li>
            <a
              href="/dasbor/kaur-kesra/keterangan-kelahiran"
              class="{{ Request::segment(3) === 'keterangan-kelahiran' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. Kelahiran
            </a>
          </li>
          <li>
            <a
              href="/dasbor/kaur-kesra/keterangan-kematian"
              class="{{ Request::segment(3) === 'keterangan-kematian' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. Kematian
            </a>
          </li>
          <li>
            <a
              href="/dasbor/kaur-kesra/keterangan-janda-duda"
              class="{{ Request::segment(3) === 'keterangan-janda-duda' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. Janda/Duda
            </a>
          </li>
          <li>
            <a
              href="/dasbor/kaur-kesra/keterangan-penghasilan"
              class="{{ Request::segment(3) === 'keterangan-penghasilan' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. Penghasilan
            </a>
          </li>
          <li>
            <a
              href="/dasbor/kaur-kesra/keterangan-tidak-bekerja"
              class="{{ Request::segment(3) === 'keterangan-tidak-bekerja' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. Tidak Bekerja
            </a>
          </li>
          <li>
            <a
              href="/dasbor/kaur-kesra/keterangan-belum-menikah"
              class="{{ Request::segment(3) === 'keterangan-belum-menikah' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. Belum Menikah
            </a>
          </li>
          <li>
            <a
              href="/dasbor/kaur-kesra/keterangan-tanggungan-keluarga"
              class="{{ Request::segment(3) === 'keterangan-tanggungan-keluarga' ? 'active' : ''}}"
            >
              <i class="fa fa-file-text-o"></i>
              Ket. Tanggungan Keluarga
            </a>
          </li>
          <li>
            <a
              href="/dasbor/kaur-kesra/keterangan-belum-memiliki-rumah"
              class="{{ Request::segment(3) === 'keterangan-belum-memiliki-rumah' ? 'active' : ''}}"
            >
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
