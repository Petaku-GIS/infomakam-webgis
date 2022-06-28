<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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


Route::get('/', function () {
    return view('home');
});
Route::get('/pick', function() {
    return view('pick');
});
// auth
Route::get('/login', [AuthController::class, 'LoginView']);
Route::post('/login', [AuthController::class, 'Login']);
Route::get('/register', [AuthController::class, 'RegisterView']);
Route::post('/register', [AuthController::class, 'Register']);
Route::get('/logout', [AuthController::class, 'Logout']);

// admin dashboard
Route::get('/admin/daftar-harga', [AdminController::class, 'ViewDashboard']);
Route::get('/admin/daftar-harga/tambah', [AdminController::class, 'ViewTambahDaftarHarga']);
Route::post('/admin/daftar-harga/tambah', [AdminController::class, 'TambahDaftarHarga']);
Route::get('/admin/daftar-harga/edit/{id}', [AdminController::class, 'ViewUbahDaftarHarga']);
Route::put('/admin/daftar-harga/edit', [AdminController::class, 'UbahDaftarHarga']);
Route::delete('/admin/daftar-harga/delete/{id}', [AdminController::class, 'HapusDaftarHarga']);