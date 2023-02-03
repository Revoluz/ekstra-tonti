@extends('layout.adminlayout')

@section('link')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none
        }
        </style>
@endsection

@section('content')
<h1 class="text-center">FORM EDIT BERITA</h1>
<div class="mt-5">
    <form  method="POST" enctype="multipart/form-data" action="/dashboard/berita/{{$berita->slug}}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="judulBerita">Judul berita</label>
            <input type="text" class="form-control @error('judulBerita') is-invalid @enderror" id="judulBerita" name="judulBerita" value="{{old('judulBerita',$berita->judulBerita)}}" >
            @error('judulBerita')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
          <div class="mb-3">
            <label for="slug">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror"  id="slug" name="slug"   required value="{{old('slug',$berita->slug)}}" >
                        @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="thumbnailImg" class="form-label">Thumbnail berita</label>
            {{-- <input type="hidden" name="oldImage" value="{{$berita->thumbnailImg}}"> --}}
            <div class="input-group">
                <input type="file" class="form-control @error('thumbnailImg') is-invalid @enderror" id="thumbnailImg" name="thumbnailImg" >
                @error('thumbnailImg')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            </div>
        </div>
        {{-- trix editor --}}
        <div class="mb-3">
            <label for="isiBerita" class="form-label">Text input area</label>
            @error('isiBerita')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <input id="isiBerita" type="hidden" name="isiBerita" required value="{{old('isiBerita',$berita->isiBerita)}}">
            <trix-editor input="isiBerita"></trix-editor>
        </div>
        <div class="mb-3">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </form>
    
</div>

<script >
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
    </script>
<script type="text/javascript" src="/js/trix.js"></script>
{{-- fetch api --}}
<script>
    const judulBerita = document.querySelector('#judulBerita')
    const slug = document.querySelector('#slug')

    judulBerita.addEventListener('change', function(){
        fetch('/dashboard/berita/checkSlug?judulBerita=' + judulBerita.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
        
    });
</script>
@endsection


