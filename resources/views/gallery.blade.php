@extends('layout.mainlayout')
    
@section('head')
    <link rel="stylesheet" href="{{ URL::asset('css/gallery.css') }}" />
    
@endsection
@section('judul')
    
@endsection
@section('content')
    <div class="gallery">
      <div class="container">
        <div class="container-fluid">
          <div class="content">
            <div class="row">
              @foreach ($tahun as $item)
              <h1>{{$item->tahun}}</h1>
              @foreach ($item->event as $item)
              <div class="col-lg-4 col-6">
                    <div class="date"><p>{{date('d-m-Y', strtotime($item->tanggal))}}</p></div>
                    <div class="judul"><p>{{$item->nama_event}}</p></div>
                    <div class="image">
                      <a href="/gallery/{{$item->slug}}"><img src="{{asset('/storage/foto_thumbnailgly/'.$item->gambar)}}" alt="" /></a>
                    </div>
                  </div>
                    @endforeach
                @endforeach
              </div>
            </div>
            <div class="d-flex justify-content-center bg-color-none"> 
            </div>
        </div>
      </div>
    </div>
@endsection