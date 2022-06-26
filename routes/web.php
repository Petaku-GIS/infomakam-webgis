<?php

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
