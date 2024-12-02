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

/*
|--------------------------------------------------------------------------
| Tampilan User
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/detailtrainee', function () {
    return view('admin.detailtrainee');
})->name('admin.detailtrainee');

Route::get('/admin/detailtesttkdv', function () {
    return view('admin.detailtesttkdv');
})->name('admin.detailtesttkdv');

Route::get('/admin/detailtestpapikostik', function () {
    return view('admin.detailtestpapikostik');
})->name('admin.detailtestpapikostik');

Route::get('/admin/trainee', function () {
    return view('admin.trainee');
})->name('admin.trainee');

Route::get('/admin/profil', function () {
    return view('admin.profil');
})->name('admin.profil');

/*
|--------------------------------------------------------------------------
| Tampilan User
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('user.login');
})->name('user.login');

Route::get('/user/start', function () {
    return view('user.start');
})->name('user.start');

Route::get('/user/checkcam', function () {
    return view('user.checkcam');
})->name('user.checkcam');

Route::get('/user/soal', function () {
    return view('user.soal');
})->name('user.soal');

Route::get('/user/soal2', function () {
    return view('user.soal2');
})->name('user.soal2');

Route::get('/user/end', function () {
    return view('user.end');
})->name('user.end');






