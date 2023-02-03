@extends('layout.adminlayout')
@section('add')
<div class="my-5"><a href="/dashboard/berita/create" class="btn btn-primary">Tambah Data</a></div>
@endsection
@section('content')
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
{{ session ('success')}}
</div>
@endif

          <table class="table table-bordered border-dark">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">judul</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
            <tbody class="table-group-divider ">
                @foreach ($berita as $item)
                <tr>
                                <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                <td class="text-center"><img src="{{asset('storage/berita/'.$item->thumbnailImg)}}" alt=""></td>
                                <td class="text-center">{{$item->judulBerita}}</td>
                                <td class="text-center">
                                    <a href="/dashboard/berita/{{$item->slug}}/edit" class="btn btn-primary" role="button">Update</a>
                                    <form action="/dashboard/berita/{{$item->slug}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('apakah anda yakin')"><span>Delete</span></button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
            </tbody>
        </table>

@endsection