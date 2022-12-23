<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Documents;
use App\Http\Controllers\Finance;
use App\Http\Controllers\Branch;

Route::post('/checkAdmin',[Admin::class,'checkAdmin']);
Route::post('/checkBranch',[Branch::class,'checkBranch']);
Route::get('/loginAdmin',[Admin::class,'loginAdmin']);

Route::get('/login',[Home::class,'login']);
Route::get('/loginAdmin',[Admin::class,'login']);

Route::get('/logout',[Admin::class,'logout']);

// if(Session::get("uerSession")==1 or Session::get("uerSession")==2){
//     Route::group(['middleware' => 'checkAdmin'], function () {
        Route::get('/adminDashboard',[Admin::class,'adminDashboard']);
        Route::get('/docsList', [Documents::class, 'docsList']);
        Route::get('/siteSetting',[Admin::class,'siteSetting']);
        Route::get('/deleteDocs',[Documents::class,'deleteDocs']);
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
        Route::get('/editAdminProfile',[Admin::class,'editAdminProfile']);
        Route::get('/deleteAdmin',[Admin::class,'deleteAdmin']);


        Route::get('/',[Home::class,'index']);
        Route::get('/home',[Home::class,'index']);
  //   });
  // }else{
        // Route::group(['middleware' => 'checkUser'], function () {
        Route::get('/docsList', [Documents::class, 'docsList']);
      //  Route::get('/adminDashboard',[Admin::class,'adminDashboard']);
        Route::post('/addDoc',[Documents::class,'addDoc']);
        Route::post('/editDoc',[Documents::class,'editDoc']);
        Route::get('/getDocument',[Documents::class,'getDocument']);
        Route::get('/deleteDocs',[Documents::class,'deleteDocs']);
        Route::get('/registrationForm',[Documents::class,'registrationForm']);
        Route::get('/rejectDocument',[Documents::class,'rejectDocument']);
        Route::get('/okeDocument',[Documents::class,'okeDocument']);
        Route::get('/listBranchDocs',[Documents::class,'listBranchDocs']);
        Route::get('/showBranchDetails',[Branch::class,'showBranchDetails']);
        Route::get('/docsDetails',[Documents::class,'docsDetails']);
        Route::get('/dislikeBranch',[Branch::class,'dislikeBranch']);
        Route::get('/likeBranch',[Branch::class,'likeBranch']);
        Route::get('/getLikeOpps',[Branch::class,'getLikeOpps']);
        Route::get('/addingBranchOut',[Branch::class,'addingBranchOut']);
        Route::post('/addBranchOut',[Branch::class,'addBranchOut']);
        Route::get('/viewSuccess',[Branch::class,'viewSuccess']);
        Route::get('/checkBranchUserName',[Branch::class,'checkBranchUserName']);
        Route::get('/checkAdminUserName',[Admin::class,'checkAdminUserName']);
        Route::get('/requestToBranch',[Branch::class,'requestToBranch']);
        Route::get('/acceptRequest',[Branch::class,'acceptRequest']);
        Route::get('/getAllBranchInfo',[Branch::class,'getAllBranchInfo']);
        Route::get('/cancelRequest',[Branch::class,'cancelRequest']);
  //   });
  // }
