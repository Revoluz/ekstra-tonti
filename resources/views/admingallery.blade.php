@extends('layout.adminlayout')
@section('add')
<div class="my-3"><a href="/dashboard/gallery/create" class="btn btn-primary">Tambah Data</a></div>
<div class="my-3"><a href="/dashboard/gallery/year/create" class="btn btn-primary">Tambah Data Tahun</a></div>



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
                <th class="text-center" scope="col">Tahun foto</th>
            </tr>
        </thead>
            <tbody class="table-group-divider ">
                @foreach ($tahun as $item)
                <tr>
                                <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                <td class="text-center">{{$item->tahun}}</td>
                                <td class="text-center">
                                    <a href="/dashboard/gallery/thumbnail/{{$item->tahun}}" class="btn btn-primary" role="button">Detail</a>
                                    <form action="/dashboard/gallery/{{$item->tahun}}" method="post">
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