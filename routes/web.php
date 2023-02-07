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



        Route::get('/adminDashboard',[Admin::class,'adminDashboard'])->middleware('checkUserAdmin');

        Route::get('/docsList', [Documents::class, 'docsList'])->middleware('checkUserAdmin');

        Route::get('/siteSetting',[Admin::class,'siteSetting'])->middleware('checkAdmin');

        Route::get('/deleteDocs',[Documents::class,'deleteDocs'])->middleware('checkUserAdmin');

        Route::get('/adminDashboardFinance',[Finance::class,'adminDashboardFinance'])->middleware('checkAdmin');

        Route::get('/branchList',[Branch::class,'branchList'])->middleware('checkAdmin');

        Route::get('/outbranchList',[Branch::class,'outbranchList'])->middleware('checkAdmin');

        Route::get('/addingBranch',[Branch::class,'addingBranch'])->middleware('checkAdmin');

        Route::get('/getBranch',[Branch::class,'getBranch'])->middleware('checkAdmin');

        Route::get('/getOutBranch',[Branch::class,'getOutBranch'])->middleware('checkAdmin');

        Route::get('/deleteBranch',[Branch::class,'deleteBranch'])->middleware('checkAdmin');

        Route::get('/deleteOutBranch',[Branch::class,'deleteOutBranch'])->middleware('checkAdmin');

        Route::post('/addBranch',[Branch::class,'addBranch'])->middleware('checkAdmin');

        Route::post('/editBranch',[Branch::class,'editBranch'])->middleware('checkUserAdmin');

        Route::get('/addingAdmin',[Admin::class,'addingAdmin'])->middleware('checkAdmin');

        Route::get('/adminList',[Admin::class,'adminList'])->middleware('checkAdmin');

        Route::get('/karbarDetails',[Admin::class,'karbarDetails']);


        Route::post('/addAdmin',[Admin::class,'addAdmin'])->middleware('checkAdmin');

        Route::get('/getAdmin',[Admin::class,'getAdmin'])->middleware('checkAdmin');

        Route::post('/editAdmin',[Admin::class,'editAdmin'])->middleware('checkAdmin');

        Route::post('/siteSetting',[Admin::class,'addNewMangageRuleMony'])->middleware('checkAdmin');

        Route::post('/addElan',[Admin::class,'addElan'])->middleware('checkAdmin');

        Route::get('/editAdminProfile',[Admin::class,'editAdminProfile'])->middleware('checkUserAdmin');

        Route::get('/deleteAdmin',[Admin::class,'deleteAdmin'])->middleware('checkAdmin');

        Route::get('/',[Home::class,'index']);
        Route::get('/home',[Home::class,'index']);

        Route::post('/addDoc',[Documents::class,'addDoc'])->middleware('checkUserAdmin');

        Route::post('/editDoc',[Documents::class,'editDoc'])->middleware('checkUserAdmin');

        Route::get('/getDocument',[Documents::class,'getDocument'])->middleware('checkUserAdmin');
        
        Route::get('/registrationForm',[Documents::class,'registrationForm'])->middleware('checkUserAdmin');

        Route::get('/rejectDocument',[Documents::class,'rejectDocument'])->middleware('checkAdmin');

        Route::get('/okeDocument',[Documents::class,'okeDocument'])->middleware('checkAdmin');


        Route::get('/listBranchDocs',[Documents::class,'listBranchDocs'])->middleware('checkAdmin');

        Route::get('/showBranchDetails',[Branch::class,'showBranchDetails'])->middleware('checkAdmin');

        Route::get('/showOutBranchDetails',[Branch::class,'showOutBranchDetails'])->middleware('checkAdmin');

        Route::get('/docsDetails',[Documents::class,'docsDetails'])->middleware('checkUserAdmin');

        Route::get('/dislikeBranch',[Branch::class,'dislikeBranch'])->middleware('checkAdmin');

        Route::get('/likeBranch',[Branch::class,'likeBranch'])->middleware('checkAdmin');

        Route::get('/getLikeOpps',[Branch::class,'getLikeOpps'])->middleware('checkAdmin');

        Route::get('/addingBranchOut',[Branch::class,'addingBranchOut']);

        Route::post('/addBranchOut',[Branch::class,'addBranchOut']);

        Route::get('/viewSuccess',[Branch::class,'viewSuccess']);

        Route::get('/checkBranchUserName',[Branch::class,'checkBranchUserName']);

        Route::get('/checkAdminUserName',[Admin::class,'checkAdminUserName'])->middleware('checkAdmin');

        Route::get('/requestToBranch',[Branch::class,'requestToBranch'])->middleware('checkAdmin');

        Route::get('/acceptRequest',[Branch::class,'acceptRequest'])->middleware('checkUserAdmin');

        Route::get('/getAllBranchInfo',[Branch::class,'getAllBranchInfo'])->middleware('checkAdmin');

        Route::get('/cancelRequest',[Branch::class,'cancelRequest'])->middleware('checkAdmin');

        Route::get('/doTasviyahHisab',[Branch::class,'doTasviyahHisab'])->middleware('checkAdmin');
        
        Route::get('/moveToBranch',[Branch::class,'moveToBranch'])->middleware('checkAdmin');
        
        Route::get('/moveToTest',[Branch::class,'moveToTest'])->middleware('checkAdmin');

        Route::get('/tasviyahWithEmbossy',[Admin::class,'tasviyahWithEmbossy'])->middleware('checkAdmin');

        Route::post('/editOutBranch',[Branch::class,'editOutBranch'])->middleware('checkAdmin');
  
