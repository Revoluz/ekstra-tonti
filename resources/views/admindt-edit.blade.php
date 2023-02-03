@extends('layout.adminlayout')

@section('link')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endsection

@section('content')
<h1 class="text-center">FORM INPUT DEWAN TONTI</h1>
<div class="mt-5">
    <form action="/dashboard/DewanTonti/{{$dewantonti->nama}}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{old('nama',$dewantonti->nama )}}">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" required value="{{old('jabatan',$dewantonti->jabatan)}}" >
            @error('jabatan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

        </div>
        <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
            <div class="input-group">
                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" >
            </div>
                @error('foto')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

        </div>
        <div class="mb-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
    
</div>

   <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
            });
        });
    </script>
@endsection


