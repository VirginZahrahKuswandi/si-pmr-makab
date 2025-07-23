<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/">Sistem Informasi MAKAB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                @auth
                    @if (!is_null(Auth::user()->fasilitator_id))
                        <li class="nav-item">
                            <a class="nav-link" href="/daftar-sekolah">Data Sekolah</a>
                        </li>
                    @endif
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="/profil-fasilitator">Profil Fasilitator</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/jadwal-sekolah">Jadwal Sekolah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/artikel">Artikel</a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/profil">Profil</a></li>
                            <li><a class="dropdown-item" href="/riwayat-mengajar">Riwayat Mengajar</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-success my-2 mt-3 my-sm-0" href="/login">Login</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
