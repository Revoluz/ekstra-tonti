@extends('layout.adminlayout')

@section('link')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endsection

@section('content')
<h1 class="text-center">FORM INPUT GALLERY</h1>
<div class="mt-5">
    <form action="/dashboard/gallery/thumbnail/{{$gallery->slug}}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
         <div class="mb-3">
            <label for="nama_event">Tambah Event</label>
            <input type="text" class="form-control  @error('nama_event') is-invalid @enderror" id="nama_event" name="nama_event" value="{{old('nama_event',$gallery->nama_event)}}"  required>
                @error('nama_event')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug">slug</label>
            <input type="text" class="form-control  @error('slug') is-invalid @enderror" id="slug" name="slug" required readonly value="{{old('slug',$gallery->slug)}}">
                @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
                <div class="mb-3">
                <label for="gambar" class="form-label">Thumbnail Foto</label>
                <div class="input-group">
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" >
            @error('gambar')
        <div class="invalid-feedback">
            {{ $message }}
            @enderror
        </div>
          
        </div>
        <div class="mb-3">
                <label for="image" class="form-label">Foto</label>
            <div class="input-group">
                <input type="file" class="form-control @error('image[]') is-invalid @enderror" id="image" name="image[]"  multiple>
                        @error('image[]')
        <div class="invalid-feedback">
            {{ $message }}
            @enderror
        </div>
        </div>
                <div class="mb-3">
            <label for="tahun_id" class="form-label">Tahun</label>
            <select class="form-select" aria-label="Default select example" id="tahun_id" name="tahun_id" required value="{{old('tahun_id',$gallery->tahun_id)}}">
                {{-- <option selected>Open this select menu</option> --}}
                @foreach ($tahun_id as $item)
                @if(old('tahun_id',$gallery->tahun_id)==$item->id)
                <option value="{{$item->id}}" selected>{{$item->tahun}}</option>
                @else
                <option value="{{$item->id}}" >{{$item->tahun}}</option>
                @endif
                @endforeach
            </select>
        </div>
            <div class="mb-3">
            <label for="tanggal" class="col-form-label">Date</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{old('tanggal',$gallery->tanggal)}}">
            @error('tanggal')
        <div class="invalid-feedback">
            {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
    
</div>

<script>
    const nama_event = document.querySelector('#nama_event');
    const slug = document.querySelector('#slug');

      nama_event.addEventListener('change', function() {
        fetch('/dashboard/gallery/checkSlug?nama_event=' + nama_event.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endsection


