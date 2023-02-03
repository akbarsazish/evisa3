@extends('admin.layout')
@section('content')

<div class="container bg-white mt-3 rounded-2 p-4 shadow">
      <div class="row mt-2">
            <div class="col-lg-3">
                <div class="mb-3">
                     <h4 class="title"> لیست کاربران </h4>
                </div>
            </div>
            <div class="col-lg-9 text-end">
                    <button type="button" disabled class="btn btn-sm btn-info" id="adminDetails" > جزئیات کاربر <i class="fa fa-info-circle"></i> </button> &nbsp;
                    <button type="button" disabled class="btn btn-sm btn-warning" id="editAdminBtn" > ویرایش <i class="fa fa-edit"></i> </button> &nbsp;
                    <button type="button" disabled class="btn btn-sm btn-danger" id="deleteAdminBtn" > حذف <i class="fa fa-trash"></i> </button>
            </div>
        </div>
    <div class="row">
        <input type="hidden" id="selectedAdminID" />
        <div class="col-lg-12 ">
            <input type="hidden" id="">
            <table class="table table-bordered select-highlight evisaDataTable">
              <thead>
                    <tr class="docsTr">
                        <th> ردیف </th>
                        <th> نام و نام خانوادگی </th>
                        <th> شماره تماس </th>
                        <th> شماره تماس </th>
                        <th> نوع کاربر </th>
                        <th> آدرس</th>
                        <th> انتخاب</th>
                    </tr>
                </thead>
                <tbody id="adminListBody">
                    @foreach($admins as $admin)
                    @php 
                    $adminType="کارمند";
                    if($admin->AdminType==1){
                        $adminType="ادمین";
                    }
                    if($admin->AdminType==2){
                        $adminType="کارمند";
                    }
                    @endphp
                        <tr class="docsTr"  onclick="selectTableTr(this)">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$admin->Name}}</td>
                            <td>{{$admin->CellPhone}}</td>
                            <td>{{$admin->OtherPhone}}</td>
                            <td>{{$adminType}}</td>
                            <td>{{$admin->Address}}</td>
                            <td>
                                <span class="form-check">
                                    <input class="form-check-input " type="radio" name="adminId" id="" value="{{$admin->AdminSn}}">
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
             </table>
        </div>
    </div>
 </div>

 
    
  <!--- modal for editing user list -->
      <div class="modal" id="editingUser" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel">
            <div class="modal-dialog modal-dialog-scrollable modal-lg ">
                <div class="modal-content">
                    <div class="modal-header bg-info"> 
						<button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h5 class="modal-title" id="exampleModalLabel"> ویرایش کاربر </h5>
                    </div>
                         <div class="modal-body ">
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
                                          <input type="file" id="picture"  name="picture" class="form-control form-control-sm" onchange="document.getElementById('userPic').src = window.URL.createObjectURL(this.files[0])" required>
                                          <img id="userPic" alt="عکس فرد " width="222" height="100" />
                                    </div>
                                </div>

                            <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-danger" id="">  انصراف <i class="fa fa-xmark"></i></button>
                                    <button type="submit" class="btn btn-sm btn-primary">ذخیره <i class="fa fa-save"></i></button>
                            </div>
                      </form>
                 </div>
            </div>
      </div>
      </div>


        <!-- user Details Modal -->
    <div class="modal fade" id="adminDetailsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="adminDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title fs-6" id="adminDetailsModalLabel"> جزئیات کاربر </h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 rounded-3  shadow">
                        <div class="text-center card-box">
                            <div class="member-card pt-2 pb-2">
                                    <div class="thumb-lg member-thumb mx-auto">
                                        <img class="brancheDetailsImg rounded-circle" width="66px" height="66px" src="{{url('/resources/assets/images/branches/'.Session::get('userId').'.jpg')}}" alt="پروفایل">
                                    </div>
                                    <div class="my-2">
                                        <h6> {{ Session::get('name') }} </h6>
                                    </div>
                              </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                            <div class="userDetails">
                                    <div class="userDetailsItem">
                                           <span class="item"> نام  </span> : علی  
                                    </div>
                                    <div class="userDetailsItem">
                                           <span class="item"> نام خانوادگی  </span> : احمدیان
                                    </div>

                                    <div class="userDetailsItem">
                                           <span class="item"> نام  کاربری  </span> : aliAhmadian
                                    </div>  
                                    <div class="userDetailsItem">
                                           <span class="item">   شماره تماس </span> : 0706909063
                                    </div>
                                    <div class="userDetailsItem">
                                            <span class="item"> شماره تماس 2 </span> : 0706909063
                                    </div>
                                    <div class="userDetailsItem">
                                            <span class="item">  نوع کاربر </span> : admin
                                    </div> 
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"> بستن  <i class="fa fa-xmark"></i> </button>
            </div>
            </div>
        </div>
        </div>
   
@endsection
