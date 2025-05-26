<nav class="navbar navbar-expand-lg navbar-light navbar-top bg-dark">
  <div class="container-fluid">
    <div class="pln-logo ms-3">
      <img src="{{ asset('umum/images/ICON-PLN.png') }}" alt="PLN Logo">
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto me-3">
        <li class="navbar-item">
          <a class="nav-link active" href="{{ route('home') }}">Ruang Kita</a>
        </li>
        <li class="navbar-item">
          <a class="nav-link" href="{{ route('security.login') }}">Secure</a>
        </li>
        <li class="navbar-item">
          <a class="nav-link" href="https://mail.google.com/mail/?view=cm&to=narendrakurnia18@gmail.com" target="_blank">Kontak</a>
        </li>
      </ul>
    </div>
  </div>
</nav>