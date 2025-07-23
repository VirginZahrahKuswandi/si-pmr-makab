<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Buat Artikel Baru</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;700;900&display=swap"
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

    <main>
        <section class="section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">

                        <h2 class="mb-4">Buat Artikel Baru</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control"
                                    value="{{ old('judul') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="">Semua Kategori</option>
                                    <option value="umum" {{ old('kategori') == 'umum' ? 'selected' : '' }}>Umum
                                    </option>
                                    <option value="lomba" {{ old('kategori') == 'lomba' ? 'selected' : '' }}>Lomba
                                    </option>
                                    <option value="prestasi" {{ old('kategori') == 'prestasi' ? 'selected' : '' }}>
                                        Prestasi</option>
                                    <option value="latihan-rutin"
                                        {{ old('kategori') == 'latihan-rutin' ? 'selected' : '' }}>Latihan Rutin
                                    </option>
                                    <option value="latihan-gabungan"
                                        {{ old('kategori') == 'latihan-gabungan' ? 'selected' : '' }}>Latihan Gabungan
                                    </option>
                                    <option value="makab" {{ old('kategori') == 'makab' ? 'selected' : '' }}>MAKAB
                                    </option>
                                </select>
                            </div>


                            <div class="form-group mb-3">
                                <label for="konten">Konten</label>
                                <textarea name="konten" id="konten" class="form-control" rows="6" required>{{ old('konten') }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="gambar">Gambar Utama</label>
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>

                            <div class="form-group mb-4">
                                <label for="galeri">Galeri Foto (boleh lebih dari satu)</label>
                                <input type="file" name="galeri[]" id="galeri" class="form-control" multiple>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Artikel</button>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </main>

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
