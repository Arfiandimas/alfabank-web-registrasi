<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function pengaturan()
    {
        return view('user.pengaturan');
    }
    public function logout(Request $request)
    {
        // cara menghapus session
        $request->session()->forget('user_email');

        // arahkan ke landing page
        return redirect()->to('/');
    }
    public function dashboard(Request $request)
    {
        // Auth::user digunakan untuk mendapatkan informasi user yang 
        // sedang login
        // Auth::user merupakan class bawaan dari laravel 
        // yang berguna untuk menangani authentikasi

        // CARA 1
        // menyimpan informasi user yang sedang login pada variabel
        // lalu dikirimkan ke view kita

        // note : (fungsi yang sering dipake)
        // Auth::check()   | digunakan untuk mengecek apakah user sedang login atau tidak 
        // Auth::logout()  | digunakan untuk melakukan logout 
        // Auth::id()      | digunakan untuk menampilkan id
        
        $user_info = Auth::user();
        
        return view('user.dashboard',compact('user_info'));


        // CARA 2 BERADA PADA VIEW
    }

    public function login(Request $request)
    {
        // dd($request->all());
        // TAHAP 1 : pengecekan kredensial 
        // kredensial adalah email dan password

        // cara lama pake query builder raw query sql
        $pengecekan = DB::select("SELECT * 
        FROM users 
        WHERE email = '$request->email' 
        AND 
        password = '$request->password'");

        // cara agak baru query builder
        $query_builder = DB::table('users')
            ->where('email', '=', $request->email)
            ->where('password', '=', $request->password)
            ->first();

        // ____________________________________________
        // CARA LOGIN KETIKA PASSWORD TIDAK TERENKRIPSI
        // ____________________________________________
        // cara terbaru
        // $pengecekan_eloquent = User::where('email', '=', $request->email)
        //     ->where('password', '=', $request->password)
        //     ->first();


        // if ($pengecekan_eloquent) {
        //     // TAHAP 2
        //     // MENYIMPAN INFORMASI USER YANG SEDANG LOGIN DALAM SESSION
        //     // menyimpan informasi email user kedalam session
        //     session(['user_email' => $pengecekan_eloquent->email]);

        //     // menyimpan informasi email pada cookie
        //     $user_cookie = cookie('user_email', $pengecekan_eloquent->email, 120);

        //     // ini akan mengarahkan ke view dashboard tanpa mengganti routing
        //     // return response()->view('user.dashboard')->withCookie($user_cookie);

        //     // mengarahkan ke routing dan juga mengganti view
        //     return redirect()->to('dashboard-user')->withCookie($user_cookie);
        // } else {
        //     return 'maaf gagal';
        // }

        /*
        _____________________________________
        cara login dengan password terenkripsi
        ini adalah versi terbaru yang lebih aman
        _____________________________________

        */
        // 1. mendapatkan data berdasarkan email yang diinputkan
        $dataUser = User::where('email', '=', $request->email)->first();

        // 2. ambil password 
        // dd($dataUser->password);

        // 3. kita cek dengan Hash::check
        // Hash::check digunakan buat mengecek password yang kita inputkan
        // dengan password terenkripsi yang tersimpan dalam tabel user
        // return / kembalian dari fungsi ini adalah true dan false
        // menghasilkan true apabila passwordnya cocok
        // menghasilkan false apabila passwordnya tidak cocok
        $checkPassword = Hash::check($request->password, $dataUser->password);

        // 4. lakukan set cookie dan session
        // if ($checkPassword) {

        //     session(['user_email' => $dataUser->email]);
        //     $user_cookie = cookie('user_email', $dataUser->email, 120);
        //     return redirect()->to('dashboard-user')->withCookie($user_cookie);
        // } else {
        //     return redirect()->back();
        // }

        /*
        ________________________
        BAWAAN AUTH DARI LARAVEL
        ________________________

        */
        $email = $request->email;
        $password = $request->password;

        $userLogin = Auth::attempt([
            'email' => $email,
            'password' => $password
        ]);
        if ($userLogin) {
            session(['user_email' => $dataUser->email]);
            $user_cookie = cookie('user_email', $dataUser->email, 120);
            return redirect()->to('dashboard-user')->withCookie($user_cookie);
        } else {
            return redirect()->back();
        }
    }

    public function register(User $user, Request $request)
    {
        // menginsert pada dua tabel user dan pendaftaran// bcrypt adalah fungsi global 
        // yang digunakan untuk mengenkripsi data

        // $user = User::insert(
        //     [
        //         'nama' => $request->nama,
        //         'email' => $request->email,
        //         'telepon' => $request->telepon,
        //         'alamat' => $request->alamat,
        //         'gender' => $request->gender,
        //         'agama' => $request->agama,
        //         'tanggal_lahir' => $request->tanggal_lahir,
        //         'password' => bcrypt($request->password)
        //     ]
        // );
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->telepon = $request->telepon;
        $user->alamat = $request->alamat;
        $user->gender = $request->gender;
        $user->agama = $request->agama;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->password = bcrypt($request->password);
        $user->save();

        Pendaftaran::insert([
            'id_user' => $user->id,
            'id_program_kursus' => $request->program_kursus
        ]);

        return redirect()->to('login');
    }

    public function setting(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        // ]);

        // Kita simpan image yang dikirim dari form ke variabel $image
        $image = $request->file('image');
        // Rename file diganti dengan waktu saat image diupload, 
        // $image->getClientOriginalExtension() -> mengambil exstensi file dan digabungkan dengan nama file yang sudah direname.

        $image_name = time() . '.' .$image->getClientOriginalExtension();
        // membuat folder untuk penyimpanan file image kita
        $folder_penyimpanan = storage_path('app/public/image');
        // menyimpan image yang dikirim dari form ke folder yang sudah didefinisikan
        $image->move($folder_penyimpanan, $image_name);
        // mendapatkan informasi id user yang sedang login
        $id = Auth::id();
        // mendapatkan data berdasarkan id yang sedang login
        $user = User::find($id);
        // update attribut image 
        $user->image =  $image_name;
        // save
        $user->save();
        return redirect()->back();

    }
}
