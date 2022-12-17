@extends('admin.layout')
@section('content')

<div class="container rounded-2" style="background-color:#fff; padding:20px;margin-top:20px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <h4> افزودن ادمین </h4>
            </div>
           
              <form action="/action_page.php">
               <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="email"> نام و نام خانوادگی :</label>
                            <input type="text" class="form-control form-control-sm" placeholder="علی احمدی">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="pwd"> نام کابری :</label>
                            <input type="text" class="form-control form-control-sm" placeholder="aliAhmadi">
                        </div>
                    </div>
               </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="email"> رمز عبور:</label>
                            <input type="password" class="form-control form-control-sm" placeholder="abc@123">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="pwd">  آدرس :</label>
                            <input type="text" class="form-control form-control-sm" placeholder="کابل دشت برچی ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="email"> شماره تماس  </label>
                            <input type="number" class="form-control form-control-sm" placeholder="0093706909063">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="pwd"> 2 شماره تماس :</label>
                            <input type="number" class="form-control form-control-sm" placeholder="0093706909063">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>جنسیت </option>
                            <option value="1">مرد</option>
                            <option value="2">زن </option>
                            <option value="3">دیگر</option>
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>نوع کاربر </option>
                            <option value="1">ادمین </option>
                            <option value="2"> کارمند </option>
                        </select>
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


@endsection