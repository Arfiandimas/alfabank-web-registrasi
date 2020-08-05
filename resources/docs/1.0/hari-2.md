# Hari Kedua

---

- [Controller](#section-1)
- [Model](#section-2)
- [MVC](#section-3)


<a name="section-1"></a>
## Controller

Controller digunakan untuk menjembatani view (tampilan) dengan sekumpulan data (model)
controller berisi sebuah proses, bisa jadi berisi proses bisnis logic

cara membuatnya menggunakan bantuan artisan 
php artisan make:controller NamaControllernya

lokasi controller dimana 
app / http / controllers

cara mengarahkan dari routing 
Route::get('/', 'NamaController@method');

<a name="section-2"></a>
## Model

Model digunakan untuk menangani sebuah data, bisa jadi data dari database

cara membuat model menggunakan bantuan artisan 
php artisan make:model Nama

lokasi dari model 
app / 

cara menghubungkan Model dengan controller 
1. pastikan anda sudah membuat model 
2. import model yang sudah dibuat kedalam controller 
    - use App\NamaModel

3. di instansiasi atau dengan kata lain kita buat object dari class model tersebut
    - cara instansiasinya menggunakan keyword new NamaModel
4. akses data yang diperlukan menggunakan accesor ->


<a name="section-3"></a>
## MVC 

Model View Controller adalah sebuah pola yang mempermudah manajemen kode 
model merepresentasikan sebuah data 
controller berisi sebuah proses yang menjembatani antara model dan view 
view berisi tampilan 


<a name="section-3"></a>
## CARA KONEKSI DENGAN DATABASE 

1. buatlah sebuah database pada phpmyadmin 
2. nama database alfabank_registrasi 
3. buatlah satu buah tabel bernama program_kursus, attributnya nama, harga, masa_studi, kuota
4. lakukan edit konfigurasi pada .env file 
5. ubah DB_DATABASE=laravel menjadi DB_DATABASE = alfabank_registrasi 
6. masuk ke method index() kedalam LandingPageController
7. lakukan query pada database dengan menggunakan bantuan class DB
8. gunakan \DB untuk keluar dari namespcae controller 
9. cara pertama bisa menggunakan sql query biasa \DB::select('select nama from program_kursus');
10. cara kedua menggunakan yang namanya query builder \DB::table('program_kursus')->get('nama');
11. output keluaran dari query adalah collection mirip dengan array didalam array 
12. untuk menampilkannya menggunakan `@ foreach`   