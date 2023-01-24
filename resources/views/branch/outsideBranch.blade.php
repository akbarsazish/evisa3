@extends('admin.layout')
@section('content')

    <div class="container bg-white mt-3 rounded-2 p-4 shadow">
        <div class="row mt-2">
            <div class="col-lg-3">
                <div class="mb-3">
                     <h4 class="title"> لیست شرکت ها  </h4>
                </div>
            </div>
            <div class="col-lg-9 text-end px-0">
                <form action="{{url('/showOutBranchDetails')}}" method="get" style="display:inline">
                    <input type="hidden" id="selectedBranchIDDetail" name="branchID">
                    <button type="submit" disabled class="btn btn-sm btn-info" id="showOutDetails"> نمایش جزئیات شرکت <i class="fa fa-info"></i> </button> &nbsp;
                </form>
                    <button type="button" disabled class="btn btn-sm btn-warning" id="editOutBranchBtn" > ویرایش <i class="fa fa-edit"></i> </button> &nbsp;
                    <button type="button" disabled class="btn btn-sm btn-warning" id="okeOutBranchBtn" > تایید شرکت <i class="fa fa-edit"></i> </button> &nbsp;
                    <button type="button" disabled class="btn btn-sm btn-danger" id="deleteOutBranche"> حذف <i class="fa fa-trash"></i> </button>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 ">
                <table class="table table-bordered select-highlight evisaDataTable">
                <thead>
                        <tr class="docsTr">
                            <th> ردیف </th>
                            <th> نام شرکت  </th>
                            <th> نمبر جواز  </th>
                            <th>  شماره تماس  </th>
                            <th>  اسم رئیس یا معاون شرکت  </th>
                            <th> کد شعبه  </th>
                            <th> امتیاز مثبت </th>
                            <th> امتیاز منفی </th>
                            <th> تعداد فورم </th>
                            <th> وضعیت تایید</th>
                            <th> انتخاب </th>
                        </tr>
                    </thead>
                    <tbody id="branchListBody">
                        @foreach($branches as $branch)
                        <tr class="docsTr"  onclick="selectTableTrOutBranch(this)">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$branch->Name}}</td>
                                <td>{{$branch->JawazNumber}}</td>
                                <td>{{$branch->CellPhone}}</td>
                                <td>{{$branch->BossName}}</td>
                                <td>{{$branch->BranchCode}}</td>
                                <td>{{$branch->doLike}}</td>
                                <td>{{$branch->disLike}}</td>
                                <td>{{$branch->countDoc}}</td>
                                <td>@if($branch->isOke==0) تایید نشده @else تایید شده @endif</td>
                                <td>
                                    <span class="form-check">
                                    {{$branch->BranchSn}}
                                        <input class="form-check-input " type="radio" name="branchId" id="" value="{{$branch->BranchSn}}">
                                    </span>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
  <!--- modal for editing docs list -->
  <div class="modal" id="editBranchList" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel">
            <div class="modal-dialog modal-dialog-scrollable modal-lg ">
                <div class="modal-content">
                    <div class="modal-header bg-info">
						<button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h6 class="modal-title" id="exampleModalLabel"> ویرایش شرکت</h6>
                    </div>
                         <div class="modal-body">
                         <form action="{{url('/editBranch')}}" method="Post" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="BranchId" id="BranchId">
                             <div class="row"> 
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="email"> نام شرکت :</label>
                                            <input type="text" name="Name" id="branchName" class="form-control form-control-sm" placeholder="شرکت سیاحتی کاروان عشق">
                                        </div>          
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="pwd">کد شرکت  :</label>
                                            <input type="text" name="BranchCode" id="BranchCode" class="form-control form-control-sm" placeholder="08">
                                        </div>
                                    </div>
                             </div>
                             <div class="row"> 
                                    <div class="col-lg-6">
                                         <div class="mb-3">
                                            <label for="email" class="required"> شماره تماس :  </label>
                                            <input type="number" name="cellPhone" class="form-control form-control-sm" placeholder="0706909063" maxlength="10"   minlength="10" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                            <label for="email" class="required">1  شماره تماس :  </label>
                                            <input type="number" name="cellPhone" class="form-control form-control-sm" placeholder="0706909063" maxlength="10"   minlength="10" required>
                                        </div>
                                    </div>
                             </div>
                             <div class="row"> 
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="pwd">نام کاربری:</label>
                                            <input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="aliAhmadi" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="pwd">رمز کاربری:</label>
                                            <input type="text" name="password" id="password" class="form-control form-control-sm" placeholder="08A@" required>
                                        </div>
                                    </div>
                             </div>
                             <div class="row"> 
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="pwd"> نمبر جواز :</label>
                                            <input type="number" name="JawazNumber" class="form-control form-control-sm" placeholder="25365980" maxlength="16"   minlength="5" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="pwd"> اسم و تخلص رئیس یا معاون شرکت ثبت نام شونده :</label>
                                            <input type="text" name="BossName" class="form-control form-control-sm" placeholder="علی زمانی" maxlength="64"   minlength="3" required>
                                        </div>
                                    </div>
                             </div>
                             <div class="row"> 
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="pwd">  آدرس :</label>
                                            <input type="text" name="Address" id="BranchAddress" class="form-control form-control-sm" placeholder="کابل دشت برچی ">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="pwd" class="required">  سکن جواز  :</label>
                                            <input type="file" name="jawazPicture" class="form-control form-control-sm" onchange="document.getElementById('editJawazPic').src = window.URL.createObjectURL(this.files[0])" required>
                                            <img id="editJawazPic" alt="سکن جواز" width="222" height="100" />
                                       </div>
                                    </div>
                             </div>
                             <div class="row">
                                 <div class="col-lg-6 col-md-6">
                                    <div class="mb-3">
                                        <label for="pwd" class="required">  سکن پاسپورت یا تذکره شخص ثبت نام کننده  :</label>
                                        <input type="file" name="jawazPicture" class="form-control form-control-sm" onchange="document.getElementById('editJawazPic').src = window.URL.createObjectURL(this.files[0])" required>
                                        <img id="editJawazPic" alt="پاسپورت یا تذکره" width="222" height="100" />
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6">
                                    <div class="mb-3">
                                        <label for="pwd" class="required"> عکس یا لوگوی شرکت :</label>
                                        <input type="file" name="jawazPicture" class="form-control form-control-sm" onchange="document.getElementById('eidPassOrTazker').src = window.URL.createObjectURL(this.files[0])" required>
                                        <img id="eidPassOrTazker" alt=" لوگو یا عکس " width="222" height="100" />
                                    </div>
                                 </div>
                                
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
   
@endsection
