@extends('admin.layouts.master')
@section('content')

<div class="mt-3">
    <form action="/admin-cari" method="get">
        @csrf
        <div class="input-group mb-3">
            <input 
                type="text" 
                class="form-control" 
                placeholder="Cari" 
                name="keyword">

            <div class="input-group-append">
                <button 
                    class="btn btn-outline-secondary" 
                    type="submit">
                    cari
                </button>
            </div>
    </form>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Program</th>
            <th>Masa Studi</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user_data as $index => $data)
        <tr>
            <th>{{$user_data->firstItem() + $index }}</th>
            <td>{{ $data->users->nama }} </td>
            <td>{{ $data->users->email }}</td>
            <td>{{ $data->users->alamat }}</td>
            <td>{{ $data->programKursus->nama }}</td>
            <td>{{ $data->programKursus->masa_studi }}</td>

            <td>{{ $data->status }}</td>
            <td>
                <a href="admin-detail/{{ $data->id }}" class="btn btn-sm btn-info">detail</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

<div>
    {{$user_data->links()}}
</div>
</div>
@endsection