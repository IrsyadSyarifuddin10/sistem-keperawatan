<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\MentoringController;
use App\Http\Controllers\SupervisiController;
use App\Http\Controllers\ProfileController;
use App\Models\LogbookBK;
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
    Route::get('/mentoring', [MentoringController::class, 'index'])->name('mentoring');
    Route::get('/input-mentoring', function () {
        return view('mentoring/input-mentoring');
    })->name('input-mentoring');        // Masuk view input-mentoring
    Route::post('/input-data-mentoring', [MentoringController::class, 'store'])->name('input-data-mentoring');
    Route::get('/edit-mentoring/{id}/{nip}/{nipMentor}', [MentoringController::class, 'indexEdit'])->name('edit-mentoring');
    Route::post('/edit-data-mentoring', [MentoringController::class, 'update'])->name('edit-data-mentoring');
    Route::delete('/mentoring/{id}/{nip}/{nipMentor}', [MentoringController::class, 'destroy'])->name('delete-data-mentoring');


    // Supervisi
    Route::get('/supervisi', [SupervisiController::class, 'index'])->name('supervisi');
    Route::get('/input-supervisi', function () {
        return view('supervisi/input-supervisi');
    })->name('input-supervisi');
    Route::post('/input-data-supervisi', [SupervisiController::class, 'store'])->name('input-data-supervisi');
    Route::get('/edit-supervisi/{id}/{nip}/{nipSupervisor}', [SupervisiController::class, 'indexEdit'])->name('edit-supervisi');
    Route::post('/edit-data-supervisi', [SupervisiController::class, 'update'])->name('edit-data-supervisi');
    Route::delete('/supervisi/{id}/{nip}/{nipSupervisor}', [SupervisiController::class, 'destroy'])->name('delete-data-supervisi');

    // Logbook
    Route::get('/logbook', [LogbookController::class, 'index'])->name('logbook');

    Route::post('/input-data-logbook', [LogbookController::class, 'store'])->name('input-data-logbook');
    Route::get('/edit-logbook/{id}/{nip}/{no_rm}', [LogbookController::class, 'indexEdit'])->name('edit-logbook');
    Route::post('/edit-data-logbook', [LogbookController::class, 'update'])->name('edit-data-logbook');
    Route::delete('/delete-data-logbook/{id}/{nip}/{no_rm}', [LogbookController::class, 'destroy'])->name('delete-data-logbook');

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
