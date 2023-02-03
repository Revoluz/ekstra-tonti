@extends('layout.adminlayout')

@section('link')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endsection

@section('content')
<h1 class="text-center">FORM INPUT TAHUN ANGGOTA</h1>
<div class="mt-5">
    <form action="/dashboard/anggota/tahun" method="POST" >
        @csrf
        <div class="mb-3">
            <label for="masaAktifAnggota" class="col-form-label">Date</label>
            <div class="input-group date" id="datepicker">
                <input type="text" class="form-control  @error('masaAktifAnggota') is-invalid @enderror" id="masaAktifAnggota" name="masaAktifAnggota" value="{{old('masaAktifAnggota')}}">
            @error('masaAktifAnggota')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
                
                
            </div>
        </div>
        <div class="mb-3">
            <label for="slug">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror"  id="slug" name="slug" readonly  required value="{{old('slug')}}" >
                        @error('slug')
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
        // $(function() {
        //     $('#datepicker').datepicker({
        //     format: "yyyy",
        //     viewMode: "years", 
        //     minViewMode: "years"
        //     });
        // });
    </script>
<script>
        const title = document.querySelector("#masaAktifAnggota");
        const slug = document.querySelector("#slug");

    title.addEventListener('keyup', function(){
        fetch('/dashboard/anggota/tahun/checkSlug?masaAktifAnggota=' + masaAktifAnggota.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
        // title.addEventListener("change", function() {
        //     let preslug = title.value;
        //     preslug = preslug.replace(/ /g,"-");
        //     slug.value = preslug.toLowerCase();
    });
</script>
@endsection


