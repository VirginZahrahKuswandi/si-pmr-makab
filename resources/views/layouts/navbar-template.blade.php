        <nav class="navbar navbar-expand-lg bg-light shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="/" style="font-size: 20px">
                    <strong>SI PMR MAKAB</strong>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav d-flex align-items-center">
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
                        <li class="nav-item">
                            <a class="nav-link"
                                href="https://drive.google.com/drive/folders/1xrWtgJL1wXo53s-NPECpqLV9HeDqO4yS?usp=drive_link"
                                target="_blank">Modul / Soal</a>
                        </li>

                        @auth
                            <li class="nav-item dropdown d-none d-lg-block">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                    id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div>
                                        <i class="fa-solid fa-user" style="color: #ff3d3d;"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="/profil">Profil</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/riwayat-mengajar">Riwayat Mengajar</a>
                                    </li>
                                    @if (auth()->user()->is_admin)
                                        <li>
                                            <a class="dropdown-item" href="/admin">Admin</a>
                                        </li>
                                    @endif
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!-- Mobile: show menu items directly -->
                            <li class="nav-item d-lg-none">
                                <a class="nav-link" href="/profil">Profil</a>
                            </li>
                            <li class="nav-item d-lg-none">
                                <a class="nav-link" href="/riwayat-mengajar">Riwayat Mengajar</a>
                            </li>
                            @if (auth()->user()->is_admin)
                                <li class="nav-item d-lg-none">
                                    <a class="nav-link" href="/admin">Admin</a>
                                </li>
                            @endif
                            <li class="nav-item d-lg-none">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link p-0"
                                        style="color: inherit; text-align: left;">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
