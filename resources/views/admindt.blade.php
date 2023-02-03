@extends('layout.adminlayout')
@section('add')
<div class="my-5"><a href="/dashboard/DewanTonti/create" class="btn btn-primary">Tambah Data</a></div>
@endsection
@section('content')
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session ('success')}}
</div>
    @endif
            <table class="table table-bordered border-dark">
        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Nama</th>
                <th scope="col">jabatan</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
            <tbody class="table-group-divider ">
                @foreach ($dewantonti as $item)
                <tr>
                                <td scope="row" class="text-center">{{$loop->iteration}}</td>
                                @if ($item->foto !='')
                                <td class="text-center"><img src="{{asset('storage/foto_dewantonti/'.$item->foto)}}" alt=""></td>
                                @else
                                <td class="text-center"><img src="{{asset('resources/img/default-profile-d.png')}}" alt=""></td>
                                @endif
                                <td class="text-center">{{$item->nama}}</td>
                                <td class="text-center" >{{$item->jabatan}}</td>
                                <td class="text-center">
                                    <a href="/dashboard/DewanTonti/{{$item->nama}}/edit" class="btn btn-primary" role="button">Update</a>
                                    <form action="/dashboard/DewanTonti/{{$item->nama}}" method="post">
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