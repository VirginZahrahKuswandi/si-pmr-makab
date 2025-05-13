<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Fasilitator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .section-title {
            color: #0d6efd;
            font-weight: bold;
        }

        .section-title::after {
            content: "";
            display: block;
            width: 40px;
            height: 3px;
            background-color: #f4661b;
            margin-top: 4px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <div class="container py-5">
        @foreach ($fasilitators as $fasilitator)
            <div class="row align-items-start">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <img src="https://picsum.photos/300/400" alt="Foto Fasilitator" class="img-fluid rounded shadow">
                </div>

                <div class="col-md-8">
                    <h3 class="section-title mb-3">{{ $fasilitator->nama }}</h3>

                    <h5 class="section-title">Latar Belakang Pendidikan</h5>
                    <ul>
                        <li>{{ $fasilitator->pendidikan_terakhir }}</li>
                    </ul>

                    <h5 class="section-title">Pelatihan/Sertifikasi</h5>
                    <ul>
                        <li>{{ $fasilitator->pelatihan_sertifikasi }}</li>
                    </ul>

                    <table class="table table-bordered mt-4">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">No. Anggota PMI</th>
                                <td>{{ $fasilitator->nomor_anggota_pmi }}</td>
                            </tr>
                            <tr>
                                <th>No. Anggota MAKAB</th>
                                <td>{{ $fasilitator->nomor_anggota_makab }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Bergabung MAKAB</th>
                                <td>{{ $fasilitator->tahun_bergabung_makab }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr class="my-5" />
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
