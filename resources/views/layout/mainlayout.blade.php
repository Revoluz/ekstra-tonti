<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TONTI SMKN 1 BANTUL | {{ $title }}</title>
    <link rel="icon" href="{{ URL::asset('/resources/img/logo2.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@800&family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto+Slab:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@800&family=Roboto+Slab:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ URL::asset('css/Footer.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/nav.css') }}" />

    @yield('head')
</head>

<body>
    {{-- navbar --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="/resources/img/Logo.png" alt="" width="30" />

                    <p>
                        BHAMAYOBA <br />
                        SMKN 1 BANTUL
                    </p>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto text-center">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/*') ? ' active' : '' }}" href="/">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('profile*') ? '  active' : '' }}"
                                href="/profile">PROFIL</a>
                        </li>
                        <li class="nav-item">
                            <a href="/anggota"
                                class="nav-link {{ Request::is('anggota*') ? '  active' : '' }}">ANGGOTA</a>
                        </li>
                        <li class="nav-item">
                            <a href="/berita" class="nav-link {{ Request::is('berita*') ? '  active' : '' }}">PRESTASI &
                                BERITA</a>
                        </li>
                        <li class="nav-item">
                            <a href="/gallery"
                                class="nav-link {{ Request::is('gallery*') ? '  active' : '' }}">GALLERY</a>
                        </li>
                    </ul>
                    <div class="text-center">
                        <form action="/login">
                            <input class="button-secondary" type="submit" value="MASUK" />
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        @yield('judul')
    </header>

    {{-- navbar end --}}
    {{-- content --}}
    @yield('content')
    {{-- content-end --}}
    {{-- footer --}}
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xl-3 smk col-lg-6">
                    <img src="/resources/img/logo-smk.png" alt="" />
                    <h4>Pusat Keunggulan</h4>
                    <hr />
                    <div class="social-media d-flex">
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/smknegeri1bantul" target="_blank"><i
                                        class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/c/officialsmkn1bantul" target="_blank"><i
                                        class="fa-brands fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/smkn1bantul/" target="_blank"><i
                                        class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="https://www.tiktok.com/@skansaba.id" target="_blank"><i
                                        class="fa-brands fa-tiktok"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 ct">
                    <h4>Kontak</h4>
                    <div class="contact">
                        <ul>
                            <li>
                                <i class="fa-solid fa-envelope"></i>
                                <p>smeanbtl@yahoo.com</p>
                            </li>
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                <p>Jl.Parangtritis KM 11 Sabdodadi Bantul Yogyakarta 55702</p>
                            </li>
                            <li>
                                <i class="fa-solid fa-phone"></i>
                                <p>0274 - 513454</p>
                            </li>
                            <li>
                                <i class="fa-solid fa-fax"></i>
                                <p>0274 - 542604</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 jadwal">
                    <h4>Jam Ekstrakulikuler</h4>
                    <div class="jadwal-jam">
                        <p>15:00 WIB ekstra di mulai</p>
                        <p>17:00 WIB ekstra selesai</p>
                    </div>
                </div>
                <div class="col-xl-3 location col-lg-6">
                    <h4>Lokasi</h4>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6646.5233379655965!2d110.35425099027097!3d-7.890212476974609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7b00889ad8f84d%3A0x2e0009ca7815eaf0!2sSMK%20Negeri%201%20Bantul!5e0!3m2!1sid!2sid!4v1663239802309!5m2!1sid!2sid"
                        height="300" width="100%
                " style="border: 2" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="container-fluid d-flex">
                <p>Copyright © 2022 <span class="red"> SMK Negeri 1 Bantul </span></p>
                <div class="d-flex">
                    <div class="vr"></div>
                </div>

                <p><span class="red"> Developed by 24 RPL 2</span></p>
            </div>
        </div>
    </footer>
    <!-- Back to top button -->
    <a id="button"></a>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/upbtn.js"></script>

</body>

</html>
