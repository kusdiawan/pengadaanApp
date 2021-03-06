<?php
Route::get('/', 'Home@index');

//route registrasi
Route::get('/registrasi','Registrasi@index');

//route simpan data registrasi
Route::post('/regis','Registrasi@regis');

//route halaman login sup
Route::get('/login','Suplier@login');
Route::post('/masukSuplier','Suplier@masukSuplier');

Route::get('/suplierKeluar','Suplier@suplierKeluar');

Route::get('/masukAdmin','Admin@index');

//Route::get('/adminGenerate','Admin@adminGenerate');

Route::post('/loginAdmin','Admin@loginAdmin');

Route::get('/pengajuan','Pengajuan@pengajuan');

Route::get('/keluarAdmin','Admin@keluarAdmin');

Route::get('/listAdmin','Admin@listAdmin');

Route::post('/tambahAdmin','Admin@tambahAdmin');

Route::post('/ubahAdmin','Admin@ubahAdmin');

Route::get('/hapusAdmin/{id}', 'Admin@hapusAdmin');

Route::get('/listPengadaan', 'Pengadaan@index');

Route::post('/tambahPengadaan','Pengadaan@tambahPengadaan');

Route::get('/hapusGambar/{id}','Pengadaan@hapusGambar');

//Route::get('/uploadGambar/{id}', 'Pengadaan@uploadGambar');

Route::post('/uploadGambar','Pengadaan@uploadGambar');

Route::post('/ubahPengadaan', 'Pengadaan@ubahPengadaan');

Route::get('/hapusPengadaan/{id}','Pengadaan@hapusPengadaan');

Route::get('/listSuplier','Pengadaan@listSuplier');

Route::post('/tambahPengajuan','Pengajuan@tambahPengajuan');

Route::get('/terimaPengajuan/{id}','Pengajuan@terimaPengajuan');

Route::get('/tolakPengajuan/{id}','Pengajuan@tolakPengajuan');

Route::get('/riwayatku','Pengajuan@riwayatku');

Route::post('/tambahLaporan','Pengajuan@tambahLaporan');

Route::get('/laporan','Pengajuan@laporan');

Route::get('/selesaiPengajuan/{id}','Pengajuan@selesaiPengajuan');

Route::get('/pengajuanselesai','Pengajuan@pengajuanselesai');

Route::get('/tolakLaporan/{id}','Pengajuan@tolakLaporan');

Route::get('/listSup','Suplier@listSup');

Route::get('/nonAktif/{id}','Suplier@nonAktif');

Route::get('/Aktif/{id}','Suplier@Aktif');

Route::post('/ubahPasswordSup','Suplier@ubahPassword');

Route::post('/ubahPasswordAdm','Admin@ubahPassword');

