@extends('layout.mainlayout')
@section('title', 'Berita')
    
@section('head')
    <link rel="stylesheet" href="{{ URL::asset('css/berita.css') }}" />
    
@endsection
@section('judul')
        <div class="judul">
            <h2>BERITA & PRESTASI</h2>
            <div class="row justify-content-center w-100 flex-column align-items-center">
            <div class="col-6">
                <hr />
            </div>
            <div class="col-4"><hr /></div>
            </div>
        </div>
@endsection
@section('content')
        <div class="berita">
        <div class="container-fluid">
            <div class="container">
            <div class="content">
                <div class="row">
                    @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                    <img src="{{asset('storage/berita/'.$post->thumbnailImg)}}" alt="" />
                    <p>{{$post->judulBerita}}</p>
                    <a href="/berita/{{ $post->slug }}">SELENGKAPNYA</a>
                    </div>
                </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- content-end -->
@endsection