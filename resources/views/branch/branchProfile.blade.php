@extends('admin.layout')
@section('content')

    <div class="container mt-4 bg-white rounded-3 shadow-sm">
        <div class="row p-4">
            <div class="col-lg-3 col-md-3 col-sm-12 rounded-3  shadow">
                <div class="text-center card-box">
                    <div class="member-card pt-2 pb-2">
                        <div class="thumb-lg member-thumb mx-auto">
                            <img class="img-responsive rounded-circle" width="66px" height="66px" src="{{url('/resources/assets/images/branches/'.Session::get('userId').'.jpg')}}" alt="logo"> 
                        </div>
                        <div class="my-2">
                            <h6> {{ Session::get('name') }} </h6>
                        </div>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mt-3">
                                        <h4>2563</h4>
                                        <p class="mb-0 text-muted"></p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mt-3">
                                        <h4>6952</h4>
                                        <p class="mb-0 text-muted">Income amounts</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mt-3">
                                        <h4>1125</h4>
                                        <p class="mb-0 text-muted">Total Transactions</p>
                                    </div>
                                </div>
                            </div>
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
                                            <input type="text" name="name" id="name" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="pwd"> نام کابری :</label>
                                            <input type="text" name="username" id="username" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="email"> رمز عبور:</label>
                                            <input type="password" name="password" id="password" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="pwd">  آدرس :</label>
                                            <input type="text" name="address" id="address" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="email"> شماره تماس  </label>
                                            <input type="number" name="cellPhone" id="cellPhone" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="pwd"> 2 شماره تماس :</label>
                                            <input type="number" name="otherPhone" id="otherPhone" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <select class="form-select form-select-sm" name="gender" id="gender" aria-label=".form-select-sm example">
                                            <option selected>جنسیت </option>
                                            <option value="1">مرد</option>
                                            <option value="2">زن </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <select class="form-select form-select-sm" name="adminType" id="adminType" aria-label=".form-select-sm example">
                                            <option selected>نوع کاربر </option>
                                            <option value="1">ادمین </option>
                                            <option value="2"> کارمند </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="pwd"> عکس:</label>
                                        <input type="file" id="picture" name="picture" class="form-control form-control-sm">
                                    </div>
                                </div>

                            <div class="modal-footer">
                                    <button type="button" class="btn btn-danger mx-3" id="">  انصراف <i class="fa fa-xmark"></i></button> 
                                    <button type="submit" class="btn btn-primary">ذخیره <i class="fa fa-save"></i></button>
                            </div>
                      </form>
                 </div>
            </div>
        </div>
     </div>

@endsection
