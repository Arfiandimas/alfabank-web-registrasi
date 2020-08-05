<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    public function programKursus()
    {
        return $this->belongsTo(ProgramKursus::class, 'id_program_kursus');
    }
    
    public function users(){
        return $this->belongsTo(User::class,'id_user');
    }
}
