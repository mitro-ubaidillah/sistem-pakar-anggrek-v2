{{-- navbar content --}}
<nav class="navbar navbar-expand-lg mb-5">
  <div class="container-fluid ps-5 pe-5">
    <a class="navbar-brand font-color-primary me-4" href="/">Sistem Pakar Anggrek</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link font-color-primary ms-3 {{ ($title === "Home") ? 'active bg-one' : '' }}" href="/">Halaman Utama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link font-color-primary ms-3 {{ ($title === "About") ? 'active bg-one' : '' }}" href="/about">Diagnosa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link font-color-primary ms-3" href="#">Kontak Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link font-color-primary ms-3" href="#">Buku Panduan</a>
        </li>
      </ul>
      <span class="navbar-text">
        <a class="btn btn-second" href="/login">Login</a>
      </span>
    </div>
  </div>
</nav>