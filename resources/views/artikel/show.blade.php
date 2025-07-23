<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $artikel->judul }} - Detail Artikel</title>

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

    <main>
        <section class="hero" id="hero">
            <div class="heroText">
                <h1 class="news-detail-title text-white mt-lg-5 mb-lg-4" data-aos="zoom-in" data-aos-delay="300">
                    {{ $artikel->judul }}
                </h1>

                <div class="d-flex justify-content-center align-items-center">
                    <span class="text-secondary-white-color social-share-link">
                        <i class="bi-person-circle me-1"></i> {{ $artikel->user->name ?? 'Penulis' }}
                    </span>
                    <span class="ms-4">{{ $artikel->published_at->diffForHumans() }}</span>
                </div>
            </div>

            <div class="videoWrapper">
                <img src="{{ $artikel->gambar ? asset('storage/' . $artikel->gambar) : asset('template/images/default.jpg') }}"
                    class="img-fluid news-detail-image" alt="Gambar Utama Artikel">
            </div>

            <div class="overlay"></div>
        </section>

        @include('layouts.navbar-template')

        <section class="news-detail section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-10 mx-auto">
                        <h2 class="mb-3" data-aos="fade-up">{{ $artikel->judul }}</h2>

                        <div class="me-4" data-aos="fade-up">
                            {!! nl2br(e($artikel->konten)) !!}
                        </div>

                        {{-- Galeri Foto --}}
                        @if ($artikel->fotos && $artikel->fotos->count())
                            <div class="mt-5" data-aos="fade-up">
                                <h4 class="mb-3">Galeri Foto</h4>
                                <div class="row">
                                    @foreach ($artikel->fotos as $foto)
                                        <div class="col-md-4 mb-3">
                                            <a href="{{ asset('storage/' . $foto->path) }}" class="image-popup">
                                                <img src="{{ asset('storage/' . $foto->path) }}"
                                                    class="img-fluid rounded" alt="Foto Artikel">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('artikel.index') }}" class="btn btn-primary">
                                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Artikel
                                </a>
                            </div>
                        @endif

                        <hr>
                        <h4>Komentar</h4>

                        @auth
                            <form action="{{ route('komentar.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="artikel_id" value="{{ $artikel->id }}">
                                <textarea name="isi" class="form-control mb-2" rows="3" placeholder="Tulis komentar Anda..."></textarea>
                                <button class="btn btn-primary">Kirim Komentar</button>
                            </form>
                        @else
                            <p>Silakan <a href="{{ route('login') }}">login</a> untuk berkomentar.</p>
                        @endauth

                        <div class="mt-4">
                            @foreach ($artikel->komentar as $komentar)
                                @include('components.komentar-item', [
                                    'komentar' => $komentar,
                                    'artikel' => $artikel,
                                    'level' => 0,
                                ])
                            @endforeach
                        </div>

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
        $(document).ready(function() {
            $('.image-popup').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>

    <script>
        function toggleReplyForm(id) {
            const form = document.getElementById('reply-form-' + id);
            if (form.classList.contains('d-none')) {
                form.classList.remove('d-none');
            } else {
                form.classList.add('d-none');
            }
        }
    </script>

</body>

</html>
