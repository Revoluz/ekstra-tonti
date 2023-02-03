@extends('layout.adminlayout')

@section('link')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endsection

@section('content')
<h1 class="text-center">FORM UPDATE ANGGOTA</h1>
<div class="mt-5">
    <form  method="POST" enctype="multipart/form-data" action="/dashboard/anggota/postanggota/{{$anggota->name}}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{old('name', $anggota->name)}}">
                    @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
                <label for="image" class="form-label">Foto</label>
            <div class="input-group">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="tahun_id" class="form-label">Tahun anggota</label>
            <select class="form-select" aria-label="Default select example" id="tahun_id" name="tahun_id" required value="{{old('tahun_id', $anggota->tahun_id)}}">
                @foreach ($tahun_id as $item)
                    <option value="{{$item->id}}">{{$item->masaAktifAnggota}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
    
</div>


@endsection


