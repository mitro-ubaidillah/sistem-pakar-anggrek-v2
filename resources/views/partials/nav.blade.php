{{-- navbar content --}}
<nav class="navbar navbar-expand-lg mb-5">
  <div class="container">
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
          <a class="nav-link font-color-primary ms-3 {{ ($title === "About") ? 'active bg-one' : '' }}" href="/diagnosa">Diagnosa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link font-color-primary ms-3" href="#kontak">Kontak Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link font-color-primary ms-3" href="#bukupanduan">Buku Panduan</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Selamat datang, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/admin/dashboard">Dashboard</a></li>
              <li><a class="dropdown-item" href="/admin/disease">Daftar Penyakit</a></li>
              <li><a class="dropdown-item" href="/admin/symptom">Daftar Gejala</a></li>
              <li><a class="dropdown-item" href="/admin/cfUser">Daftar CF User</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{ ro }}ute('logout')}}">Logout</a></li>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a class="btn btn-second" href="/login">Login</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>