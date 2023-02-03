<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/adminlayout.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    @yield('link')


</head>

<body>
    <div class="main  d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Admin Panel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block h-auto " id="navbarTogglerDemo03">
                    <a href="/dashboard/berita" @if (request()->route()->uri == 'adminberita') class="active" @endif> Berita</a>
                    <a href="/dashboard/gallery" @if (request()->route()->uri == 'admingallery') class="active" @endif>Gallery</a>
                    <a href="/dashboard/anggota" @if (request()->route()->uri == 'adminanggota') class="active" @endif>Anggota</a>
                    <a href="/dashboard/DewanTonti" @if (request()->route()->uri == '/dashboard/DewanTonti') class="active" @endif>Dewan
                        tonti</a>
                    <a href="logout" @if (request()->route()->uri == 'logout') class="active" @endif>Logout</a>
                </div>
                <div class="content col-lg-10 p-5">
                    @yield('judul')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    @yield('jsScript')
</body>

</html>
