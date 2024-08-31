<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
      <a class="navbar-brand" href="/">Pustaka</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
              <a class="nav-item nav-link active" href="{{ url('/') }}">Beranda</a>

              @if (Auth::check())
                  <a class="nav-item nav-link" href="/detail-booking">Booking Buku</a>
                  <a class="nav-item nav-link" href="/user-profile">Profil Saya</a>
                  <a class="nav-item nav-link" href="/logout"><i class="fas fw fa-login"></i> Log out</a>
                   
                  @else
                  <a class="nav-item nav-link" data-toggle="modal" data-target="#daftarModal" href="#"><i class="fas fw fa-login"></i> Daftar</a>
                  <a class="nav-item nav-link" data-toggle="modal" data-target="#loginModal" href="#"><i class="fas fw fa-login"></i> Log in</a>
              @endif

              <span class="nav-item nav-link nav-right" style="display:block; margin-left:20px;">
                  Selamat Datang <b>{{ $user}}</b>
              </span>
          </div>
      </div>
  </div>
</nav>
