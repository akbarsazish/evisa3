@extends('admin.layout')
@section('content')

<div class="container rounded-2" style="background-color:#fff; padding:20px;margin-top:20px;">
    <div class="row">
        <div class="col-lg-12">
            <h4> افزودن شرکت  </h4>
            @if(isset($error))
            <div class="row"><h3 style="color:red">{{$error}}</h3></div>
            @endif
            <form action="{{url('/addBranchOut')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="email" class="required"> نام شرکت :</label>
                            <input type="text" name="name" class="form-control form-control-sm" placeholder="شرکت سیاحتی کاروان عشق" maxlength="64"   minlength="3" required>
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 ">
                            <label for="email" class="required"> نمبر جواز :</label>
                            <input type="number" name="JawazNumber" class="form-control form-control-sm" placeholder="25365980" maxlength="16"   minlength="5" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="email" class="required"> شماره تماس 1:  </label>
                            <input type="number" name="cellPhone" class="form-control form-control-sm" placeholder="0706909063" maxlength="10"   minlength="10" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="email" >  شماره تماس 2 :</label>
                            <input type="number" name="otherPhone" class="form-control form-control-sm" placeholder="0796909063" maxlength="10"   minlength="10">
                         </div>
                    </div>
                
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="email" class="required"> نام کاربری</label>
                            <input type="text" onkeyup="checkUserNameExistance(this)" name="username" class="form-control form-control-sm" placeholder="aliAhmadi"  minlength="3" required>
                            <span id="userExistError" style="color:red;display:none;"> این نام کاربری قبلا گرفته شده است</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="pwd" class="required"> رمز کاربری :</label>
                            <input type="password" name="password" class="form-control form-control-sm" placeholder="08aQ#!q" maxlength="12"   minlength="3" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                   <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="pwd"> اسم و تخلص رئیس یا معاون شرکت ثبت نام شونده </label>
                            <input type="text" name="BossName" class="form-control form-control-sm" placeholder="علی زمانی" maxlength="64"   minlength="3" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="pwd" class="required">  آدرس :</label>
                            <input type="text" name="Address" class="form-control form-control-sm" placeholder="کابل دشت برچی" maxlength="72"   minlength="3" required>
                        </div>
                    </div>
               
                  <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="pwd">  کد شرکت :</label>
                            <input type="number" name="code" class="form-control form-control-sm" placeholder="001"   minlength="2" required>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="pwd" class="required">  سکن جواز  :</label>
                            <input type="file" name="jawazPicture" class="form-control form-control-sm" onchange="document.getElementById('jawazPic').src = window.URL.createObjectURL(this.files[0])" required>
                            <img id="jawazPic" alt="سکن جواز" width="222" height="100" required/>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="pwd" class="required"> سکن پاسپورت یا تذکره شخص ثبت نام کننده:</label>
                            <input type="file" name="tazkiraPicture" class="form-control form-control-sm" onchange="document.getElementById('personDoc').src = window.URL.createObjectURL(this.files[0])" required>
                            <img id="personDoc" alt="پاسپورت یا تذکره" width="222" height="100" required/>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="pwd" class="required"> عکس فرد یا لوگوی شرکت:</label>
                            <input type="file" name="picture" class="form-control form-control-sm" onchange="document.getElementById('personOrlogoPic').src = window.URL.createObjectURL(this.files[0])" required>
                            <img id="personOrlogoPic" alt="عکس فرد یا لوگو" width="222" height="100" required/>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">ذخیره <i class="fa fa-save"></i></button>
            </form>
        </div>
    </div>
</div>



@endsection