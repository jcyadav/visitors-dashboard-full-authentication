<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssessmentController;

Route::middleware('guest.session')->group(function () {

    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'checkLogin'])->name('check.login');

});

Route::middleware('auth.session')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard');

   Route::get('/my-profile', [AuthController::class, 'myProfile'])->name('MyProfile');

    Route::view('/question-1', 'pages.qone')->name('qone');

    Route::view('/question-2', 'pages.qtwo')->name('qtwo');

    Route::view('/question-3', 'pages.qthree')->name('qthree');

    Route::get('/logout', [AuthController::class, 'logout'])->name('Logout');

});

Route::middleware('auth.session')->group(function () {

    Route::get('/question3', [AssessmentController::class, 'question3'])
        ->name('qthree.php');

    Route::post('/question3/data', [AssessmentController::class, 'question3Data'])
        ->name('question3.data');
        

});