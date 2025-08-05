<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI MAKAB</title>

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
</head>

<body>
    @include('layouts.navbar-template')

    <div class="container py-5">
        <h2 class="mb-4">Riwayat Mengajar</h2>

        @php
            $fasilitatorId = Auth::user()->fasilitator_id;
        @endphp

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Nama Sekolah</th>
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Fasilitator</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        <th>Foto Dokumentasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $item)
                        <tr>
                            <td>{{ $item->sekolah->nama ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}</td>
                            <td>
                                <ul class="mb-0">
                                    @foreach ($item->fasilitator as $f)
                                        <li>{{ $f->nama }}</li>
                                    @endforeach
                                </ul>
                            </td>

                            <td>
                                @php
                                    $absensiFasilitator = null;
                                    $fotoList = [];
                                    foreach ($item->absensi as $absensi) {
                                        $pivot = $absensi->fasilitator->firstWhere('id', $fasilitatorId)?->pivot;
                                        if ($pivot) {
                                            $absensiFasilitator = $pivot;
                                            foreach ($absensi->foto as $foto) {
                                                $fotoList[] = asset('storage/' . $foto->path);
                                            }
                                            break;
                                        }
                                    }
                                @endphp

                                @if ($absensiFasilitator)
                                    <span
                                        class="badge bg-{{ $absensiFasilitator->status_verifikasi === 'disetujui'
                                            ? 'success'
                                            : ($absensiFasilitator->status_verifikasi === 'ditolak'
                                                ? 'danger'
                                                : 'warning') }}">
                                        {{ ucfirst($absensiFasilitator->status_verifikasi) }}
                                    </span>
                                    <br>
                                    <small class="text-muted">
                                        @if ($absensiFasilitator->waktu_absen && $absensiFasilitator->updated_at)
                                            Diajukan:
                                            {{ \Carbon\Carbon::parse($absensiFasilitator->waktu_absen)->diffForHumans() }}<br>
                                            @if ($absensiFasilitator->updated_at != $absensiFasilitator->waktu_absen)
                                                Diupdate:
                                                {{ \Carbon\Carbon::parse($absensiFasilitator->updated_at)->diffForHumans() }}
                                            @endif
                                        @endif

                                        @if ($absensiFasilitator && $absensiFasilitator->keterangan)
                                            <br>
                                            Keterangan: {{ $absensiFasilitator->keterangan }}
                                        @endif
                                    </small>
                                @else
                                    <span class="badge bg-secondary">Belum absen</span>
                                @endif
                            </td>

                            <td>
                                @if ($absensiFasilitator)
                                    @if ($absensiFasilitator->status_verifikasi === 'ditolak')
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#absensiModal{{ $item->id }}">
                                            Edit
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-secondary" disabled>Sudah Absen</button>
                                    @endif
                                @else
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#absensiModal{{ $item->id }}">
                                        Absen
                                    </button>
                                @endif

                            </td>
                            <td>
                                @if (count($fotoList))
                                    @foreach ($item->absensi as $absensi)
                                        @php
                                            $pivot = $absensi->fasilitator->firstWhere('id', $fasilitatorId)?->pivot;
                                        @endphp
                                        @if ($pivot)
                                            @foreach ($absensi->foto as $foto)
                                                @php
                                                    switch ($foto->jenis_absensi_foto_id) {
                                                        case 1:
                                                            $label = 'Fasilitator Mengajar';
                                                            break;
                                                        case 2:
                                                            $label = 'Anggota Praktik';
                                                            break;
                                                        case 3:
                                                            $label = 'Foto Bersama';
                                                            break;
                                                        default:
                                                            $label = 'Dokumentasi-' . $foto->jenis_absensi_foto_id;
                                                    }
                                                @endphp
                                                <button type="button"
                                                    onclick="showFotoModal({{ $item->id }}, {{ $loop->index }})"
                                                    class="text-primary text-decoration-underline btn btn-link p-0"
                                                    style="text-align: left">
                                                    {{ $label }}
                                                </button>
                                                @if (!$loop->last)
                                                    <br>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @else
                                    <span class="text-muted fst-italic">Tidak ada foto</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @foreach ($jadwal as $item)
            @php
                // Ambil data absensi yang sudah ada (jika ada)
                $absensiData = $item->absensi->first(); // diasumsikan satu absensi per jadwal
            @endphp

            <div class="modal fade" id="absensiModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form
                        action="{{ $absensiData ? route('absensi.update', $absensiData->id) : route('absensi.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($absensiData)
                            @method('PUT')
                        @endif

                        @csrf
                        <input type="hidden" name="jadwal_sekolah_id" value="{{ $item->id }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Absensi - {{ $item->sekolah->nama }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="mb-1">Jumlah Siswa Hadir</label>
                                    <input type="number" name="jumlah_siswa_hadir" class="form-control"
                                        value="{{ old('jumlah_siswa_hadir', $absensiData->jumlah_siswa_hadir ?? '') }}"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-1">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi', $absensiData->deskripsi ?? '') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-1">Materi</label>
                                    <input type="text" name="materi" class="form-control"
                                        value="{{ old('materi', $absensiData->materi ?? '') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="mb-1">Tugas Berikutnya</label>
                                    <input type="text" name="tugas_berikutnya" class="form-control"
                                        value="{{ old('tugas_berikutnya', $absensiData->tugas_berikutnya ?? '') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="mb-1">Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control"
                                        value="{{ old('lokasi', $absensiData->lokasi ?? '') }}">
                                </div>

                                {{-- Dokumentasi fasilitator mengajar --}}
                                <div class="mb-3">
                                    <label for="fasilitator_mengajar" class="mb-1">Dokumentasi Fasilitator Sedang
                                        Mengajar</label>

                                    <input type="file" name="fasilitator_mengajar" class="form-control"
                                        id="fasilitator_mengajar" @if (!$absensiData) required @endif>

                                    @if ($absensiData)
                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                                    @endif
                                </div>

                                {{-- Dokumentasi anggota praktik --}}
                                <div class="mb-3">
                                    <label for="anggota_praktik" class="mb-1">Dokumentasi Anggota Sedang
                                        Teori/Praktik</label>

                                    <input type="file" name="anggota_praktik" class="form-control"
                                        id="anggota_praktik" @if (!$absensiData) required @endif>

                                    @if ($absensiData)
                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                                    @endif
                                </div>

                                {{-- Dokumentasi foto bersama --}}
                                <div class="mb-3">
                                    <label for="foto_bersama" class="mb-1">Dokumentasi Foto Bersama</label>

                                    <input type="file" name="foto_bersama" class="form-control" id="foto_bersama"
                                        @if (!$absensiData) required @endif>

                                    @if ($absensiData)
                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                                    @endif
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Kirim Absensi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach


        <!-- Modal Preview Foto -->
        <div id="fotoModal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Dokumentasi Absensi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        <button id="prevFotoBtn" onclick="prevFoto()" class="btn btn-light me-2">&lt;</button>
                        <img id="fotoModalImg" src="" alt="Dokumentasi Absensi"
                            class="img-fluid rounded shadow" style="max-height:70vh;" />
                        <button id="nextFotoBtn" onclick="nextFoto()" class="btn btn-light ms-2">&gt;</button>
                        <div id="fotoModalCaption" class="mt-2 text-muted"></div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const fotoMap = {};
            @foreach ($jadwal as $item)
                @php
                    $fotoList = [];
                    foreach ($item->absensi as $absensi) {
                        $pivot = $absensi->fasilitator->firstWhere('id', $fasilitatorId)?->pivot;
                        if ($pivot) {
                            foreach ($absensi->foto as $foto) {
                                $fotoList[] = asset('storage/' . $foto->path);
                            }
                            break;
                        }
                    }
                @endphp
                fotoMap[{{ $item->id }}] = @json($fotoList);
            @endforeach

            let currentFotoList = [];
            let currentFotoIndex = 0;

            function showFotoModal(jadwalId, index) {
                currentFotoList = fotoMap[jadwalId] || [];
                currentFotoIndex = index;
                updateFotoModal();
                var modal = new bootstrap.Modal(document.getElementById('fotoModal'));
                modal.show();
            }

            function updateFotoModal() {
                const img = document.getElementById('fotoModalImg');
                img.src = currentFotoList[currentFotoIndex];
                document.getElementById('fotoModalCaption').textContent =
                    `Foto ${currentFotoIndex + 1} dari ${currentFotoList.length}`;
                document.getElementById('prevFotoBtn').disabled = currentFotoIndex === 0;
                document.getElementById('nextFotoBtn').disabled = currentFotoIndex === currentFotoList.length - 1;
            }

            function prevFoto() {
                if (currentFotoIndex > 0) {
                    currentFotoIndex--;
                    updateFotoModal();
                }
            }

            function nextFoto() {
                if (currentFotoIndex < currentFotoList.length - 1) {
                    currentFotoIndex++;
                    updateFotoModal();
                }
            }
        </script>

    </div>

    @include('layouts.footer-template')

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
