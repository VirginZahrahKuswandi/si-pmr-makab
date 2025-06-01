        <nav class="navbar navbar-expand-lg bg-light shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <strong>SI PMR MAKAB</strong>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        {{-- <li class="nav-item active">
                            <a class="nav-link" href="/">Home</a>
                        </li> --}}

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
                            <a class="nav-link" href="/jadwal-sekolah">Artikel</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="" target="_blank">Modul / Soal</a>
                        </li>

                        @auth
                            @if (auth()->user()->is_admin)
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin">Admin</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link" style="">Logout</button>
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
