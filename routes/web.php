<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('backend/layout/main');
});

Route::get('/dashboard', function (){
    return view('backend/dashboard');
})-> name('dashboard');

Route::get('/table', function (){
    return view('backend/tables');
})->name('tables');

// List berita
Route::get('/list-berita', function (){
    return view('backend/berita/list-berita/list');
})->name('list-berita');

Route::get('/edit-berita', function (){
    return view('backend/berita/list-berita/edit');
})->name('edit-berita');

Route::get('/post-berita', function (){
    return view('backend/berita/list-berita/post');
})->name('post-berita');
// End List berita

// Kategori Berita
Route::get('/kategori-berita', function (){
    return view('backend/berita/kategori-berita/list');
})->name('kategori-berita');
// End Kategori Berita

// Pengguna Berita
Route::get('/list-pengguna', function (){
    return view('backend/pengguna/list');
})->name('list-pengguna');
// END Pengguna Berita

Route::get('/list-agenda', function (){
    return view('backend/agenda/list');
})->name('list-agenda');

Route::get('/list-pengumuman', function (){
    return view('backend/pengumuman/list');
})->name('list-pengumuman');

Route::get('/list-download', function (){
    return view('backend/download/list');
})->name('list-download');

Route::get('/list-gallery', function (){
    return view('backend/gallery/list');
})->name('list-gallery');

Route::get('/list-data-guru', function (){
    return view('backend/data-guru/list');
})->name('list-data-guru');

Route::get('/list-data-siswa', function (){
    return view('backend/data-siswa/list');
})->name('list-data-siswa');

Route::get('/list-inbox', function (){
    return view('backend/inbox/list');
})->name('list-inbox');

Route::get('/list-komentar', function (){
    return view('backend/komentar/list');
})->name('list-komentar');

Route::get('/sign-up', function (){
    return view('backend/auth/sign-up');
})->name('sign-up');

