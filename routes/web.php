<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\MentoringController;
use App\Http\Controllers\SupervisiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
})->name('login');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Users
    Route::get('/get-user-name', [UserController::class, 'getUserName']);

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Mentoring
    Route::get('/mentoring', [MentoringController::class, 'index'])->name('mentoring');                                                    // Masuk view mentoring
    Route::get('/input-mentoring', function () {
        return view('mentoring/input-mentoring');
    })->name('input-mentoring');        // Masuk view input-mentoring
    Route::post('/input-data-mentoring', [MentoringController::class, 'store'])->name('input-data-mentoring');                             // Form untuk simpan data dari view input-mentoring        
    Route::get('/edit-mentoring/{created_at}/{nip}/{nipMentor}', [MentoringController::class, 'indexEdit'])->name('edit-mentoring');                                                                                                        // Masuk view input-mentoring
    Route::post('/edit-data-mentoring', [MentoringController::class, 'update'])->name('edit-data-mentoring');                              // Form untuk ubah data dari view edit-mentoring
    Route::delete('/mentoring/{created_at}/{nip}/{nipMentor}', [MentoringController::class, 'destroy'])->name('delete-data-mentoring');    // Ntah ini nanti kemungkinan delete data langsung aja


    // Supervisi
    Route::get('/supervisi', [SupervisiController::class, 'index'])->name('supervisi');                                                    // Masuk view supervisi
    Route::get('/input-supervisi', function () {                                                                                           // Masuk view input-supervisi
        return view('supervisi/input-supervisi');
    })->name('input-supervisi');
    Route::post('/input-data-supervisi', [SupervisiController::class, 'store'])->name('input-data-supervisi');                              // Form untuk simpan data dari view input-mentoring
    Route::get('/edit-supervisi/{created_at}/{nip}/{nipSupervisor}', [SupervisiController::class, 'indexEdit'])->name('edit-supervisi');                                                                                                        // Masuk view input-mentoring
    Route::post('/edit-data-supervisi', [SupervisiController::class, 'update'])->name('edit-data-supervisi');                              // Form untuk ubah data dari view edit-mentoring
    Route::delete('/supervisi/{created_at}/{nip}/{nipSupervisor}', [SupervisiController::class, 'destroy'])->name('delete-data-supervisi');  // Ntah ini nanti kemungkinan delete data langsung aja

    // Logbook
    Route::post('/redirect-logbook', [LogbookController::class, 'redirect'])->name('redirect-logbook');
    Route::get('/logbook', function () {
        return view('logbook/logbook');
    })->name('logbook');
    Route::get('/input-logbook-bk', function () {
        return view('logbook/input-logbook-bk');
    })->name('input-logbook-bk');
    Route::get('/input-logbook-pk-ugd', function () {
        return view('logbook/input-logbook-pk-ugd');
    })->name('input-logbook-pk-ugd');
    Route::get('/input-logbook-pk-ralan', function () {
        return view('logbook/input-logbook-pk-ralan');
    })->name('input-logbook-pk-ralan');
    Route::get('/input-logbook-pk-ranap', function () {
        return view('logbook/input-logbook-pk-ranap');
    })->name('input-logbook-pk-ranap');
    Route::get('/input-logbook-pk-perina', function () {
        return view('logbook/input-logbook-pk-perina');
    })->name('input-logbook-pk-perina');
    Route::get('/input-logbook-pk-ok', function () {
        return view('logbook/input-logbook-pk-ok');
    })->name('input-logbook-pk-ok');
    Route::get('/input-logbook-pk-icu', function () {
        return view('logbook/input-logbook-pk-icu');
    })->name('input-logbook-pk-icu');
});

require __DIR__ . '/auth.php';
