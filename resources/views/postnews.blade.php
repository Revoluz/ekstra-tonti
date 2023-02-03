@extends('layout.mainlayout')
@section('title', 'Berita')
    
@section('head')
            <link rel="stylesheet" href="{{ URL::asset('css/postNews.css') }}" />
    
@endsection
@section('judul')
    <div class="judul">
        <h2>{{ $post->judulBerita }}</h2>
        <div class="row justify-content-center w-100 flex-column align-items-center">
          <div class="col-6">
            <hr />
          </div>
          <div class="col-4">
            <p>{{date('d-m-Y', strtotime($post->pubilshed_at))}}</p>
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
            <div class="post-header"><img src="{{asset('storage/berita/'.$post->thumbnailImg)}}" alt="" /></div>
            <div class="post-content align-items-center">
              {!! $post->isiBerita !!}
            </div>
            <div class="comment">
              <div id="disqus_thread"></div>
              <script>
                (function () {
                  // DON'T EDIT BELOW THIS LINE
                  var d = document,
                    s = d.createElement("script");
                  s.src = "https://tonti-smkn-1-bantul.disqus.com/embed.js";
                  s.setAttribute("data-timestamp", +new Date());
                  (d.head || d.body).appendChild(s);
                })();
              </script>
              <noscript
                >Please enable JavaScript to view the
                <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript
              >
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection