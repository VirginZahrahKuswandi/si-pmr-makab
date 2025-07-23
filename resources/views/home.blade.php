<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>SI PMR MAKAB</title>

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

    <main>

        <section class="hero" id="hero">
            <div class="heroText">
                <h1 class="text-white mt-5 mb-lg-4" data-aos="zoom-in" data-aos-delay="800">
                    Sistem Informasi PMR MAKAB
                </h1>

                <p class="text-secondary-white-color" data-aos="fade-up" data-aos-delay="1000">
                    Mari Kita <strong class="custom-underline">Berkarya</strong>
                </p>
            </div>

            <div class="videoWrapper">
                <img src="{{ asset('hero.jpg') }}" alt="Hero Image" class="img-fluid w-100" />
            </div>

            <div class="overlay"></div>
        </section>

        @include('layouts.navbar-template')

        <section class="section-padding pb-0" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-3" data-aos="fade-up">Mari Kita Berkarya...</h2>
                    </div>

                    <div class="col-lg-6 col-12 mt-3 mb-lg-5">
                        <p class="me-4" data-aos="fade-up" data-aos-delay="300">
                            <strong>🌟 Visi MAKAB</strong>
                            <br />
                            "Menjadi organisasi tangguh dan terpercaya dalam membangun insan berdaya dan relawan
                            berkualitas, yang mampu memberi manfaat nyata bagi masyarakat di tingkat nasional maupun
                            internasional."
                        </p>
                    </div>

                    <div class="col-lg-6 col-12 mt-lg-3 mb-lg-5">
                        <p class="me-4" data-aos="fade-up" data-aos-delay="500">
                            <strong>🎯 Misi MAKAB</strong>
                            <br />
                            • Meningkatkan kualitas pendidikan melalui program pemberdayaan, pendampingan, dan
                            pelatihan yang inklusif dan berkelanjutan.
                            <br />
                            • Mendorong aksi sosial yang solutif dan kolaboratif dalam menjawab permasalahan
                            masyarakat dengan pendekatan empati dan berbasis kebutuhan lokal.
                            <br />
                            • Mengembangkan potensi sumber daya manusia, khususnya generasi muda, agar menjadi pribadi
                            yang mandiri, profesional, dan berintegritas tinggi.
                            Membangun dan memperkuat jaringan relawan, baik di tingkat lokal, nasional, maupun
                            internasional, sebagai agen perubahan yang siap berkontribusi secara nyata di berbagai
                            sektor.
                            <br />
                            • Menumbuhkan budaya gotong royong dan semangat berkarya, sebagai fondasi untuk
                            menciptakan dampak sosial yang berkelanjutan.
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-5 text-center" data-aos="fade-up">Latihan & Lomba</h2>
                    </div>

                    <div class="col-lg-6 col-12">

                        <div class="portfolio-thumb" data-aos="fade-up">
                            <a href="{{ asset('lomba1.jpg') }}" class="image-popup">
                                <img src="{{ asset('lomba1.jpg') }}" class="img-fluid portfolio-image" alt="">
                            </a>

                            <div class="portfolio-info">
                                <h4 class="portfolio-title mb-0">Latihan Pertolongan Pertama</h4>

                                <p class="text-success">Tingkat Mula</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="portfolio-thumb mt-5 mt-lg-0 mb-5" data-aos="fade-up">
                            <a href="{{ asset('lomba2.jpg') }}" class="image-popup">
                                <img src="{{ asset('lomba2.jpg') }}" class="img-fluid portfolio-image" alt="">
                            </a>

                            <div class="portfolio-info">
                                <h4 class="portfolio-title mb-0">Latihan Rutin</h4>

                                <p class="text-info">Tingkat Madya</p>
                            </div>
                        </div>

                        <div class="portfolio-thumb" data-aos="fade-up">
                            <a href="{{ asset('lomba3.jpg') }}" class="image-popup">
                                <img src="{{ asset('lomba3.jpg') }}" class="img-fluid portfolio-image" alt="">
                            </a>

                            <div class="portfolio-info">
                                <h4 class="portfolio-title mb-0">Lomba Tanggap Kebencanaan</h4>

                                <p class="text-warning">Tingkat Wira</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="news section-padding" id="news">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <h2 class="mb-5 text-center" data-aos="fade-up">Artikel Terbaru</h2>
                    </div>

                    @foreach ($daftar_artikel as $artikel)
                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <div class="news-thumb" data-aos="fade-up">
                                <a href="/artikel/{{ $artikel->slug }}"
                                    class="news-image-hover news-image-hover-warning">
                                    <img src="{{ $artikel->gambar ? asset('storage/' . $artikel->gambar) : asset('template/images/news/caroline-lm-uqveD8dYPUM-unsplash.jpg') }}"
                                        class="img-fluid large-news-image news-image" alt="{{ $artikel->judul }}">
                                </a>

                                <div class="news-category bg-warning text-white">{{ $artikel->kategori ?? 'News' }}
                                </div>

                                <div class="news-text-info">
                                    <h5 class="news-title">
                                        <a href="/artikel/{{ $artikel->slug }}" class="news-title-link">
                                            {{ $artikel->judul }}
                                        </a>
                                    </h5>

                                    <span class="text-muted">{{ $artikel->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <section class="google-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.5148559512313!2d106.83139971118814!3d-6.3272626618867625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed2dc48de615%3A0xaedce4ae33d58b7a!2sApotek%20K-24%20dr.%20Bambang%20Soelistyo%20Jakarta%20Selatan!5e0!3m2!1sid!2sid!4v1747489232083!5m2!1sid!2sid"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
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
