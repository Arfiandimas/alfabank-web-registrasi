## Migration 

migration digunakan membuat tabel database melalui file migrasi laravel, sehingga kalau kita hendak membuat tabel baru kita tinggal memigrasikan file migrasi kita 

migration digunakan untuk mengontrol tabel-tabel database yang dibutuhkan aplikasi


untuk membuat file migrasi perintahnya adalah 
php artisan make:migration create_namatable_table


untuk menjalankan file migrasi perintahnya adalah 
php artisan migrate 


untuk rollback/mengembalikan ke batch terakhir sebelum dijalankan migrasi
php artisan migrate:rollback 

untuk menjalankan migrasi tapi semua migrasi dirollback dulu baru di migrate
php artisan migrate:refresh


untuk melihat status migrasi yang dijalankan
php artisan migrate:status




Ketika kita melakukan pengeditan pada file .env 
maka kita harus melakukan load ulang pada konfigurasi kita 
dengan cara cache konfigurasinya di clear terlebih dahulu 

php artisan config:clear 


untuk membuat cache pada konfigrasi yang baru 
syntaxnya adalah 

php artisan config:cache



## Factory 

factory digunakan untuk membuat fake model (fake data), 
factory digunakan untuk mendefinisikan attribute tabel yang hendak
kita isi dengan data palsu 

data palsu di generate / dibuatkan oleh Faker 

Faker memiliki koleksi data data palsu seperti nama, alamat, 
email, dan lain lain 

Faker bisa juga kita set locale(bahasa)nya
cara setting berada pada folder config file app.php

faker_locale => 'en_UK'

ganti nilai en_Uk dengan bahasa yang akan digunakan  
misal 'id_ID' untuk bahasa indonesia

command untuk membuat factory adalah 
php artisan make:factory NamaFactory

selanjutnya tambahkan attribut yang hendak diisi dengan faker
misal nama 
    - 'nama' => $faker->name();

untuk menjalankan factory bisa melalui tinker
php artisan tinker 

note: tinker adalah aplikasi terminal yang membantu programmer 
dalam melakukan pengetesan dan pengaksesan Class

untuk menjalankan factory melalui tinker jalankan 
factory('App\Inbox',10)->create()
keterangan 
    - 'App\Inbox' adalah nama class
    - 10 adalah jumlah berapa kali factory akan dijalankan 
    - create() adalah method untuk menjalankan factory


## seeder 
seeder bisa juga digunakan untuk membuat data dummy (data palsu) pada tabel, 
tapi secara luas seeder hanya digunakan untuk mendistribusikan data dummy ke tabel 
dan data dummy disediakan oleh factory 

syntax cara membuat seeder 
php artisan make:seeder NamaSeeder 

untuk menjalankan seeder secara keseluruhan 
`php artisan db:seed` 

untuk menjalankan seeder pada class tertentu 
`php artisan db:seed --class=NamaSeed`

sebelum menjalankan seeder pastikan sudah membuat factory dan juga sudah menuliskan syntax untuk mengeksekusi factory nya  

misal 
- UserFactory.php 
- UserSeeder.php
    factory('App\Inbox',10)->create();

untuk menjalankan seeder secara keseluruhan maka daftarkan seeder yang kamu buat pada DatabaseSeeder.php 
    $this->call(InboxSeeder::class);

tugas 3
1. buatlah factory dan seeder pada tabel users
    - buat factory 
    - isi factory , jangan lupa gunakan faker 
    - ekseusi factory pada seeder 
    