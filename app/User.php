<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $ini_variabel = "saldfjkladsf";
    public function FunctionName()
    {
        # code...
    }


    // satu user bisa menulis banyak blog
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'id_user');
    }

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'id_user');
    }









    // satu user bisa menulis banyak blog
    // 1 user : n blogs
    public function barjono()
    {
        // =================================
        // hasMany membuat relasi one to many
        // jadi satu user bisa punya banyak blog
        // ================================

        // parameter 1 berelasi dengan model apa 
        // parameter 2 nama foreign key blog
        // parameter 3 nama primary key pada tabel user
        return $this->hasMany('App\Blog', 'id_user', 'id');
    }

    // MANY TO MANY CARA CEPAT
    public function programKursuses()
    {
        return $this->belongsToMany(
            'App\ProgramKursus',
            'pendaftarans',
            'id_user',
            'id_program_kursus'
        )
            ->as('pendaftaran')
            ->withPivot('status');
        // ->as('pendaftaran') digunakan untuk memberikan
        // nama alias pada pivot table
        // pivot table nama defaultnya adalah pivot

        // withPivot('status') digunakan untuk menampilkan 
        // atttribut yang ada pada tabel pivot
        // yang ingin ditampilkan disini adalah attribut 
        // status
    }
}
