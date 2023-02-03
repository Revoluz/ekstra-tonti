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
         <table class="table table-bordered border-dark">
        <thead>
            <tr>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">Nama Kegiatan</th>
                <th class="text-center" scope="col">Thumbnail</th>
                <th class="text-center" scope="col">Edit</th>
            </tr>
        </thead>
            <tbody class="table-group-divider ">
                @foreach ($tahun as $item)
                    @foreach ($item->event as $event)
                <tr>
                                <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                <td class="text-center">{{$event->nama_event}}</td>
                                <td class="text-center"><img src="{{asset('/storage/foto_thumbnailgly/'.$event->gambar)}}" alt="" /></td>
                                <td class="text-center mt-5">
                                    <a href="/dashboard/gallery/images/{{$event->slug}}" class="btn btn-primary" role="button">Detail</a>
                                    <a href="/dashboard/gallery/thumbnail/{{$event->slug}}/edit" class="btn btn-primary" role="button">Update</a>
                                    <form action="/dashboard/gallery/thumbnail/{{$event->slug}}" method="post">
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