@extends('layout.adminlayout')

@section('link')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endsection

@section('content')
<h1 class="text-center">FORM INPUT TAHUN GALLERY</h1>
<div class="mt-5">
    <form action="/dashboard/gallery/year" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="tahun" class="col-form-label">Date</label>
            <div class="input-group date" id="datepicker">
                <input type="text" class="form-control" id="tahun" name="tahun"/>
                <span class="input-group-append">
                    <span class="input-group-text bg-white d-block">
                        <i class="fa fa-calendar"></i>
                    </span>
                </span>
            </div>
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


