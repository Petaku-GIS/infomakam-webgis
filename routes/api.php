<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Makam;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search', [Makam::class, 'searchMakam']);
Route::get('/geojson/makam', [Makam::class, 'geojsonMakam']);
Route::get('/makam/{id}', [Makam::class, 'getDetailMakam']);
Route::get('/makam/{id}/harga', [Makam::class, 'getMakamPrice']);
