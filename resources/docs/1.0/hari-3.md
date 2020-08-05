# Hari ketiga 

---

- [query builder](#section-1)
- [alur implementasi fitur create program kursus](#section-2)

<a name="section-1"></a>
## query builder 

query builder adalah fitur laravel yang digunakan untuk mempermudah proses query di dalam database 

syntax untuk menggunakan query builder adalah sebagai berikut: 

jika kita didalam  controller kita harus menggunakan \DB agar keluar dari namespace controller 

daftar cheatsheet query builder 
- mendapatkan semua data pada tabel program kursus
    ` \DB::table('program_kursus')->get(); `

- mendapatkan semua data dengan attribute tertentu pada tabel program kursus 
    `\DB::table('program_kursus')->get('nama');`

- insert data pada tabel program kursus 
    `\DB::table('program_kursus')->insert(['nama'=>'isi nama', 'masa_studi'=>'isi', 'harga'=>'10','kuota'=>'10']);`


<a name="section-1"></a>
## alur implementasi fitur tambah program kursus dengan query builder

1. menyipakan form untuk input data program kursus 
2. action="/admin-program-kursus/create", maksud dari attribut ini adalah ketika form disubmit maka ditangani oleh route admin-program-kursus/create
3. method="POST" , menggunakan method post untuk mengirimkan data
4. jangan lupa setiap inputan kita kasih attribut name=" " , misal name="masa_studi" 

5. persiapkan controller dan juga methodnya, jadi 
    `Route::post('admin-program-kursus/create','AdminController@createProgramKursus')`


6. lakukan proses validasi agar data yang dimasukan dalam tabel database benar benar bersih , script bisa di cek pada AdminController 

7. setelah proses validasi langkah selanjutnya tinggal menambahkan data ke dalam tabel database 

8. langkah terakhir adalah return redirect()->back(); , agar kembali ke tampilan semula