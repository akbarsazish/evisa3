<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Admin;

// \Artisan::call('route:clear');
// \Artisan::call('config:cache');
// \Artisan::call('optimize');

Route::get('/loginAdmin',[Admin::class,'loginAdmin']);
Route::post('/checkAdmin',[Admin::class,'checkAdmin']);

Route::get('/',[Home::class,'index']);

Route::get('/home',[Home::class,'index']);
Route::get('/login',[Home::class,'login']);
Route::get('/loginAdmin',[Admin::class,'login']);
Route::get('/adminDashboard',[Admin::class,'adminDashboard']);

Route::get('/registrationForm',[Admin::class,'registrationForm']);
Route::get('/docsList',[Admin::class,'docsList']);