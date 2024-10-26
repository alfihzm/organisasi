<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\panitia\C_users as Panitia_Users;
use App\Http\Controllers\panitia\C_openRecruitment as Panitia_Oprec;
use App\Http\Controllers\{C_auth, C_authentication, C_campuses, C_dashboard, C_openRecruitment, C_profileUser, C_peserta, C_authen, C_dataSampah, C_infoDpcController, C_openRecruitmentDPP};
use App\Http\Controllers\panitia\C_notifications;
use App\Http\Controllers\panitia\C_pengaturan;

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

Route::prefix('user')->group(function () {
    Route::get('/changePass', [C_profileUser::class, 'changePass']);
    Route::post('/changePassAct', [C_profileUser::class, 'changePassAct']);
});
Route::prefix('manage-users')->group(function () {
    Route::get('/', [Panitia_Users::class, 'index']);
    Route::get('/create', [Panitia_Users::class, 'create']);
    Route::get('/{user}', [Panitia_Users::class, 'show']);
    Route::post('/', [Panitia_Users::class, 'store']);
    Route::put('/{user}', [Panitia_Users::class, 'update']);
});

Route::prefix('notification')->group(function () {
    Route::get('/', [C_notifications::class, 'index']);
});

Route::prefix('pengaturan')->group(function () {
    Route::get('/', [C_pengaturan::class, 'index'])->name('pengaturan.index');
    Route::post('/pengaturan/update-status', [C_pengaturan::class, 'updateStatus'])->name('pengaturan.update-status');
});


Route::group(['prefix' => 'authentication'], function () {
    Route::get('/login', [C_authentication::class, 'login'])->name('login');
    Route::post('/login', [C_authentication::class, 'storeLogin']);
    Route::post('/logout', [C_authentication::class, 'logout'])->middleware('auth');
});

Route::group(['prefix' => 'auth', 'middleware' => 'participant.guest'], function () {
    Route::get('/login', [C_auth::class, 'login'])->name('peserta.login');
    Route::post('/login', [C_auth::class, 'storeLogin']);
});
Route::get('auth/logout', [C_auth::class, 'logout'])->middleware('auth:participant')->name('logout');

Route::get('/', [C_openRecruitment::class, 'index']);
Route::group(['prefix' => 'oprec'], function () {
    Route::get('/', [C_openRecruitment::class, 'index']);
    Route::post('/', [C_openRecruitment::class, 'store']);
    Route::get('/edit/{openRecruitment}', [C_openRecruitment::class, 'edit'])->middleware('checkIsActive');
    Route::get('/choose-member', [C_openRecruitment::class, 'chooseMember']);
    Route::get('/choose-campus', [C_openRecruitment::class, 'chooseCampus'])->middleware('checkIsActive');
    Route::get('/choose-campus/{campus}', [C_openRecruitment::class, 'inputNIM'])->middleware('checkIsActive');
    Route::post('/input-nim', [C_openRecruitment::class, 'create'])->middleware('checkIsActive');
    Route::get('/form/{campus}/{NIM}', [C_openRecruitment::class, 'form'])->middleware('checkIsActive');
    Route::put('/form/{openRecruitment}', [C_openRecruitment::class, 'update']);
    Route::get('/closed', [C_openRecruitment::class, 'closed']);
});

Route::group(['prefix' => 'oprec-dpp'], function () {
    Route::get('/', [C_openRecruitmentDPP::class, 'index'])->name('OprecDPP');
});

Route::resources([
    'campuses' => C_campuses::class
]);

Route::group(['prefix' => 'panitia', 'middleware' => 'auth'], function () {
    Route::get('/', [C_dashboard::class, 'index']);
    Route::group(['prefix' => 'openrecruitment'], function () {
        Route::get('/', [Panitia_Oprec::class, 'index']);
        Route::get('/campus/{campuses}', [Panitia_Oprec::class, 'campus']);
        Route::get('/campus/{campuses}/{status_interview}', [Panitia_Oprec::class, 'filterInterview']);
        Route::put('/interview/{openRecruitment}', [Panitia_Oprec::class, 'updateStatus']);
        Route::get('/{openRecruitment}', [Panitia_Oprec::class, 'show']);
        Route::delete('/{openRecruitment}', [Panitia_Oprec::class, 'destroy'])->middleware('admin');
        Route::delete('/panitia/openrecruitment/hapusCV/{openRecruitment}', [Panitia_Oprec::class, 'hapusCV'])->name('hapusCV');
    });
});

Route::group(['prefix' => 'peserta', 'middleware' => 'participant'], function () {
    Route::get('/', [C_peserta::class, 'index'])->name('peserta.dashboard');
    Route::post('/upload-cv', [C_peserta::class, 'uploadCV'])->name('upload.cv');
    Route::get('/ubah-profil', [C_peserta::class, 'edit'])->name('peserta.ubah-profil');
    Route::post('/ubahProfil', [C_peserta::class, 'update'])->name('peserta.update');
    Route::post('/edit-cv', [C_peserta::class, 'editCV'])->name('edit.cv');
});

Route::group(['prefix' => 'info-dpc', 'middleware' => 'participant'], function () {
    Route::get('/', [C_infoDpcController::class, 'index'])->name('info-dpc');
});

Route::prefix('export')->middleware('auth')->group(function () {
    Route::get('/excel/{campuses}', [Panitia_Oprec::class, 'exportExcel']);
});

// Route::get('/generate', function () {
//     $now = Carbon::now()->format('ym');
//     $config = ['table' => 'users', 'length' => 12, 'prefix' => "UID-$now"];
//     $uid = IdGenerator::generate($config);
//     return $uid;
// });