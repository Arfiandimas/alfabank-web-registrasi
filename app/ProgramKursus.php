<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramKursus extends Model
{
    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'id_program_kursus', 'id');
    }
    // MANY TO MANY CARA CEPAT
    public function users()
    {
        return $this->belongsToMany(
            'App\User',
            'pendaftarans',
            'id_user',
            'id_program_kursus'
        );
    }
}
