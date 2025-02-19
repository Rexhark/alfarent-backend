<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\TestimoniController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::get('/mobil', [MobilController::class, 'index']);
    Route::get('/mobil/jumlah', [MobilController::class, 'jumlahMobil']);
    Route::get('/kontak', [KontakController::class, 'index']);
    Route::get('/testimoni', [TestimoniController::class, 'index']);
    Route::get('/faq', [FaqController::class, 'index']);
});
