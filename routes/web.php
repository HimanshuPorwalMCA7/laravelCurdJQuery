<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[RegisterController::class,'store'])->name('register');
Route::post('/registered',[RegisterController::class,'stored'])->name('registered');
Route::get('read',function(){
    return view('read');
});
Route::get('read-data',[RegisterController::class,'read'])->name('read');
Route::get('update/{id}',[RegisterController::class,'update']);
Route::post('updated',[RegisterController::class,'updated'])->name('updated');
Route::get('delete/{id}',[RegisterController::class,'delete']);


Route::post('add',[RegisterController::class,'add'])->name('add');
