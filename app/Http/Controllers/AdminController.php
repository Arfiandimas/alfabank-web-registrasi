<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 1. import model Inbox
use App\Inbox;
use App\Pendaftaran;
use App\ProgramKursus;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function cari(Request $request)
    {
        // cara lama fitur pencarian 
        // menggunakan query like
        // KELEMAHAN | performa berat karena melakukan pengecekan secara manual

        // 1. tangkap keyword dari request
        $keyword = $request->keyword;

        // 2. lakukan query dengan cara merelasikan 3 tabel
        // pendaftaran , program kursus dan user

        // 
        $user_data = Pendaftaran::with(['programKursus', 'users'])
            ->whereHas('users', function ($query) use ($keyword) {
                // 2.1 menggunakan whereHas untuk melakukan query
                // dengan where sekaligus relasinya yaitu user

                // use ($keyword) digunakan karena disini menggunakan closure 
                // atau fungsi di dalam fungsi, use digunakan untuk mengambil variabel pada 
                // ruang lingkup global
                $query->where('nama', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%");
            })
            ->paginate(5);
        return view('admin/dashboard', compact('user_data'));
    }
    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->to('/');
    }
    public function adminLogin(Request $request)
    {
        $login = Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($login) {
            return redirect()->to('admin-dashboard');
        } else {
            return redirect()->back();
        }
    }
    public function dashboard()
    {
        // cara cepat untuk mengakses yang dari many to many
        // $cara_cepet = User::with('programKursuses')->get();

        // cara biasa
        // $cek = Auth::guard('admin')->check();
        // if ($cek) {

        //     $user_data = Pendaftaran::with(['users', 'programKursus'])->paginate(5);
        //     return view('admin/dashboard', compact('user_data'));

        // } else {
        //     return redirect()->to('/');
        // }

        $user_data = Pendaftaran::with(['users', 'programKursus'])->paginate(5);
        return view('admin/dashboard', compact('user_data'));
    }

    public function detail($id)
    {
        // find digunakan untuk mencari data berdasarkan primary key 
        // kalau menggunakan where lebih fleksibel, 
        // bisa untuk mencari primary key dan juga attribut lain 

        // first()
        // digunakan untuk mengambil data pertama paling atas 


        // konsep seperti ini disebut juga dengan eager loading
        // dimana relasi ditulis saat query 

        $data = Pendaftaran::with(['users', 'programKursus'])->find($id);
        return view('admin/detail', compact('data'));
    }


    public function showSertifikasi()
    {
        $user_tersertifikasi = Pendaftaran::with(['users', 'programKursus'])->where('status', '=', 'masa_studi')->paginate(5);
        
        return view('admin/sertifikasi', compact('user_tersertifikasi'));
    }
}
