<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Documents;


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

Route::get('/registrationForm',[Documents::class,'registrationForm']);
Route::get('/docsList',[Documents::class,'docsList']);

Route::get('/adminDashboardFinance',[Admin::class,'adminDashboardFinance']);
Route::post('/addDoc',[Documents::class,'addDoc']);
Route::get('/deleteDocs',[Documents::class,'deleteDocs']);
Route::get('/getDocument',[Documents::class,'getDocument']);