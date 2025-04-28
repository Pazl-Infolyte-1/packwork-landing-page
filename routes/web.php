<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;


Route::get('/', [MyController::class, 'showHome'])->name('home');
Route::get('/home', [MyController::class, 'showHome'])->name('home');
Route::get('/signup', [MyController::class, 'signup'])->name('signup');
Route::get('/feature', [MyController::class, 'showFeature'])->name('feature');
Route::get('/pricing', [MyController::class, 'showPricing'])->name('pricing');
Route::get('/contact', [MyController::class, 'showContact'])->name('contact');
Route::get('/terms-of-use', [MyController::class, 'termsOfUse'])->name('terms-of-use');
Route::get('/privacy-policy', [MyController::class, 'privacyPolicy'])->name('privacy-policy');
