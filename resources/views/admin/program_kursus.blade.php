@extends('admin.layouts.master')
@section('content')
<div class="row mt-3">
            <div class="col-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                
                @error('harga')
                    <div class="text-danger">Harga harus diisi dongs</div>
                @enderror
                <h3>Tambah</h3>
                <form action="/admin-program-kursus/create" method="POST">
                    @csrf   
                    <div class="form-group">
                        <input type="text" name="nama" placeholder="nama program kursus" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="study-period">Masa studi</label>
                        <select class="form-control" id="study-period" name="masa_studi">
                            <option value="1">1 bulan</option>
                            <option value="2">2 bulan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="number" name="harga" placeholder="harga" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="number" name="kuota" placeholder="kuota siswa" id="" class="form-control">
                    </div>

                    <input type="submit" value="tambah" class="btn btn-block btn-danger">
                </form>
            </div>
            <div class="col">
                <h3>Daftar program kursus</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Waktu studi</th>
                            <th>Harga</th>
                            <th>Kuota</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($program_kursus as $index => $item)
                        <tr>
                            <th>{{ $index = $index + 1}}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->masa_studi}} bulan</td>
                            <td>{{$item->harga}} .000.000</td>
                            <td>{{ $item->kuota }} siswa</td>
                            <td>
                                <a href="admin-program-kursus-update.html" class="btn btn-sm btn-info">ubah</a>
                                <a href="#" class="btn btn-sm btn-danger">hapus</a>
                            </td>
                        </tr>    
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
@endsection