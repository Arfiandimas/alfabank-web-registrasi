<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramKursusController extends Controller
{
    public function showProgramKursus(){
        
        $program_kursus = DB::table('program_kursus')->get();
        return view('admin/program_kursus',compact('program_kursus'));
    }

    // cara 1 menginisialisasi kelas pada parameter 
    // cara ini disebut dengan dependency injection
    public function createProgramKursus(Request $request){
        $request->validate([
            'nama' => 'required|string|max:20',
            'masa_studi' => 'required|string|max:11',
            'harga' => 'required|integer|max:11',
            'kuota' => 'required|string|max:11'
        ]);

        // Request digunakan untuk menangani data yang masuk
        // cara 2 membuat inisialisasi class seperti biasanya
        // $request = new Request;
        // dd($request);

        // CARA 1
        DB::table('program_kursus')->insert([
            'nama'=>$request->nama,
            'masa_studi'=>$request->masa_studi,
            'harga'=>$request->harga,
            'kuota'=>$request->kuota
        ]);

        return redirect()->back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
