<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Response;
use Illuminate\Http\Request;

class SessionCookieController extends Controller
{
    public function index(Request $request)
    {
        // membuat session 
        // session terdiri dari key dan value 

        // cara 1 | menggunakan global helper

        // digunakan untuk memberikan default value
        // TODO: cari tau kenapa ini gak bisa default value
        session('username', 'xyz');

        // membuat session 

        session(['username' => 'ajisyahroni14']);

        // menampilkan nilai session
        $nilai = session('username');

        // untuk menampilkan semua data session
        $all_session = session()->all();
        // dd($all_session);


        // COOKIE

        // membuat cookie
        $minutes = 1;
        $cookie_saya  = cookie('username','ajisyahroni',$minutes);
        // $response = new Response('Hello World');
        return response('hello')->withCookie($cookie_saya);
    }
}
