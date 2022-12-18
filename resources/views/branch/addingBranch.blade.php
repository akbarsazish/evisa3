@extends('admin.layout')
@section('content')

<div class="container rounded-2" style="background-color:#fff; padding:20px;margin-top:20px;">
    <div class="row">
        <div class="col-lg-12">
            <h4> افزودن شعبه </h4>
            <form action="{{url('/addBranch')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="email"> نام شعبه :</label>
                            <input type="text" name="name" class="form-control form-control-sm" placeholder="شرکت سیاحتی کاروان عشق">
                         </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ">
                            <label for="email"> 1شماره تماس:</label>
                            <input type="text" name="cellPhone" class="form-control form-control-sm" placeholder="شرکت سیاحتی کاروان عشق">
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="email"> 2شماره تماس:</label>
                            <input type="text" name="otherPhone" class="form-control form-control-sm" placeholder="شرکت سیاحتی کاروان عشق">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="email"> 2شماره تماس:</label>
                            <input type="text" name="otherPhone" class="form-control form-control-sm" placeholder="شرکت سیاحتی کاروان عشق">
                         </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="email"> نام کاربری</label>
                            <input type="text" name="username" class="form-control form-control-sm" placeholder="شرکت سیاحتی کاروان عشق">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="pwd"> رمز کاربری :</label>
                            <input type="text" name="password" class="form-control form-control-sm" placeholder="08">
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
                            <label for="pwd"> عکس:</label>
                            <input type="file" name="picture" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">ذخیره <i class="fa fa-save"></i></button>
            </form>
        </div>
    </div>
</div>


@endsection