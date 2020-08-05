<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
// mengimport class model yang sudah kita buat
use App\LandingPage;
use App\ProgramKursus;
use App\User;

class LandingPageController extends Controller
{
    // visibility dari fungsi
    // - public     : fungsi bisa dieksekusi oleh semua
    // - protected  : fungsi hanya bisa dieksekusi oleh kelas turunan 
    // - private    : fungsi hanya bisa dieksekusi oleh dirinya sendiri
    
    public function index(){
        // $x = Blog::with('user')->get();
        // dd($x);
        // return response()->json($x);
        // ini disebut instansiasi atau pembuatan object berdasarkan class (desain) yang sudah kita buat
        // menggunakan keyword new
        $landing_page = new LandingPage;


        // var dump digunakan mengecek isi dari sebuah variabel
        // var_dump($landing_page);
        // dd = die and dump digunakan untuk mengecek isi dari sebuah variabel, fungsi, ataupun class
        // dd merupakan fungsi bawaan dari si laravel

        // Cara mengakses property dari class menggunakan accessor ->
        // dd($landing_page->artikel_kanan);
        
        // CARA 1
        // return view('index',
        // [
        //     'artikel_kiri'=>$landing_page->artikel_kiri,
        //     'artikel_kanan'=> $landing_page->artikel_kanan,
        //     'berdiri_sejak' => '2020',
        //     'program_kursus' => $landing_page->program_kursus
        // ]);

        // CARA 2 
        // menggunakan fungsi bawaan php yaitu compact 
        // compact digunakan untuk membungkus sekumpulan variabel dalam sebuah array 
        // sehingga lebih praktis dalam penulisan

        $artikel_kiri = $landing_page->artikel_kiri;
        $artikel_kanan = $landing_page->artikel_kanan;
        $berdiri_sejak = 2020;
        $program_kursus = $landing_page->program_kursus;

        // CARA 1 : menampilkan data dari database 
        // menggunakan sql query 
        // dalam laravel menggunakan bantuan class DB untuk melakukan query
        // menggunakan \DB untuk keluar dari namespace controller 
        // $data_program_kursus = \DB::select('SELECT * FROM program_kursus');

        // CARA 2 : menggunakan bantuan query builder
        // untuk mempermudah penulisan query pada tabel dalam database
        
        // ketika kita merubah file .env maka kita harus merestart php artisan serve nya
        // supaya configurasi pada .env dijalankan ulang

        $data_program_kursus = \DB::table('program_kursuses')->get('nama');
        // dd($data_program_kursus);
        return view('index',compact('artikel_kiri',
                                    'artikel_kanan',
                                    'berdiri_sejak',
                                    'program_kursus',
                                    'data_program_kursus'));
    }

    public function showRegister(){
        // mengambil data program kursus dan menampilkannya di register
        $program_kursuses = ProgramKursus::get();
        return view('register',compact('program_kursuses'));
    }

    
}
