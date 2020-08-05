 @extends('layouts.master')
 @section('title','register')
@section('konten')
 <!-- ======= register Section ======= -->
 <section id="register" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Register Form</h2>
                <h3>let's fill this<span>form</span></h3>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12 mt-5 mt-lg-0">

                    <form action="/register" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="nama" class="form-control" id="name" placeholder="Masukkan nama lengkap" />
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Email" />
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" name="telepon" id="phone"
                                placeholder="gunakan format 62" />
                        </div>

                        <div class="form-group">
                            <input type="date" class="form-control" name="tanggal_lahir" id="subject"
                                placeholder="Tanggal lahir" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="alamat" rows="5"
                                placeholder="Alamat lengkap"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="religion">Gender</label>
                            <select class="form-control" id="religion" name="gender">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="religion">Agama</label>
                            <select class="form-control" id="religion" name="agama">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>

                        {{-- menampilkan data program kursus --}}
                        <select name="program_kursus" id="">
                            @foreach ($program_kursuses as $pk)
                                <option value="{{$pk->id}}">{{$pk->nama}}</option>
                            @endforeach
                        </select>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input placeholder="Password" type="password" name="password" id="" class="form-control">
                        </div>


                        <div class="text-center">
                            <a class="mb-4" href="/login">sudah mendaftar, login disini</a>
                            <br>
                            <button class="custom-button mt-2" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
    </section>
    @endsection