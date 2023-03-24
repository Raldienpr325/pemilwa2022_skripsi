<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllerFIKES;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminFK;
use App\Http\Controllers\ChartFikesController;
use App\Http\Controllers\ChartFKController;
use App\Http\Controllers\DpmController;
use App\Http\Controllers\DpmFikesController;
use App\Http\Controllers\LoginGoogleMahasiswa;
use App\Http\Controllers\PresmaFikesController;
use App\Http\Controllers\VotingController;
use Illuminate\Support\Facades\Artisan;

Auth::routes();

Route::get('/inimigratefresh', function () {

    Artisan::call('migrate:fresh --seed');
    dd('migrated');
});


//Route Untuk Guest
Route::get('/userlogout', function () {
    Auth::guard('user')->logout();
    return redirect()->route('home');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [HomeController::class, 'index'])->middleware('guest')->name('home');
    Route::get('login-admin', [HomeController::class, 'LoginAdmin'])->name('login-admin');
    Route::get('login-khusus',  [HomeController::class, 'LoginKhusus'])->name('loginkhusus');
    Route::POST('handle-login-khusus',  [HomeController::class, 'HandleLoginKhusus'])->name('handleloginkhusus');
    Route::get('chat-admin', [HomeController::class, 'ChatAdmin'])->name('chatadmin');
    Route::post('kirim-admin', [HomeController::class, 'kirimAdmin'])->name('kirimAdmin');
    Route::post('handle-admin-login', [HomeController::class, 'handleAdmin'])->name('handle-admin');
    Route::post('handle-mahasiswa-login', [HomeController::class, 'handlemahasiswa'])->name('handle-mahasiswa');
    Route::get('login-mahasiswa', [LoginGoogleMahasiswa::class, 'LoginUser'])->name('login-mahasiswa');
    Route::get('/auth/callback', [LoginGoogleMahasiswa::class, 'HandleCallbackGoogle']);
});




//Route Untuk User
// Route::group(['middleware' => 'email'], function () {
Route::get('mahasiswa-login-cek-nim', [LoginGoogleMahasiswa::class, 'CekNim'])->name('halaman-ceknim');
Route::post('mahasiswa-handle-login-ceknim', [LoginGoogleMahasiswa::class, 'HandleCeknim'])->name('handle-ceknim');

//Route Untuk User yang sudah memiliki akses Vote
Route::group(['middleware' => 'pemilih'], function () {
    Route::get('mahasiswa-kedokteran-vote-presma', [VotingController::class, 'votingPresmaFk'])->name('votingPresmaFk');
    Route::get('mahasiswa-kedokteran-vote-dpm', [VotingController::class, 'votingDpmFk'])->name('votingDpmFk');
    Route::post('store-voting/{id}', [VotingController::class, 'storeVoting'])->name('storeVoting');
    Route::post('store-voting2/{id}', [VotingController::class, 'storeVoting2'])->name('storeVoting2');
    Route::get('mahasiswa-fikes-vote-presma', [VotingController::class, 'votingPresmaFikes'])->name('votingPresmaFikes');
    Route::get('mahasiswa-fikes-vote-dpm', [VotingController::class, 'votingDpmFikes'])->name('votingDpmFikes');
    Route::post('store-voting3/{id}', [VotingController::class, 'storeVoting3'])->name('storeVoting3');
    Route::post('store-voting4/{id}', [VotingController::class, 'storeVoting4'])->name('storeVoting4');
});
// });

//Route Untuk Admin


//Route untuk Fakultas Kedokteran
Route::middleware('admin')->group(function () {
    Route::get('dashboard-admin', [AdminFK::class, 'DashboardAdmin'])->name('dashboard-admin');
    Route::get('chart-presma-fk', [ChartFKController::class, 'chartPresmaFK'])->name('chartPresmaFK');
    Route::get('chart-dpm-fk', [ChartFKController::class, 'chartDpmFK'])->name('chartDpmFK');
    Route::resource('presma-fk', AdminFK::class)->except('show');
    Route::resource('dpm-fk', DpmController::class)->except('show');
    Route::get('record-fk', [ChartFKController::class, 'record'])->name('record-fk');
    Route::get('dashboard-grafik-presma-fk', [AdminFK::class, 'GrafikPresmaFK'])->name('grafikpresmafk');
    Route::get('dashboard-grafik-dpm-fk', [AdminFK::class, 'GrafikDPMFK'])->name('grafikdpmfk');
    Route::get('record-pskb', [AdminFK::class, 'RecordPSKB'])->name('recordpskb');
    Route::get('record-PSKED', [AdminFK::class, 'RecordPSKED'])->name('recordpsked');
    Route::get('export-PSKED', [AdminFK::class, 'ExportPSKED'])->name('exportpsked');
    Route::get('record-pssf', [AdminFK::class, 'RecordPSSF'])->name('recordpssf');
    Route::any('record-all-mahasiswa', [AdminFK::class, 'AllMahasiswa'])->name('allmahasiswa');
    Route::POST('import-data-semua-mahasiswa', [AdminFK::class, 'ImportAllMahasiswa'])->name('importkedokteran');
});

//Route Untuk Fakultas Kesehatan
Route::middleware('admin')->group(function () {
    Route::get('chart-presma-fikes', [ChartFikesController::class, 'chartPresmaFikes'])->name('chartPresmaFikes');
    Route::get('chart-dpm-fikes', [ChartFikesController::class, 'chartDpmFikes'])->name('chartDpmFikes');
    Route::resource('presma-fikes', PresmaFikesController::class)->except('show');
    Route::resource('dpm-fikes', DpmFikesController::class)->except('show');
    Route::get('record-fikes', [ChartFikesController::class, 'record'])->name('record-fikes');
    Route::get('dashboard-grafik-presma-faskes', [AdminControllerFIKES::class, 'GrafikPresmaFasKes'])->name('grafikpresmafaskes');
    Route::get('dashboard-grafik-dpm-faskes', [AdminControllerFIKES::class, 'GrafikDPMFasKes'])->name('grafikdpmfaskes');
    Route::get('record-psigb', [AdminControllerFIKES::class, 'RecordPSIGB'])->name('recordpsigb');
    Route::get('record-psigl', [AdminControllerFIKES::class, 'RecordPSIGL'])->name('recordpsigl');
    Route::get('record-psikb', [AdminControllerFIKES::class, 'RecordPSIKB'])->name('recordpsikb');
    Route::get('record-psikl', [AdminControllerFIKES::class, 'RecordPSIKL'])->name('recordpsikl');
    Route::get('record-all-mahasiswa-fikes', [AdminControllerFIKES::class, 'AllMahasiswa'])->name('allmahasiswafikes');
    Route::POST('import-data-semua-mahasiswa-fikes', [AdminControllerFIKES::class, 'ImportAllMahasiswa'])->name('importfikes');
});