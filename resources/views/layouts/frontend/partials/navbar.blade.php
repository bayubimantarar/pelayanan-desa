<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img
        src="/uploads/img/{{ $pemerintahan->logo }}"
        height="40"
      />
      Desa {{ $pemerintahan->desa }}
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profil Desa
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
            <a class="dropdown-item" href="#">Sejarah Desa</a>
            <a class="dropdown-item" href="#">Peta Desa</a>
            <a class="dropdown-item" href="#">Visi Misi</a>
            <a class="dropdown-item" href="#">Perangkat Desa</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Pelayanan
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
            <a
              class="dropdown-item"
              href="/permintaan-surat"
            >
              Permintaan Surat
            </a>
            <a
              class="dropdown-item"
              href="/cek-permintaan-surat"
            >
              Cek Permintaan Surat
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
