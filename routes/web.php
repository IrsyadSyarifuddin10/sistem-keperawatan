<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\MentoringController;
use App\Http\Controllers\InputMentoringController;
use App\Http\Controllers\SupervisiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
})->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/redirect-logbook', [LogbookController::class, 'redirect'])->name('redirect-logbook');
    Route::post('/input-mentoring', [InputMentoringController::class, 'store'])->name('input-mentoring');
    Route::post('/input-supervisi', [SupervisiController::class, 'store'])->name('input-supervisi');
    Route::get('/get-user-name', [UserController::class, 'getUserName']);
    Route::get('/mentoring', [MentoringController::class, 'index'])->name('mentoring');
    Route::get('/supervisi', [SupervisiController::class, 'index'])->name('supervisi');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/logbook', function () {
        return view('logbook/logbook');
    })->name('logbook');

    Route::get('/input-mentoring', function () {
        return view('mentoring/input-mentoring');
    })->name('input-mentoring');

    Route::get('/input-supervisi', function () {
        return view('supervisi/input-supervisi');
    })->name('input-supervisi');

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