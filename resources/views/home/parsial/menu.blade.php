<nav id="navbar" class="navbar">
  <ul>
    <li>
      <a class="nav-link scrollto active" href="/">Home
      </a>
    </li>
    @if($token == "kosong")
    <li>
      <a class="nav-link scrollto" href="">Login
      </a>
    </li>
    
    <li>
      <a class="nav-link scrollto" href="/registrasi">Daftar
      </a>
    </li>
    
    @else
    <li>
      <a class="nav-link scrollto" href="">Keluar
      </a>
    </li>

    <li>
      <a class="nav-link scrollto" href="">Pengajuan
      </a>
    </li>

    @endif
  </ul>
  <i class="bi bi-list mobile-nav-togle"></i>
</nav><!-- .navbar -->