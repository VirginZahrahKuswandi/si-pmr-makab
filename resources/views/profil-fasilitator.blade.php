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

    <script src="https://kit.fontawesome.com/22453fa8c0.js" crossorigin="anonymous"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;700;900&display=swap"
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
        @foreach ($fasilitators as $fasilitator)
            <div class="row align-items-start">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <img src="{{ $fasilitator->foto ? asset('storage/' . $fasilitator->foto) : 'https://picsum.photos/300/400' }}"
                        alt="Foto Fasilitator" class="img-fluid rounded shadow mb-3"
                        style="max-width: 300px; max-height: 400px;">
                </div>

                <div class="col-md-8">
                    <h3 class="section-title mb-3" style="color: #000;">{{ $fasilitator->nama }}</h3>

                    <h5 class="section-title" style="color: #000;">Latar Belakang Pendidikan</h5>
                    <ul>
                        <li>{{ $fasilitator->pendidikan_terakhir }}</li>
                    </ul>

                    <h5 class="section-title" style="color: #000;">Pelatihan/Sertifikasi</h5>
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
        <div class="d-flex justify-content-center">
            {{ $fasilitators->links() }}
        </div>
    </div>


    @include('layouts.footer-template')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
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
