<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'id_user');        
    }
    // 1 blog : 1 user
    // satu blog hanya dimiliki oleh satu user
    // public function user()
    // {
    //     // parameter 1 berelasi dengan apa 
    //     // parameter 2 nama foreign key pada tabel blog
    //     // parameter 3 nama primary key pada tabel user
    //     return $this->belongsTo('App\User', 'id_user', 'id');
    // }
}
