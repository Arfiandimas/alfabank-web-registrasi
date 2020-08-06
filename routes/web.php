<?php

use App\Http\Middleware\CheckSessionCookie;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route:: 
//  - method (get,post)
//  - path (/ , /register)
//  - callback function
Route::get('/', 'LandingPageController@index');

Route::get('/register', 'LandingPageController@showRegister');
Route::post('/register', 'UserController@register');

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', 'UserController@login');
Route::get('/dashboard-user', 'UserController@dashboard')->middleware(CheckSessionCookie::class);
Route::get('/logout', 'UserController@logout');

Route::get('/pengaturan', 'UserController@pengaturan')->middleware(CheckSessionCookie::class);
Route::post('/user/setting', 'UserController@setting')->name('usersetting')->middleware(CheckSessionCookie::class);

Route::get('/admin-dashboard', 'AdminController@dashboard');
Route::get('/admin-detail/{id}', 'AdminController@detail');

Route::get('/admin-inbox', 'AdminController@showInbox');
Route::get('/admin-sertifikasi', 'AdminController@showSertifikasi');
Route::get('/   ', 'ProgramKursusController@showProgramKursus');
// untuk menangani create program kursus
Route::post('/admin-program-kursus/create', 'ProgramKursusController@createProgramKursus');

// untuk menghapus program kursus
Route::delete('/admin-program-kursus/destroy/{id}', 'ProgramKursusController@destroy')->name('programkursus.destroy');

// untuk update program kursus
Route::get('/admin-program-kursus/edit/{id}', 'ProgramKursusController@edit')->name('programkursus.edit');

Route::put('/admin-program-kursus/update/{id}', 'ProgramKursusController@update')->name('programkursus.update');


Route::view('/admin-login', 'admin.login');
// name digunakan untuk memberi nama pada routing
// pemanggilan pada view menggunakan
//  fungsi route('nama-routing')
Route::post(
    '/admin-login-banget-final-insyaallah',
    'AdminController@adminLogin'
)
    ->name('admin-login-action');

Route::get('/admin-logout','AdminController@adminLogout');


Route::get('/admin-cari','AdminController@cari');





Route::get('/admin-inbox', 'InboxController@showInbox');
Route::get('/admin-inbox-sudah-dibaca', 'InboxController@showInboxSudahDibaca');
// routing yang digunakan untuk mengubah status inbox
// id digunakan untuk mengupdate data pada tabel yang akan diubah
Route::patch('/admin-inbox-ubah-status/{id}', 'InboxController@ubahStatusInbox');

// route untuk delete inbox
Route::delete('/admin-inbox-delete/{id}', 'InboxController@deleteInbox');

Route::get('/session-cookie', 'SessionCookieController@index');
