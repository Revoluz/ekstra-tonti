@extends('layout.adminlayout')
@section('add')
<div class="my-3"><a href="/dashboard/anggota/create" class="btn btn-primary">Tambah Data</a></div>
<div class="my-3"><a href="/dashboard/anggota/tahun/create" class="btn btn-primary">Tambah Data Tahun</a></div>
    
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
                <th scope="col">Tahun</th>
                <th scope="col">Edit</th>
            
            </tr>
        </thead>
            <tbody class="table-group-divider ">
                @foreach ($tahun_anggota as $item)
                <tr>
                                <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                <td class="text-center">{{$item->masaAktifAnggota}}</td>
                                <td class="text-center">
                                    <a href="/dashboard/anggota/postanggota/{{$item->slug}}" class="btn btn-primary" role="button">Detail</a>
                                                                        <form action="/dashboard/anggota/{{$item->slug}}" method="post">
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