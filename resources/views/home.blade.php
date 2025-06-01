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
    <!--

TemplateMo 567 Nomad Force

https://templatemo.com/tm-567-nomad-force

-->
</head>

<body>

    <main>

        <section class="hero" id="hero">
            <div class="heroText">
                <h1 class="text-white mt-5 mb-lg-4" data-aos="zoom-in" data-aos-delay="800">
                    Sistem Informasi PMR MAKAB
                </h1>

                <p class="text-secondary-white-color" data-aos="fade-up" data-aos-delay="1000">
                    create a great video for your <strong class="custom-underline">website</strong>
                </p>
            </div>

            <div class="videoWrapper">
                <img src="{{ asset('template/images/hero5.jpg') }}" alt="Hero Image" class="img-fluid w-100" />
            </div>

            <div class="overlay"></div>
        </section>

        @include('layouts.navbar-template')

        <section class="section-padding pb-0" id="about">
            <div class="container mb-5 pb-lg-5">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-3" data-aos="fade-up">Let us create...</h2>
                    </div>

                    <div class="col-lg-6 col-12 mt-3 mb-lg-5">
                        <p class="me-4" data-aos="fade-up" data-aos-delay="300">You may contribute <a rel="nofollow"
                                href="http://paypal.me/templatemo" target="_blank">a small amount</a> via PayPal if <a
                                rel="nofollow" href="https://templatemo.com/tm-567-nomad-force" target="_parent">Nomad
                                Force Template</a> is useful for you. This will absolutely help us to keep creating
                            better CSS templates for you. <br><br>We provide you 100% free templates on TemplateMo
                            website. Images are provided by FreePik and Unsplash websites.</p>
                    </div>

                    <div class="col-lg-6 col-12 mt-lg-3 mb-lg-5">
                        <p data-aos="fade-up" data-aos-delay="500">This Bootstrap 5 layout is free to use for your
                            business. You are allowed to edit it in any way you like. However, please do not
                            redistribute this template ZIP file for a template download purpose on any other website
                            such as Free CSS collections.</p>
                    </div>

                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-12 p-0">
                        <img src="{{ asset('template/images/elena-rabkina-eVVzwsNhNf4-unsplash.jpg') }}"
                            class="img-fluid about-image" alt="">
                    </div>

                    <div class="col-lg-3 col-12 bg-dark">
                        <div
                            class="d-flex flex-column flex-wrap justify-content-center h-100 py-5 px-4 pt-lg-4 pb-lg-0">
                            <h3 class="text-white mb-3" data-aos="fade-up">We’re - idealists and strategic thinkers.
                            </h3>

                            <p class="text-secondary-white-color" data-aos="fade-up">Over six years in the video
                                business</p>

                            <div class="mt-3 custom-links">

                                <a href="#news" class="text-white custom-link" data-aos="zoom-in"
                                    data-aos-delay="100">Read News & Events</a>

                                <a href="#contact" class="text-white custom-link" data-aos="zoom-in"
                                    data-aos-delay="300">Work with Us</a>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-12 p-0">
                        <section id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('template/images/people/studio-shot-beautiful-happy-retired-caucasian-female-with-pixie-hairdo-crossing-arms-her-chest-having-confident-look-smiling-broadly.jpg') }}"
                                        class="img-fluid team-image" alt="">

                                    <div class="team-thumb bg-warning">
                                        <h3 class="text-white mb-0">Susane R.</h3>

                                        <p class="text-secondary-white-color mb-0">Founding Partner</p>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <img src="{{ asset('template/images/people/project-leder-with-disabilities-looking-front-sitting-immobilized-wheelchair-business-office-room.jpg') }}"
                                        class="img-fluid team-image" alt="">

                                    <div class="team-thumb bg-primary">
                                        <h3 class="text-white mb-0">Morgan S.</h3>

                                        <p class="text-secondary-white-color mb-0">CEO & Investor</p>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <img src="{{ asset('template/images/people/asia-business-woman-feeling-happy-smiling-looking-camera-while-relax-home-office.jpg') }}"
                                        class="img-fluid team-image" alt="">

                                    <div class="team-thumb bg-success">
                                        <h3 class="text-white mb-0">Naomi W.</h3>

                                        <p class="text-secondary-white-color mb-0">Art Director</p>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <img src="{{ asset('template/images/people/happy-african-american-professional-manager-smiling-looking-camera-headshot-portrait.jpg') }}"
                                        class="img-fluid team-image" alt="">

                                    <div class="team-thumb bg-info">
                                        <h3 class="text-white mb-0">Robinson H.</h3>

                                        <p class="text-secondary-white-color mb-0">Sales & Marketing</p>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <img src="{{ asset('template/images/people/working-business-lady.jpg') }}"
                                        class="img-fluid team-image" alt="">

                                    <div class="team-thumb bg-danger">
                                        <h3 class="text-white mb-0">Jane M.</h3>

                                        <p class="text-secondary-white-color mb-0">Project Management</p>
                                    </div>
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>

                                <span class="visually-hidden">Next</span>
                            </button>
                        </section>

                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding" id="portfolio">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <h2 class="mb-5 text-center" data-aos="fade-up">Portfolio</h2>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="portfolio-thumb mb-5" data-aos="fade-up">
                            <a href="{{ asset('template/images/portfolio/visuals-Y4qzW3AsvqI-unsplash.jpeg') }}"
                                class="image-popup">
                                <img src="images/portfolio/visuals-Y4qzW3AsvqI-unsplash.jpeg"
                                    class="img-fluid portfolio-image" alt="">
                            </a>

                            <div class="portfolio-info">
                                <h4 class="portfolio-title mb-0">Effortless</h4>

                                <p class="text-danger">Branding</p>
                            </div>
                        </div>

                        <div class="portfolio-thumb" data-aos="fade-up">
                            <a href="{{ asset('template/images/portfolio/severin-candrian-nn3uIZqmUtE-unsplash.jpeg') }}"
                                class="image-popup">
                                <img src="{{ asset('template/images/portfolio/severin-candrian-nn3uIZqmUtE-unsplash.jpeg') }}"
                                    class="img-fluid portfolio-image" alt="">
                            </a>

                            <div class="portfolio-info">
                                <h4 class="portfolio-title mb-0">Health technology</h4>

                                <p class="text-success">Art Direction</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="portfolio-thumb mt-5 mt-lg-0 mb-5" data-aos="fade-up">
                            <a href="{{ asset('template/images/portfolio/tyler-nix-Y1drF0Y3Oe0-unsplash.jpeg') }}"
                                class="image-popup">
                                <img src="{{ asset('template/images/portfolio/tyler-nix-Y1drF0Y3Oe0-unsplash.jpeg') }}"
                                    class="img-fluid portfolio-image" alt="">
                            </a>

                            <div class="portfolio-info">
                                <h4 class="portfolio-title mb-0">Maki</h4>

                                <p class="text-warning">Website</p>
                            </div>
                        </div>

                        <div class="portfolio-thumb" data-aos="fade-up">
                            <a href="{{ asset('template/images/portfolio/thought-catalog-gv-T-OjLe4c-unsplash.jpeg') }}"
                                class="image-popup">
                                <img src="{{ asset('template/images/portfolio/thought-catalog-gv-T-OjLe4c-unsplash.jpeg') }}"
                                    class="img-fluid portfolio-image" alt="">
                            </a>

                            <div class="portfolio-info">
                                <h4 class="portfolio-title mb-0">The gig economy</h4>

                                <p class="text-info">Graphic</p>
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
                        <h2 class="mb-5 text-center" data-aos="fade-up">News & Events</h2>
                    </div>

                    <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                        <div class="news-thumb" data-aos="fade-up">
                            <a href="news-detail.html" class="news-image-hover news-image-hover-warning">
                                <img src="{{ asset('template/images/news/caroline-lm-uqveD8dYPUM-unsplash.jpg') }}"
                                    class="img-fluid large-news-image news-image" alt="">
                            </a>

                            <div class="news-category bg-warning text-white">News</div>

                            <div class="news-text-info">
                                <h5 class="news-title">
                                    <a href="news-detail.html" class="news-title-link">The rise of the gig economy
                                        spells the end for these workers the old system</a>
                                </h5>

                                <span class="text-muted">22 hours ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="news-thumb news-two-column d-flex flex-column flex-lg-row" data-aos="fade-up">
                            <div class="news-top w-100">

                                <a href="news-detail.html" class="news-image-hover news-image-hover-primary">
                                    <img src="{{ asset('template/images/news/jean-philippe-delberghe-MmanXAs1sKw-unsplash.jpeg') }}"
                                        class="img-fluid news-image" alt="">
                                </a>

                                <div class="news-category bg-primary text-white">Events</div>
                            </div>

                            <div class="news-bottom w-100">
                                <div class="news-text-info">
                                    <h5 class="news-title">
                                        <a href="news-detail.html" class="news-title-link">Job Opportunities: Digital,
                                            Marketing</a>
                                    </h5>

                                    <div class="d-flex flex-wrap">
                                        <span class="text-muted me-2">
                                            <i class="bi-geo-alt-fill me-1 mb-2 mb-lg-0"></i>
                                            Alaska,
                                        </span>

                                        <span class="text-muted">August 6, 2021</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="news-thumb news-two-column d-flex flex-column flex-lg-row" data-aos="fade-up">
                            <div class="news-top w-100" data-aos="fade-up">

                                <a href="news-detail.html" class="news-image-hover news-image-hover-success">
                                    <img src="{{ asset('template/images/news/maria-stewart-p4tj0g-_aMM-unsplash.jpeg') }}"
                                        class="img-fluid news-image" alt="">
                                </a>

                                <div class="news-category bg-success text-white">News</div>
                            </div>

                            <div class="news-bottom w-100">
                                <div class="news-text-info">
                                    <h5 class="news-title">
                                        <a href="news-detail.html" class="news-title-link">What happened to new viral
                                            video?</a>
                                    </h5>

                                    <span class="text-muted">6 days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>

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
