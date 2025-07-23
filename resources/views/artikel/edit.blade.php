<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Artikel</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template/css/magnific-popup.css') }}">
    <link href="{{ asset('template/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/templatemo-nomad-force.css') }}" rel="stylesheet">

    <style>
        /* Preview image kecil */
        .preview-img {
            max-width: 150px;
            max-height: 150px;
            margin-top: 10px;
            object-fit: contain;
            border: 1px solid #ddd;
            padding: 4px;
        }
    </style>
    <script src="https://kit.fontawesome.com/22453fa8c0.js" crossorigin="anonymous"></script>


</head>

<body>
    @include('layouts.navbar-template')

    <main>
        <section class="section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">

                        <h2 class="mb-4">Edit Artikel</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('artikel.update', $artikel->slug) }}" method="POST"
                            enctype="multipart/form-data">


                            @csrf
                            @method('PUT')

                            <!-- Judul -->
                            <div class="form-group mb-3">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control"
                                    value="{{ old('judul', $artikel->judul) }}" required>
                            </div>

                            <!-- Konten -->
                            <div class="form-group mb-3">
                                <label>Konten</label>
                                <textarea name="konten" class="form-control" rows="5" required>{{ old('konten', $artikel->konten) }}</textarea>
                            </div>

                            <!-- Gambar Utama -->
                            <div class="form-group mb-3">
                                <label>Gambar Utama (opsional jika tidak ingin diganti)</label>
                                <input type="file" id="gambar" name="gambar" class="form-control">
                                <!-- tambah id="gambar" -->
                                @if ($artikel->gambar)
                                    <img src="{{ asset('storage/' . $artikel->gambar) }}" width="150" class="mt-2"
                                        id="preview-gambar">
                                @endif
                            </div>

                            <!-- Galeri Foto (Upload Baru) -->
                            <div class="mb-3">
                                <label>Galeri Foto (bisa tambah baru)</label>
                                <input type="file" name="galeri[]" id="galeri" multiple class="form-control">
                                <div id="preview-galeri" class="d-flex flex-wrap gap-2 mt-2"></div>
                                <!-- ganti id sesuai JS -->
                            </div>

                            <!-- Galeri Lama -->
                            <div class="mb-3">
                                <label>Galeri Saat Ini:</label>
                                <div class="d-flex flex-wrap gap-2 mt-2">
                                    @foreach ($artikel->fotos as $foto)
                                        <div style="position:relative; display:inline-block;">
                                            <img src="{{ asset('storage/' . $foto->path) }}" width="100"
                                                style="object-fit: cover; border: 1px solid #ccc;">
                                            <button type="button" class="btn btn-sm btn-danger"
                                                style="padding:2px 6px; position:absolute; top:0; right:0;"
                                                onclick="hapusFoto({{ $foto->id }})">X</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
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

    <script>
        // JS hapus foto tanpa form nested
        function hapusFoto(id) {
            if (confirm('Yakin hapus foto ini?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/artikel/foto/${id}`; // sesuaikan route kamu
                form.style.display = 'none';

                const csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = '{{ csrf_token() }}';
                form.appendChild(csrf);

                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);

                document.body.appendChild(form);
                form.submit();
            }
        }

        // Preview gambar utama
        document.getElementById('gambar').addEventListener('change', function(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    let img = document.getElementById('preview-gambar');
                    if (!img) {
                        img = document.createElement('img');
                        img.id = 'preview-gambar';
                        img.className = 'preview-img mt-2';
                        input.parentNode.appendChild(img);
                    }
                    img.src = e.target.result;
                    img.style.display = 'inline-block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

        // Preview galeri baru
        document.getElementById('galeri').addEventListener('change', function(event) {
            const preview = document.getElementById('preview-galeri');
            preview.innerHTML = '';
            const files = event.target.files;

            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100px';
                    img.style.maxHeight = '100px';
                    img.style.objectFit = 'cover';
                    img.style.marginRight = '8px';
                    img.style.marginBottom = '8px';
                    img.style.border = '1px solid #ccc';
                    preview.appendChild(img);
                }
                reader.readAsDataURL(file);
            });
        });
    </script>
</body>

</html>
