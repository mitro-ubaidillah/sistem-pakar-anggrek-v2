<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand font-color-default-w fw-semibold" href="/admin/dashboard">Admin Page</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link font-color-default-w fw-semibold" href="{{ route('penyakit.index') }}">Daftar Penyakit</a>
          <a class="nav-link font-color-default-w fw-semibold" href="{{ route('gejala.index') }}">Daftar Gejala</a>
          <a class="nav-link font-color-default-w fw-semibold" href="{{ route('cfUser.index') }}">Daftar CF User</a>
        </div>
      </div>
    </div>
</nav>