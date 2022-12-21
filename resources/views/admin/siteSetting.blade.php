@extends('admin.layout')
@section('content')
<div class="container mt-3">
    <ul class="nav nav-tabs d-none d-lg-flex" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link siteSetting active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane1" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">  تنظیمات سایت  </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link siteSetting" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"> تنظیم اعلانات</button>
        </li>
        
        <li class="nav-item" role="presentation">
            <button class="nav-link siteSetting" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"> تنظیمات مالی</button>
        </li>
    </ul>
    <div class="tab-content accordion" id="myTabContent">
           <div class="tab-pane show active fade accordion-item" id="profile-tab-pane1" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <h2 class="accordion-header d-lg-none" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        تنظیمات سایت
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
                                            <label for="email"> تعداد سند :</label>
                                            <input type="number" name="docNum" value={{$siteRules->docNum}} class="form-control form-control-sm" placeholder="1">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="pwd"> مقدار پول :</label>
                                            <input type="number" name="money"  value={{$siteRules->money}} class="form-control form-control-sm" placeholder="500">
                                        </div>
                                    </div>
                        
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                         <div class="mb-3">
                                            <label for="pwd"> تعداد درست :</label>
                                            <input type="number" name="corrects"  value={{$siteRules->Corrects}} class="form-control form-control-sm" placeholder="10">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="email"> امتیاز :</label>
                                            <input type="number" name="correctBonus"  value={{$siteRules->CorrectBonus}} class="form-control form-control-sm" placeholder="20">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="email"> تعداد غلط </label>
                                            <input type="number" name="problems"  value={{$siteRules->Problems}} class="form-control form-control-sm" placeholder="5">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="pwd">  کسر امتیاز:</label>
                                            <input type="number" name="problemMinus"  value={{$siteRules->ProblemMinus}} class="form-control form-control-sm" placeholder="10 - ">
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
                            <div class="row p-3">
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="mb-3">
                                        <label for="email"> عنوان :</label>
                                        <input type="text" name="title" class="form-control form-control-sm" placeholder="سال نو مبارک ">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="mb-3">
                                        <label for="pwd"> عکس  :</label>
                                        <input type="file" name="img" class="form-control form-control-sm">
                                    </div>
                                </div>
                    
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-3">
                                        <label for="pwd"> متن اعلانات   :</label>
                                        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
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

        <div class="tab-pane fade accordion-item" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
            <h2 class="accordion-header d-lg-none" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            تنظیمات مالی 
                    </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse d-lg-block" aria-labelledby="headingThree" data-bs-parent="#myTabContent">
                    <div class="accordion-body">
                        <h1>financial setting</h1>
                    </div>
            </div>
        </div>
    </div>

</div>

@endsection
