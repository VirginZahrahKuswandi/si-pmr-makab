<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Artikel</title>
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/templatemo-nomad-force.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/22453fa8c0.js" crossorigin="anonymous"></script>

</head>

<body>
    @include('layouts.navbar-template')

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Artikel</h2>
            @auth
                @if (auth()->user()->fasilitator_id)
                    <a href="{{ route('artikel.create') }}" class="btn btn-primary">Tulis Artikel Baru</a>
                @endif
            @endauth
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="GET" action="{{ route('artikel.index') }}" class="row g-3 mb-4">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Cari judul..."
                    value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="kategori" class="form-control">
                    <option value="">Semua Kategori</option>
                    <option value="umum" {{ request('kategori') == 'umum' ? 'selected' : '' }}>Umum</option>
                    <option value="lomba" {{ request('kategori') == 'lomba' ? 'selected' : '' }}>Lomba</option>
                    <option value="prestasi" {{ request('kategori') == 'prestasi' ? 'selected' : '' }}>Prestasi
                    </option>
                    <option value="latihan-rutin" {{ request('kategori') == 'latihan-rutin' ? 'selected' : '' }}>
                        Latihan Rutin</option>
                    <option value="latihan-gabungan" {{ request('kategori') == 'latihan-gabungan' ? 'selected' : '' }}>
                        Latihan Gabungan</option>
                    <option value="makab" {{ request('kategori') == 'makab' ? 'selected' : '' }}>MAKAB</option>

                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-secondary w-100" type="submit">Filter</button>
            </div>
        </form>


        <div class="row">
            @forelse ($artikels as $artikel)
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        @if ($artikel->gambar)
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" class="card-img-top"
                                alt="{{ $artikel->judul }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('artikel.show', $artikel->slug) }}">{{ $artikel->judul }}</a>
                            </h5>
                            <p class="card-text">{{ Str::limit(strip_tags($artikel->konten), 120) }}</p>
                            <p class="text-muted mb-1">
                                <small>Oleh {{ $artikel->user->name ?? 'Anonim' }} |
                                    {{ $artikel->published_at ? \Carbon\Carbon::parse($artikel->published_at)->diffForHumans() : 'Belum dipublikasikan' }}</small>
                            </p>
                            <a href="{{ route('artikel.show', $artikel->slug) }}" class="btn btn-sm btn-primary">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada artikel ditemukan.</p>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{ $artikels->links() }}
        </div>
    </div>

    @include('layouts.footer-template')

    <script src="{{ asset('template/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
