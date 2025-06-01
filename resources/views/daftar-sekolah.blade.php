<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <style>
        #map {
            height: 300px;
            border-radius: 10px;
        }

        body {
            background-color: #f8f9fa;
        }

        .table th {
            background-color: #0d6efd;
            color: white;
            text-align: center;
        }

        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>

    @include('layouts.navbar')

    <div class="container py-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Data Siswa</h2>
            <h5 class="text-muted">Nama Sekolah:</h5>
            <select class="form-select" id="select-sekolah">
                <option selected value="1">Pilih Sekolah</option>
                @foreach ($sekolahs as $sekolah)
                    <option value="{{ $sekolah->id }}">{{ $sekolah->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="table-responsive mb-3">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Panggilan</th>
                        <th>Kelas</th>
                        <th>No. Telp</th>
                        <th>Alamat Rumah</th>
                        <th>Golongan Darah</th>
                    </tr>
                </thead>
                <tbody id="siswa-body">
                    @foreach ($siswas as $index => $siswa)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $siswa->nis }}</td>
                            <td>{{ $siswa->nisn }}</td>
                            <td>{{ $siswa->nama_lengkap }}</td>
                            <td>{{ $siswa->nama_panggilan }}</td>
                            <td>{{ $siswa->kelas }}</td>
                            <td>{{ $siswa->no_telp }}</td>
                            <td>{{ $siswa->alamat }}</td>
                            <td>{{ $siswa->golongan_darah }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <p class="text-muted">Menampilkan 10 siswa pertama (belum difilter berdasarkan sekolah).</p>

        </div>

        <div>
            <h5 class="mb-3">Lokasi Sekolah</h5>
            <p id="alamat-sekolah">Pilih sekolah untuk melihat alamat</p>
            <div id="map" class="shadow"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        // Data sekolah dari backend
        const sekolahs = @json($sekolahs);
        // Inisialisasi map
        var map = L.map('map').setView([-6.3348418, 106.8211323], 16);
        var marker = null;
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        function updateMap(sekolahId) {
            const sekolah = sekolahs.find(s => s.id == sekolahId);
            if (!sekolah || !sekolah.latitude || !sekolah.longitude) {
                document.getElementById('alamat-sekolah').textContent = 'Pilih sekolah untuk melihat alamat';
                if (marker) map.removeLayer(marker);
                return;
            }
            // Update alamat
            document.getElementById('alamat-sekolah').textContent = sekolah.alamat;
            // Update marker
            if (marker) map.removeLayer(marker);
            marker = L.marker([sekolah.latitude, sekolah.longitude]).addTo(map).bindPopup(`
                <b>${sekolah.nama}</b><br>
                <a href="https://maps.google.com/?q=${sekolah.latitude},${sekolah.longitude}" target="_blank">Buka di Google Maps</a>
            `);
            map.setView([sekolah.latitude, sekolah.longitude], 17);
        }

        document.getElementById('select-sekolah').addEventListener('change', function() {
            const idSekolah = this.value;
            updateMap(idSekolah);
            const tbody = document.getElementById('siswa-body');
            tbody.innerHTML = '<tr><td colspan="9" class="text-center">Loading...</td></tr>';

            if (!idSekolah) {
                tbody.innerHTML = '<tr><td colspan="9" class="text-center">Silakan pilih sekolah</td></tr>';
                return;
            }

            fetch(`/siswa/by-sekolah/${idSekolah}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length === 0) {
                        tbody.innerHTML =
                            '<tr><td colspan="9" class="text-center">Tidak ada data siswa</td></tr>';
                        return;
                    }

                    tbody.innerHTML = '';
                    data.forEach((siswa, index) => {
                        tbody.innerHTML += `
            <tr>
              <td>${index + 1}</td>
              <td>${siswa.nis ?? ''}</td>
              <td>${siswa.nisn ?? ''}</td>
              <td>${siswa.nama_lengkap}</td>
              <td>${siswa.nama_panggilan}</td>
              <td>${siswa.kelas}</td>
              <td>${siswa.no_telp}</td>
              <td>${siswa.alamat}</td>
              <td>${siswa.golongan_darah ?? ''}</td>
            </tr>
          `;
                    });
                })
                .catch(error => {
                    console.error(error);
                    tbody.innerHTML = '<tr><td colspan="9" class="text-center">Gagal memuat data</td></tr>';
                });
        });

        // Set default map/alamat jika ada sekolah pertama
        if (sekolahs.length > 0) {
            updateMap(document.getElementById('select-sekolah').value);
        }
    </script>

</body>

</html>
