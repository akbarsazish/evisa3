@extends('admin.layout')
@section('content')

<div class="container rounded-2" style="background-color:#fff; padding:20px;margin-top:20px;">
    <div class="row">
        <div class="col-lg-12">
            <h4> افزودن شرکت  </h4>
            <form action="{{url('/addBranch')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="email"> نام شرکت :</label>
                            <input type="text" name="name" class="form-control form-control-sm" placeholder="شرکت سیاحتی کاروان عشق">
                         </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ">
                            <label for="email"> نمبر جواز :</label>
                            <input type="number" name="JawazNumber" class="form-control form-control-sm" placeholder="25365980">
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="email"> شماره تماس 1:  </label>
                            <input type="number" name="cellPhone" class="form-control form-control-sm" placeholder="0706909063">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="email">  شماره تماس 2 :</label>
                            <input type="number" name="otherPhone" class="form-control form-control-sm" placeholder="0796909063">
                         </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="email"> نام کاربری</label>
                            <input type="text" name="username" class="form-control form-control-sm" placeholder="aliAhmadi">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="pwd"> رمز کاربری :</label>
                            <input type="password" name="password" class="form-control form-control-sm" placeholder="08">
                        </div>
                    </div>
                </div>

                <div class="row">
                   <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="pwd"> اسم و تخلص رئیس یا معاون شرکت ثبت نام شونده </label>
                            <input type="text" name="BossName" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="pwd"> عکس فرد یا لوگوی شرکت:</label>
                            <input type="file" name="picture" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="pwd">  سکن جواز  :</label>
                            <input type="file" name="jawazPicture" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="pwd"> سکن پاسپورت یا تذکره شخص ثبت نام کننده:</label>
                            <input type="file" name="tazkiraPicture" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="pwd">  آدرس :</label>
                            <input type="text" name="Address" class="form-control form-control-sm" placeholder="کابل دشت برچی ">
                        </div>
                    </div>
               
                  <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="pwd">  کد شرکت :</label>
                            <input type="number" name="code" class="form-control form-control-sm" placeholder="001">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">ذخیره <i class="fa fa-save"></i></button>
            </form>
        </div>
    </div>
</div>


@endsection