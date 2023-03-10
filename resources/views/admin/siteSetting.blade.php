@extends('admin.layout')
@section('content')
<div class="container mt-3">
    <ul class="nav nav-tabs d-none d-lg-flex" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link siteSetting active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane1" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"> تنظیمات مالی سایت </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link siteSetting" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"> تنظیم اعلانات</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link siteSetting" id="finance-operation" data-bs-toggle="tab" data-bs-target="#financeop-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"> عملیات مالی</button>
        </li>
    </ul>
    <div class="tab-content accordion" id="myTabContent">
           <div class="tab-pane show active fade accordion-item" id="profile-tab-pane1" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <h2 class="accordion-header d-lg-none" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      تنظیمات مالی سایت
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse d-lg-block" aria-labelledby="headingOne" data-bs-parent="#myTabContent">
                    <div class="accordion-body">
                    <div class="row">
                        <div class="col-lg-12 p-3">
                         <form action="{{url('/siteSetting')}}" method="post">
                            @csrf
                            <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="mb-3">
                                            <input type="hidden" disabled name="docNum" value={{$siteRules->docNum}} class="form-control form-control-sm" placeholder="1">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="pwd"> کار مزد  هر سند برای شرکت:</label>
                                            <input type="number" name="money" required value={{$siteRules->money}} class="form-control form-control-sm" placeholder="500">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="pwd"> :مبلغ پول هر سند برای مرکز</label>
                                            <input type="number" name="totalOfCenter" required  value={{$siteRules->totalOfCenter}} class="form-control form-control-sm" placeholder="500">
                                        </div>
                                    </div>
                        
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                         <div class="mb-3">
                                            
                                            <input type="hidden" name="corrects"   disabled value={{$siteRules->Corrects}} class="form-control form-control-sm" placeholder="10">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="mb-3"> </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="mb-3">
                                        <label for="email"> امتیاز مثبت:</label>
                                            <input type="number" name="correctBonus"  required value={{$siteRules->CorrectBonus}} class="form-control form-control-sm" placeholder="20">
                                        
                                            <input type="hidden" name="problems"  disabled value={{$siteRules->Problems}} class="form-control form-control-sm" placeholder="5">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="pwd"> امتیاز منفی:</label>
                                            <input type="number" name="problemMinus" required  value={{$siteRules->ProblemMinus}} class="form-control form-control-sm" placeholder="10 - ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                    <button type="submit" class="btn btn-primary">ذخیره <i class="fa fa-save"></i></button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show accordion-item" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <h2 class="accordion-header d-lg-none" id="headingTwo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"> تنظیم اعلانات </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse show  d-lg-block" aria-labelledby="headingTwo" data-bs-parent="#myTabContent">
                    <div class="accordion-body">
                        <form action="{{url('/addElan')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                    <div class="mb-3">
                                        <label for="email" class="fs-6"> عنوان :</label>
                                        <input type="text" name="title" class="form-control form-control-sm" placeholder="سال نو مبارک" required>
                                    </div>
                                </div>
                                  <div class="row">
                                     <div class="mb-2">
                                        <label for="pwd" class="fs-6"> متن اعلانات   :</label>
                                        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="5" placeholder="متن اعلانات" required></textarea>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                <button type="submit" class="btn btn-primary">ذخیره <i class="fa fa-save"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show accordion-item" id="financeop-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <h2 class="accordion-header d-lg-none" id="headingTwo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">  عملیات مالی </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse show  d-lg-block" aria-labelledby="headingTwo" data-bs-parent="#myTabContent">
                    <div class="accordion-body">
                        
                            <div class="row">
                                    <div class="mb-3">
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                <button type="button" class="btn btn-primary" id="tasviyahToEmbossyBtn">تسویه با سفارت<i class="fa fa-money"></i></button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
