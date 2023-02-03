@extends('layout.adminlayout')
@section('add')
<div class="my-5"><a href="/dashboard/gallery/create" class="btn btn-primary">Tambah Data</a></div>
<div class="my-5"><a href="/dashboard/gallery/year/create" class="btn btn-primary">Tambah Data Tahun</a></div>



@endsection
@section('content')
@section('content')
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session ('success')}}
</div>
    @endif
    {{-- <h1 class="text-center">{{$images->nama_event}}</h1> --}}
         <table class="table table-bordered border-dark">
        <thead>
            <tr>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">Nama Kegiatan</th>
                <th class="text-center" scope="col">Foto</th>
                <th class="text-center" scope="col">Edit</th>
            </tr>
        </thead>
            <tbody class="table-group-divider ">
                        
                @foreach ($images as $item)
                    @foreach ($item->gallery as $image)
                <tr>
                                <td scope="row" class="text-center">{{$loop->iteration}}</td>
                                <td scope="row" class="text-center">{{$item->nama_event}}</td>
                                <td class="text-center"><img src="{{asset('/storage/foto_gallery/'.$image->image)}}" alt="" style="max-width: 340px;"/></td>
                                <td class="text-center mt-5">
                                    <form action="/dashboard/gallery/images/{{$image->image}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('apakah anda yakin')"><span>Delete</span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach

            </tbody>
        </table>
@endsection