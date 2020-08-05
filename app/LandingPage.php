<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    // artikel kiri kanan program kursus disebut dengan property
    // jangan lupa kita ubah visibility nya menjadi public 
    // supaya bisa diakses pada class yang lain
    
    public $artikel_kanan = "Inovasi dibidang Teknologi Informasi yang melaju demikian cepat dan seakan tak terbendung mengharuskan semua kalangan untuk dapat mengikuti bahkan menguasainya agar tetap dapat eksis dalam persaingan di dunia nyata maupun di dunia ‘maya’ (teknologi informasi), ditambahlagi dengan bergulirnya kesepakatan kawasan perdagangan bebas ASEAN dan Cina. Lembaga Pendidikan Alfabank Jogjakarta";
    public $artikel_kiri = "Lembaga Pendidikan Alfabank JogjakartaLembaga Pendidikkan ALFABANK merupakan lembaga yang sudah sangat berpengalaman dalam penyelenggaraan pendidikan dan pelatihan yang diperuntukan bagi pelajar, mahasiswa, mayarakat umum, pekerja dan karyawan di instansi pemerintah ataupun swasta, bahkan sampai pada tingkat pejabat Eselon-pun pernah mengikuti pendidikan dan pelatihan di ALFABANK Jogjakarta";
    
    // array biasa diakses index , index dimulai dari 0
    public $program_kursus = ["WDP","Administrasi","Akuntansi","Office"];
        
    public $daftar = ["paket profesi", "paket reguler ", "paket private"];

    // array asosiatif
    public $program_kursus_assosiatif = [
        "WDP" => "Web Design Programing",
        "ADM" => "administrasi",
        "ACT" => "Akuntansi"
    ];
}
