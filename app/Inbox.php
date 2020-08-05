<?php

namespace App;
// secara default model laravel langsung mengimport class Eloquent model
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Inbox extends Model
{
    use SoftDeletes;
    
    // fungsi dari protected table digunakan untuk mengkaitkan nama table di database kita 
    // dengan model yang kita buat
    // SINGULAR (tunggal)
    // - pen 
    // - inbox
    // - status
    // PLURAL (jamak)
    // - pens
    // - inboxes
    // - statuses

    // nama objek harus tunggal (Inbox)
    // nama tabel harus jamak (inboxes)

    // gunakan ini jika nama tabel tidak jamak
    // protected $table = "inbox";

    // gunakan kode jika nama primary key bukan id
    // protected $primaryKey = "id_inbox";

    // gunakan ini jika kalian tidak membuat kolom created_at & updated_at
    // public $timestamps = false

    // gunakan ini jika ingin memproteksi kolom tertentu agar tidak bisa diubah 
    protected $guarded = ['status'];

    // gunakan ini untuk mendefinisikan kolom apa saja yang boleh diisi
    // protected $fillable = ['nama','email','subjek','pesan','status'];

    

}
