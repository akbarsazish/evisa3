@extends('admin.layout')
@section('content')

    <div class="container mt-4 bg-white rounded-3 shadow-sm">
        <div class="row p-4">
            <div class="col-lg-3 col-md-3 col-sm-12 rounded-3  shadow" style="background-image: linear-gradient(#ffffff,#d6e5f0,#b5daf5);">
            <div class="text-center card-box">
                    <div class="member-card pt-2 pb-2">
                        <div class="thumb-lg member-thumb mx-auto">
                            @if(Session::get("userSession")==1 or Session::get("userSession")==2)
                                <img class="img-responsive rounded-circle" width="88px" height="88px" src="{{url('/resources/assets/images/admins/'.Session::get('userId').'.jpg')}}" alt="logo"> 
                            @else
                                <img class="img-responsive rounded-circle" width="88px" height="88px" src="{{url('/resources/assets/images/branches/users/'.Session::get('userId').'.jpg')}}" alt="logo"> 
                            @endif
                        </div>
                        <div class="my-3">
                            <h6> {{ Session::get('name') }} </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-12">
                         <form action="{{url('/editAdmin')}}" method="Post" enctype="multipart/form-data" >
                            @csrf
                          <input type="hidden" name="AdminID" id="AdminID"/>
                            <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="email"> نام و نام خانوادگی :</label>
                                            <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="علی احمدی" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="pwd"> نام کابری :</label>
                                            <input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="aliAhmadi" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="email"> رمز عبور:</label>
                                            <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="abc@123" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="pwd">  آدرس :</label>
                                            <input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="کابل دشت برچی " required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="email"> شماره تماس  </label>
                                            <input type="number" name="cellPhone" id="cellPhone" class="form-control form-control-sm" placeholder="0093706909063" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="pwd"> 2 شماره تماس :</label>
                                            <input type="number" name="otherPhone" id="otherPhone" class="form-control form-control-sm" placeholder="0093706909063">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <select class="form-select form-select-sm" name="gender" id="gender" aria-label=".form-select-sm example" required>
                                            <option selected>جنسیت </option>
                                            <option value="1">مرد</option>
                                            <option value="2">زن </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <select class="form-select form-select-sm" name="adminType" id="adminType" aria-label=".form-select-sm example" required>
                                            <option selected>نوع کاربر </option>
                                            <option value="1">ادمین </option>
                                            <option value="2"> کارمند </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="pwd"> عکس:</label>
                                        <input type="file" id="picture" name="picture" class="form-control form-control-sm" required>
                                    </div>
                                </div>

                            <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-danger mx-3" id="">  انصراف <i class="fa fa-xmark"></i></button> 
                                    <button type="submit" class="btn btn-sm btn-primary">ذخیره <i class="fa fa-save"></i></button>
                            </div>
                      </form>
                 </div>
            </div>
        </div>
     </div>

@endsection
