@extends('admin.layouts.master')
@section('content')
<div class="mt-3 card p-3">


    <div class="row">
        <div class="col-4">
            <img width="300" height="300" src="assets/img/team/team-1.jpg" class="rounded" alt="">
        </div>

        <div class="col-8">
        <h1>{{ $data->users->nama }}</h1>
            <p>{{ $data->users->email }}</p>
            <h5 class="my-0">
                <span class="badge badge-pill badge-info">
                    {{ $data->programKursus->nama }}
                </span>
            </h5>
            <hr>

            <p>{{ $data->users->tanggal_lahir }}</p>
            <p>jalan kregan utama no 33</p>
            <p>laki-laki</p>
            <p>Islam</p>
            <hr>

            <div class="form-group">
                <label for="religion">Status</label>
                <select class="form-control" id="religion" name="religion">
                    <option value="belum_verifikasi">Belum diverifikasi</option>
                    <option value="masa_studi">Masa studi</option>
                </select>
            </div>

            <a href="#" class="btn btn-block btn-outline-info">Update status</a>
        </div>
    </div>
</div>
@endsection