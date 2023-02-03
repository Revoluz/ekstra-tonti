@extends('layout.mainlayout')
@section('title', 'Anggota')
    
@section('head')
                <link rel="stylesheet" href="/css/anggota.css" />
                <link rel="stylesheet" href="js/modal.js" />
                <link rel="stylesheet" href="{{ URL::asset('css/anggota.css') }}" />
                <link rel="stylesheet" href="{{ URL::asset('js/modal.css') }}" />

@endsection
@section('judul')
            <div class="judul">
            <div class="header-post">
            <h2>ANGGOTA TONTI</h2>
            </div>
            <div class="row justify-content-center w-100 flex-column align-items-center">
            <div class="col-6">
                <hr />
            </div>
            <div class="col-4">
                <div class="dropdown">
                <a
                    class="btn btn-secondary dropdown-toggle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                {{ $year->masaAktifAnggota }}
                </a>

                <ul class="dropdown-menu">
                    @foreach ($tahun as $post)
                    <li><a class="dropdown-item" href="/anggota/{{ $post->slug }}">{{ $post->masaAktifAnggota }}</a></li>
                    @endforeach
                </ul>
                </div>
                <hr />
            </div>
            </div>
        </div>
@endsection
@section('content')
        <div class="content">
        <div class="container-fluid">
            <div class="container">
            <div class="row">
                <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01" />
                <div id="caption"></div>
                </div>
                    @foreach ($posts as $post)
                <div class="col-lg-3 col-6 mdl">
                        @if ($post->image !='')
                            <img
                                id="myImg"
                                alt=""
                                
                                src="{{asset('storage/foto_anggota/'.$post->image)}}"
                                onclick="document.getElementById('myModal').style.display='block'"
                            />
                            @else
                                <img
                                id="myImg"
                                alt=""
                                
                                src="{{asset('resources/img/default-profile-d.png'.$post->image)}}"
                                onclick="document.getElementById('myModal').style.display='block'"
                            />
                            @endif
                <div class="caption">{{$post->name}}</div>
                </div>
                
                    @endforeach
            </div>
            </div>
        </div>
        </div>
        <!-- content-end -->
        
        <!-- js -->
        <script>
        // Get the modal
        var modal = document.getElementById("myModal");


        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        };


        // Get all images and insert the clicked image inside the modal
        // Get the content of the image description and insert it inside the modal image caption
        var images = document.getElementsByTagName("img");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        var i;
        for (i = 0; i < images.length; i++) {
            images[i].onclick = function () {
            modal.style.display = "block";
            modalImg.src = this.src;
            modalImg.alt = this.alt;
            captionText.innerHTML = this.nextElementSibling.innerHTML;
            };
        }
        </script>
        <script>

        </script>
@endsection