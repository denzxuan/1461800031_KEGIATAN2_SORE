<?php

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

Route::get('/', function () {
	$data = DB::table('data_siswa')->select('nama_siswa','nis','kelamin','alamat_siswa','telpon_siswa')->get();
    return view('welcome_0031',compact('data'));
})->name('select');

Route::get('/selectwhere', function () {
	$data = DB::table('data_siswa')
					->select('nama_siswa','nis','kelamin','alamat_siswa','telpon_siswa')
					->where('nama_siswa','Ibnu Siena')
					->get();
    return view('selectwhere_0031',compact('data'));
})->name('selectwhere');

Route::get('/selectjoin', function () {
	$data = DB::table('tbl_ruangan')
					->leftJoin('data_siswa', 'tbl_ruangan.id_siswa', '=', 'data_siswa.id_siswa')
					->leftJoin('setup_kelas', 'tbl_ruangan.id_kelas', '=', 'setup_kelas.id_kelas')
					->select('id_ruangan','nama_kelas','nama_siswa')
					->get();
    return view('selectjoin_0031',compact('data'));
})->name('selectjoin');

Route::get('/selectjoinlike', function () {
    $data = DB::table('tbl_ruangan')
					->leftJoin('data_siswa', 'tbl_ruangan.id_siswa', '=', 'data_siswa.id_siswa')
					->leftJoin('setup_kelas', 'tbl_ruangan.id_kelas', '=', 'setup_kelas.id_kelas')
					->select('id_ruangan','nama_kelas','nama_siswa')
					->where('nama_kelas','like','%A%')
					->get();
    return view('selectjoinlike_0031',compact('data'));
})->name('selectjoinlike');

