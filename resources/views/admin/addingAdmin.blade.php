@extends('admin.layout')
@section('content')

<div class="container rounded-2 shadow" style="background-color:#fff; padding:20px;margin-top:20px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <h4> افزودن ادمین </h4>
                @if(isset($error))
            <div class="row"><h3 style="color:red">{{$error}}</h3></div>
            @endif
            </div>
           
              <form action="{{url('/addAdmin')}}" method="post" enctype="multipart/form-data">
                @csrf
               <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="email"> نام و نام خانوادگی :</label>
                            <input type="text" name="name" class="form-control form-control-sm"  required minlength="3"> 
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="pwd"> نام کابری :</label>
                            <input type="text" name="username" onkeyup="checkAdminExistBefor(this)" class="form-control form-control-sm" required minlength="3">
                            <span style="color:red;display:none" id="adminExistError">این نام کاربری قبلا گرفته شده است</span>
                        </div>
                    </div>
               </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="email"> رمز عبور:</label>
                            <input type="password" name="password" class="form-control form-control-sm"  required minlength="3" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="pwd">  آدرس :</label>
                            <input type="text" name="address"  class="form-control form-control-sm" required  minlength="3">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="email"> شماره تماس  </label>
                            <input type="number" name="cellPhone" class="form-control form-control-sm" required  minlength="10">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="pwd"> 2 شماره تماس :</label>
                            <input type="number" name="otherPhone" class="form-control form-control-sm" minlength="10">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <select class="form-select form-select-sm" name="gender" aria-label=".form-select-sm example" required >
                            <option selected>جنسیت </option>
                            <option value="1">مرد</option>
                            <option value="0">زن </option>
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <select class="form-select form-select-sm" name="adminType" aria-label=".form-select-sm example" required >
                            <option selected>نوع کاربر </option>
                            <option value="1">ادمین </option>
                            <option value="2"> کارمند </option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="pwd"> عکس:</label>
                            <input type="file" name="picture" class="form-control form-control-sm" onchange="document.getElementById('addUserPic').src = window.URL.createObjectURL(this.files[0])" required>
                            <img id="addUserPic" alt="عکس فرد " width="222" height="100" />
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