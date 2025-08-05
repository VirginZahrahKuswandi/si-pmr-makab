<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jadwal Sekolah</title>


    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;700;900&display=swap"
        rel="stylesheet">
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template/css/magnific-popup.css') }}">
    <link href="{{ asset('template/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/templatemo-nomad-force.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/22453fa8c0.js" crossorigin="anonymous"></script>

</head>

<body>

    @include('layouts.navbar-template')

    <div class="container py-5">
        <h2 class="mb-4">Jadwal Sekolah</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="tanggal" class="form-label">Filter Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control"
                    value="{{ request('tanggal') }}">
            </div>
            <div class="col-md-2 align-self-end">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
            <div class="col-md-2 align-self-end">
                <a href="{{ route('jadwal.index') }}" class="btn btn-secondary w-100">Reset</a>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Nama Sekolah</th>
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Status</th>
                        <th>Fasilitator</th>
                        @auth
                            @if (!is_null(Auth::user()->fasilitator_id))
                                <th>Aksi</th>
                            @endif
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal_sekolah as $item)
                        <tr>
                            <td>{{ $item->sekolah->nama }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}</td>
                            <td>
                                @if (strtolower($item->deskripsi) === 'libur')
                                    <strong class="text-danger">{{ $item->deskripsi }}</strong>
                                @else
                                    <strong>{{ $item->deskripsi }}</strong>
                                @endif
                            </td>
                            <td>
                                @if ($item->fasilitator->isNotEmpty())
                                    <ul class="mb-0">
                                        @foreach ($item->fasilitator as $f)
                                            <li>{{ $f->nama }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-muted">Belum diisi</span>
                                @endif
                            </td>
                            @auth
                                @if (!is_null(Auth::user()->fasilitator_id))
                                    <td>
                                        @php
                                            $sudahAmbil = false;
                                            if (auth()->check()) {
                                                $sudahAmbil = $item->fasilitator->contains(
                                                    'id',
                                                    auth()->user()->fasilitator_id,
                                                );
                                            }
                                        @endphp

                                        <div class="d-flex flex-column gap-1">
                                            <!-- Tombol Detail -->
                                            <button type="button" class="btn btn-secondary btn-sm w-100 mb-1"
                                                data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->id }}">
                                                Detail
                                            </button>

                                            @if (auth()->check())
                                                @php
                                                    $fasilitatorId = auth()->user()->fasilitator_id;
                                                    $sudahAmbil = $fasilitatorId
                                                        ? $item->fasilitator->contains('id', $fasilitatorId)
                                                        : false;
                                                @endphp

                                                @if (!$fasilitatorId)
                                                @elseif (!$sudahAmbil)
                                                    <form method="POST" action="{{ route('jadwal.ambil', $item->id) }}"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin mengambil jadwal ini?');">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-primary btn-sm w-100 mb-1">Saya
                                                            Bersedia</button>
                                                    </form>
                                                @else
                                                    <span class="badge bg-success w-100 mb-1 text-center"
                                                        style="font-size: 0.9em;">Anda sudah mengambil</span>
                                                    <form method="POST" action="{{ route('jadwal.batal', $item->id) }}"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin membatalkan jadwal ini?');">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm w-100">
                                                            Batalkan Jadwal
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                @endif
                            @endauth

                            </td>
                        </tr>

                        <!-- Modal Detail -->
                        <div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1"
                            aria-labelledby="modalDetailLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalDetailLabel{{ $item->id }}">Detail Jadwal
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nama Sekolah:</strong> {{ $item->sekolah->nama }}</p>
                                        <p><strong>Tanggal:</strong> {{ $item->tanggal }}</p>
                                        <p><strong>Jam Mulai:</strong> {{ $item->jam_mulai }}</p>
                                        <p><strong>Jam Selesai:</strong> {{ $item->jam_selesai }}</p>
                                        <p><strong>Deskripsi</strong> {{ $item->deskripsi }}</p>

                                        <p><strong>Penanggung Jawab:</strong> {{ $item->penanggungjawab }}</p>
                                        <p><strong>Kontak PJ:</strong> {{ $item->kontak_pj }}</p>
                                        <p><strong>Pembina:</strong> {{ $item->pembina }}</p>
                                        <p><strong>Kontak Pembina:</strong> {{ $item->kontak_pembina }}</p>
                                        <p><strong>Fasilitator:</strong></p>
                                        <ul>
                                            @forelse ($item->fasilitator as $f)
                                                <li>{{ $f->nama }}</li>
                                            @empty
                                                <li class="text-muted">Belum ada</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $jadwal_sekolah->links() }}
        </div>
    </div>

    @include('layouts.footer-template')

    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('template/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('template/js/aos.js') }}"></script>
    <script src="{{ asset('template/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('template/js/magnific-popup-options.js') }}"></script>
    <script src="{{ asset('template/js/scrollspy.min.js') }}"></script>
    <script src="{{ asset('template/js/custom.js') }}"></script>
</body>

</html>
