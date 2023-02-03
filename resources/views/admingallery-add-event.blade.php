@extends('layout.formlayout')

@section('link')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endsection

@section('content')
<h1 class="text-center">FORM INPUT KEGIATAN GALLERY</h1>
<div class="mt-5">
    <form action="/dashboard/gallery/Event/" method="POST" >
        @csrf
        <div class="mb-3">
            <label for="nama_event">Tambah Event</label>
            <input type="text" class="form-control  @error('nama_event') is-invalid @enderror" id="nama_event" name="nama_event" required>
                @error('nama_event')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug">slug</label>
            <input type="text" class="form-control  @error('slug') is-invalid @enderror" id="slug" name="slug" required readonly>
        </div>
                @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
                @enderror
            </div>
        <div class="mb-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
    {{-- fetch api --}}
<script>
    const nama_event = document.querySelector("#nama_event")
    const slug = document.querySelector("#slug")

      nama_event.addEventListener("keyup", function() {
        fetch('/dashboard/gallery/Event/checkSlug?nama_event=' + nama_event.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
</div>
@endsection


