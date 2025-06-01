<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI MAKAB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/jpeg" href="{{ asset('img/logo-makab.jpg') }}">

</head>

<body>
    @include('layouts.navbar')

    <div class="container py-5">
        <h1 class="text-center mb-4">Selamat Datang di SI MAKAB</h1>
        <p class="text-center mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi necessitatibus placeat
            quis, natus iusto, provident aut neque harum incidunt unde velit? Delectus voluptatibus, error aliquam hic
            dicta sint. Non, impedit.</p>
        <div class="text-center">
            <a href="/daftar-sekolah" class="btn btn-primary btn-lg">Lihat Daftar Sekolah</a>
        </div>
    </div>

    {{-- content --}}

    <footer class="bg-light text-center py-4">
        <p class="mb-0">© 2023 SI MAKAB. All rights reserved.</p>
        <p class="mb-0">Developed by <a href="#">Your Name</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
