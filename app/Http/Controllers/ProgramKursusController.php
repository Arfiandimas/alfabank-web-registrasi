<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ProgramKursus;

class ProgramKursusController extends Controller
{
    public function showProgramKursus(){
        
        // $program_kursus = DB::table('program_kursuses')->get();
        $program_kursus = ProgramKursus::get();
        return view('admin/program_kursus',compact('program_kursus'));
    }

    // cara 1 menginisialisasi kelas pada parameter 
    // cara ini disebut dengan dependency injection
    public function createProgramKursus(Request $request){
        $request->validate([
            'nama' => 'required|string|max:20',
            'masa_studi' => 'required|string|max:11',
            'harga' => 'required|integer|max:10',
            'kuota' => 'required|string|max:11'
        ]);

        // Request digunakan untuk menangani data yang masuk
        // cara 2 membuat inisialisasi class seperti biasanya
        // $request = new Request;
        // dd($request);

        // CARA 1
        DB::table('program_kursuses')->insert([
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
        $programkursus = ProgramKursus::find($id);

        return view('admin/edit_program_kursus', compact('programkursus'));
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
        $request->validate([
            'nama' => 'string|max:20',
            'masa_studi' => 'string|max:11',
            'harga' => 'integer|max:10',
            'quota' => 'string|max:11'
        ]);

        $programkursus = ProgramKursus::find($id);
        
        $programkursus->nama = $request->name?$request->name : $programkursus->nama;
        $programkursus->masa_studi = $request->study_period?$request->study_period : $programkursus->masa_studi;
        $programkursus->harga = $request->price?$request->price : $programkursus->harga;
        $programkursus->kuota = $request->quota?$request->quota : $programkursus->kuota;

        $programkursus->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programkursus = ProgramKursus::find($id);
        
        $programkursus->delete();

        return redirect()->back();
    }
}
