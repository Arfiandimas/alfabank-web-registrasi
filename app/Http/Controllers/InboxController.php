<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inbox;

class InboxController extends Controller
{
    public function deleteInbox($id){
        Inbox::destroy($id);
        return redirect()->back();
    }
    public function showInbox(){
        // 2. instansiasi class Inbox
        $inbox = new Inbox;
        
        // 3. lakukan query 
        $all_inbox = $inbox->where('status','belum_dibaca')->orderBy('created_at','desc')->get();
        $jumlah_all_inbox = $all_inbox->count();
        
        return view('admin/inbox',compact('all_inbox','jumlah_all_inbox'));
    }

    
    public function showInboxSudahDibaca(){
        $inbox = new Inbox;
        
        // 3. lakukan query 
        $all_inbox = $inbox->where('status','sudah_dibaca')->orderBy('created_at','desc')->get();
        $jumlah_all_inbox = $all_inbox->count();
        
        // return view('admin/inbox',compact('all_inbox','jumlah_all_inbox'));
        return view('admin/inbox_sudah_dibaca',compact('all_inbox','jumlah_all_inbox'));
    }


    public function ubahStatusInbox($id){
        // find digunakan untuk menemukan data berdasarkan id, 
        // secara default akan menemukan data dalam database dengan attribut id (primary key)
        $inbox = Inbox::find($id);
        $inbox->status = "sudah_dibaca";

        // fungsi save digunakan untuk menyimpan perubahan yang sudah dilakukan
        $inbox->save();
        
        return redirect()->back();
    }

    
    public function createInbox(Request $request){
        
        Inbox::create([
            'nama'=>$request->nama,
            'email'=>$request->email,
        ]);
    }



}
