<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Documents;
use App\Http\Controllers\Finance;
use App\Http\Controllers\Branch;


// \Artisan::call('route:clear');
// \Artisan::call('config:cache');
// \Artisan::call('optimize');

Route::get('/loginAdmin',[Admin::class,'loginAdmin']);
Route::post('/checkBranch',[Branch::class,'checkBranch']);

Route::get('/',[Home::class,'index']);

Route::get('/home',[Home::class,'index']);
Route::get('/login',[Home::class,'login']);
Route::get('/loginAdmin',[Admin::class,'login']);
Route::get('/adminDashboard',[Admin::class,'adminDashboard']);

Route::get('/registrationForm',[Documents::class,'registrationForm']);
Route::get('/docsList',[Documents::class,'docsList']);

Route::get('/siteSetting',[Admin::class,'siteSetting']);
Route::post('/addDoc',[Documents::class,'addDoc']);
Route::get('/deleteDocs',[Documents::class,'deleteDocs']);
Route::get('/getDocument',[Documents::class,'getDocument']);
Route::post('/editDoc',[Documents::class,'editDoc']);

Route::get('/adminDashboardFinance',[Finance::class,'adminDashboardFinance']);
Route::get('/branchList',[Branch::class,'branchList']);
Route::get('/addingBranch',[Branch::class,'addingBranch']);
Route::get('/getBranch',[Branch::class,'getBranch']);
Route::get('/deleteBranch',[Branch::class,'deleteBranch']);
Route::post('/addBranch',[Branch::class,'addBranch']);
Route::post('/editBranch',[Branch::class,'editBranch']);

Route::get('/addingAdmin',[Admin::class,'addingAdmin']);
Route::get('/adminList',[Admin::class,'adminList']);
Route::post('/addAdmin',[Admin::class,'addAdmin']);
Route::get('/getAdmin',[Admin::class,'getAdmin']);
Route::post('/editAdmin',[Admin::class,'editAdmin']);
Route::post('/siteSetting',[Admin::class,'addNewMangageRuleMony']);
Route::post('/addElan',[Admin::class,'addElan']);
Route::get('/deleteAdmin',[Admin::class,'deleteAdmin']);
