@extends('layout.adminlayout')
@section('add')

@endsection

@section('content')
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session ('success')}}
</div>
    @endif
    {{-- <p>{{$anggota}}</p> --}}
                <table class="table table-bordered border-dark">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">nama</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
            <tbody class="table-group-divider ">
                @foreach ($anggota as $item)
                <tr>
                                <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                @if ($item->image !='')
                                <td class="text-center"><img src="{{asset('storage/foto_anggota/'.$item->image)}}" alt=""></td>
                                @else
                                <td class="text-center"><img src="{{asset('resources/img/default-profile-d.png')}}" alt=""></td>
                                @endif
                                <td class="text-center">{{$item->name}}</td>
                                <td class="text-center">
                                    <a href="/dashboard/anggota/postanggota/{{$item->name}}/edit" class="btn btn-primary" role="button">Update</a>
                                    <form action="/dashboard/anggota/postanggota/{{$item->name}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('apakah anda yakin')"><span>Delete</span></button>
                                    </form>                                </td>
                            </tr>
                    @endforeach
            </tbody>
        </table>
@endsection