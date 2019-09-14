<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
      <li class="sidebar-search">
        <div class="input-group custom-search-form">
          <input type="text" class="form-control" placeholder="Search...">
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
      <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Data Desa<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
          <li>
            <a href="/master/profil">
              <i class="fa fa-building-o"></i>
              Profil Desa
            </a>
          </li>
          <li>
            <a href="/master/pegawai">
              <i class="fa fa-users"></i>
              Pegawai Desa
            </a>
          </li>
        </ul>
      </li>
      @if(Auth::guard('pengguna')->User()->jenis_pengguna === "Admin")
        <li>
          <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Data Master<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/master/agama">
                <i class="fa fa-file-o"></i>
                Agama
              </a>
            </li>
            <li>
              <a href="/master/pendidikan">
                <i class="fa fa-file-o"></i>
                Pendidikan
              </a>
            </li>
            <li>
              <a href="/master/jenis-kelamin">
                <i class="fa fa-file-o"></i>
                Jenis Kelamin
              </a>
            </li>
            <li>
              <a href="/master/status-perkawinan">
                <i class="fa fa-file-o"></i>
                Status Perkawinan
              </a>
            </li>
          </ul>
        </li>
      @endif
      <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Data Kependudukan<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
              <a href="/master/penduduk">
                <i class="fa fa-file-o"></i>
                Data Penduduk
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
              SKCK
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
    </ul>
  </div>
</div>
