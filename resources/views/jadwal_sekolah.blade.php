<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jadwal Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>

    @include('layouts.navbar')

    <div class="container py-5">
        <h2 class="mb-4">Jadwal Sekolah</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama Sekolah</th>
                    <th>Tanggal</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Status</th>
                    <th>Fasilitator</th>
                    <th>Aksi</th>
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
                        <td>
                            @php
                                $sudahAmbil = false;
                                if (auth()->check()) {
                                    $sudahAmbil = $item->fasilitator->contains('id', auth()->user()->fasilitator_id);
                                }
                            @endphp

                            <div class="d-flex gap-1">
                                <!-- Tombol Detail -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalDetail{{ $item->id }}">
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
                                            <button type="submit" class="btn btn-primary btn-sm">Saya Bersedia</button>
                                        </form>
                                    @else
                                        <span class="badge bg-success">Anda sudah mengambil</span>
                                    @endif
                                @endif
                            </div>
                        </td>

                        </td>
                    </tr>

                    <!-- Modal Detail -->
                    <div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1"
                        aria-labelledby="modalDetailLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDetailLabel{{ $item->id }}">Detail Jadwal</h5>
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

            </tbody>

        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
