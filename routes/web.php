<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;


Route::get('/',[DataController::class,'index']);
Route::get('/about',[DataController::class,'about'])->name('about');
Route::get('/uploadform',[DataController::class,'importUploadForm'])->name('uploadform');
Route::get('/update-rate/{id}',[DataController::class,'edit'])->name('update-rate');
Route::get('/deleterate/{id}',[DataController::class,'destroy'])->name('deleterate');


Route::post('/importform',[DataController::class,'importForm'])->name('importform');
Route::post('/add-rate',[DataController::class,'store'])->name('add-rate');
Route::post('/updaterate/{id}',[DataController::class,'update'])->name('updaterate');