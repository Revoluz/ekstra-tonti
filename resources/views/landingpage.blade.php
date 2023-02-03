@extends('layout.mainlayout')
@section('title', 'Landing Page')
    
@section('head')
            <link rel="stylesheet" href="{{ URL::asset('css/Lp.css') }}" />
            <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}" />
            <link rel="stylesheet" href="{{ URL::asset('css/owl.theme.default.css') }}" />
                <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


@endsection
@section('judul')
        <div class="hero"></div>   
@endsection
@section('content')
        <div class="content">
        <div class="content-1 c">
            <div class="container-fluid">
            <div class="container">
                <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <h3>BHADRIKA MANGESTI SUDIBYO BUDI JAYA</h3>
                    <h3>Gagah Dalam Barisan <br />Santun Dalam Keseharian</h3>
                </div>
                </div>
            </div>
            </div>
        </div>
        <hr />
        <div class="content-2 c">
            <div class="container-fluid">
            <div class="container">
                <div class="row">
                <div class="col-12">
                    <div class="col-8">
                    <ol>
                        <li>Meningkatkan generasi penerus yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa</li>
                        <li>Melatih jiwa dan sikap kepemimpinan</li>
                        <li>Melatih rasa tanggung jawab dan sikap berani bertindak</li>
                        <li>Membentuk pleton inti berjiwa korsa</li>
                        <li>Melatih kedisiplinan dan pentingnya menghargai waktu</li>
                        <li>Melatih siswa/i kelas 10 untuk menjadi seorang yang kuat fisik maupun mental</li>
                    </ol>
                    </div>
                    <div class="col-1 d-flex justify-content-center">
                    <div class="d-flex" style="height: 100%">
                        <div class="vr"></div>
                    </div>
                    </div>
                    <div class="col-3 d-flex">
                    <div class="bungkus">
                        <h1>TUJUAN</h1>
                        <hr />
                        <h5>1</h5>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="content-3 c">
            <div class="container-fluid">
            <img src="resources/img/logo2.png" alt="" />
            </div>
        </div>
        <div class="content-4 c">
            <div class="container-fluid" style="height: 100%">
            <div class="container" style="height: 100%">
                <div class="row" style="height: 95%">
                <div class="col-12 d-flex">
                    <div class="col-3 d-flex">
                    <div class="bungkus">
                        <h1>visi</h1>
                        <hr />
                        <h5>2</h5>
                    </div>
                    </div>
                    <div class="col-1 d-flex justify-content-center">
                    <div class="d-flex" style="height: 100%">
                        <div class="vr"></div>
                    </div>
                    </div>
                    <div class="col-8">
                    <p>
                        Terwujudnya pleton inti sebagai suatu wadah bagi siswa siswi yang mampu membangun karakter bangsa
                        dengan keberanian dan ketangguhan.
                    </p>
                    <img src="resources/img/IMG-20220712-WA0125.jpg" alt="" />
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="content-5 c">
            <div class="container-fluid">
            <div class="container">
                <div class="row">
                <div class="col-12">
                    <img src="resources/img/IMG-20220712-WA0136.jpg" alt="" />
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="content-6 c">
            <div class="container-fluid" style="height: 100%">
            <div class="container" style="height: 100%">
                <div class="row" style="height: 95%">
                <div class="col-12 d-flex">
                    <div class="col-8">
                    <ol>
                        <li>Menjadikan pleton inti yg baik sehingga menjadi pedoman siswa lainnya</li>
                        <li>Melatih kedisiplinan, etos kerja, dan kekeluargaan yg tinggi</li>
                        <li>Menumbuhkan jiwa korsa dan solidaritas antar sesama</li>
                    </ol>
                    <img src="resources/img/IMG-20220712-WA0192.jpg" alt="" />
                    </div>
                    <div class="col-1 d-flex justify-content-center">
                    <div class="d-flex" style="height: 100%">
                        <div class="vr"></div>
                    </div>
                    </div>
                    <div class="col-3">
                    <div class="bungkus">
                        <h1>MISI</h1>
                        <hr />
                        <h5>3</h5>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="content-7 c">
            <div class="container-fluid">
            <div class="container">
                <div class="dt">
                    <div class="header-dt">
                        <h2>Dewan Tonti</h2>
                    </div>
                    <hr />
                    <div class="dt-carousel owl-theme owl-carousel rt-owl-carousel owl-loaded owl-drag">
                    @foreach ($dt as $post)
                        <div class="item">
                        <div class="dt">
                                @if ($post->foto !='')
                                <img src="{{asset('storage/foto_dewantonti/'.$post->foto)}}" alt="">
                                @else
                                <img src="{{asset('resources/img/default-profile-d.png')}}" alt="">
                                @endif
                            {{-- <img src="{{asset('storage/foto_dewantonti/'.$post->foto)}}" alt="" /> --}}
                            <h4>{{$post->nama}}</h4>
                            <p>{{$post->jabatan}}</p>
                        </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
            </div>
        </div>
        
        </div>
        <!-- owl -->
        <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"
        ></script>
        <script src="js/owl.carousel.js"></script>
        <!-- <script src="/js/owl.carousel.min.js"></script> -->

        <script>
        $(".dt-carousel").owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            navText: ["<i class='fa-solid fa-angle-left'></i>", "<i class='fa-solid fa-angle-right'></i>"],
            dots: false,
            responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            },
            1200: {
                items: 4,
            },
            },
        });
        $(".news-carousel").owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            navText: ["<i class='fa-solid fa-angle-left'></i>", "<i class='fa-solid fa-angle-right'></i>"],
            dots: false,
            touchDrag: false,
            autoplayHoverPause: true,
            
            responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            },
            },
        });
        //  $(".a").click(function(b){newLocation=this.href;$(".news").fadeOut(1000,a)});
        </script>
@endsection