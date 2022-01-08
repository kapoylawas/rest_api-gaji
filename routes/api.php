<?php

use App\Http\Controllers\GajiController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

// route master crud pegawai
Route::get('/pegawais', [PegawaiController::class, 'index']);

Route::post('/pegawai', [PegawaiController::class, 'store']);

Route::get('/pegawais/{id}', [PegawaiController::class, 'show']);

Route::put('/pegawais/{id}', [PegawaiController::class, 'index']);

Route::delete('/pegawais/{id}', [PegawaiController::class, 'destroy']);

// route master crud gaji pegawai
Route::get('/gajis', [GajiController::class, 'index']);

Route::post('/gaji', [GajiController::class, 'store']);

Route::get('/gajis/{tanggal}', function (Request $request) {
    $result = DB::connection('local')->table('gajis')
        ->select('name_karyawan', 'gaji_karyawan', 'tanggal')
        ->where('tanggal', 'LIKE', '%' .$request->tanggal. '%')
        ->get();
    return response()->json($result, 200);
});

Route::put('/gajis/{id}', [GajiController::class, 'index']);

Route::delete('/gajis/{id}', [GajiController::class, 'destroy']);

Route::get('send-email-gaji', function () {
    $data['email'] = "arif.sangga@gmail.com";
    
    dispatch(new App\Jobs\SendEmailJob($data));
});

