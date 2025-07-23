<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profil Pengguna</title>

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
        @include('layouts.navbar-template')

        <div class="container py-5">
            <h2>Profil Pengguna</h2>
            <div class="card mt-4">
                <div class="card-body">
                    <p><strong>Nama:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Terdaftar sejak:</strong> {{ $user->created_at->translatedFormat('d F Y') }}</p>
                </div>
            </div>

            @if ($artikels->count())
                <div class="mt-5">
                    <h4 class="section-title">Artikel oleh {{ $user->name }}</h4>
                    <ul class="list-group">
                        @foreach ($artikels as $artikel)
                            <li
                                class="list-group-item d-flex justify-content-between align-items-start flex-column flex-md-row">
                                <div>
                                    <a href="{{ route('artikel.show', $artikel->slug) }}">{{ $artikel->judul }}</a><br>
                                    <small class="text-muted">Dipublikasikan:
                                        {{ \Carbon\Carbon::parse($artikel->published_at)->translatedFormat('d M Y') }}</small>
                                </div>
                                <div class="mt-2 mt-md-0">
                                    <a href="{{ route('artikel.edit', $artikel->slug) }}"
                                        class="btn btn-sm btn-warning me-1">Edit</a>

                                    <form action="{{ route('artikel.destroy', $artikel->slug) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
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
