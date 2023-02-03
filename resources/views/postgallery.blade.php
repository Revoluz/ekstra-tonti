@extends('layout.mainlayout')
@section('title', 'Gallery')
    
@section('head')
            <link rel="stylesheet" href="{{ URL::asset('css/postGallery.css') }}" />
    
@endsection
@section('judul')
    <div class="judul">
        <div class="header-post">
          <h2>{{$tittle}}</h2>
        </div>
        <div class="row justify-content-center w-100 flex-column align-items-center">
          <div class="col-6">
            <hr />
          </div>
          <div class="col-4">
                    <div class="date"><p>{{date('d-m-Y', strtotime($tanggal))}}</p></div>
            <hr />
          </div>
        </div>
      </div>
@endsection
@section('content')
        <div class="postgallery">
          <div class="container-fluid">
              <div class="container">
                <div class="post">
                    <div class="row">
                      <div id="myModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="img01" />
                        <div id="caption"></div>
                      </div>
                        @foreach ($gallery as $item)
                        <div class="col-lg-4 col-6 post-img">
                          {{-- <img src="{{asset('/storage/foto_gallery/'.$item->image)}}" alt="" /> --}}
                              <img
                          id="myImg"
                          alt=""
                          src="{{asset('/storage/foto_gallery/'.$item->image)}}"
                          onclick="document.getElementById('myModal').style.display='block'"/>
                        </div>
                        @endforeach
                    </div>
                </div>
              </div>
          </div>
        </div>
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
@endsection