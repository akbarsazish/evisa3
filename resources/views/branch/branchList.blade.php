@extends('admin.layout')
@section('content')

    <div class="container bg-white mt-3 rounded-2 p-4">
        <div class="row mt-2">
            <div class="col-lg-3">
                <div class="mb-3">
                     <h4 class="title"> لیست شرکت ها  </h4>
                </div>
            </div>
            <div class="col-lg-9 text-end">
                <form action="{{url('/listBranchDocs')}}" method="get" style="display:inline">
                    <input type="hidden" id="selectedBranchID" name="branchID">
                    <button type="submit" disabled class="btn btn-sm btn-info" id="showBranchForms"> نمایش فورمها <i class="fa fa-info"></i> </button> &nbsp;
                </form>
                <form action="{{url('/showBranchDetails')}}" method="get" style="display:inline">
                    <input type="hidden" id="selectedBranchIDDetail" name="branchID">
                    <button type="submit" disabled class="btn btn-sm btn-info" id="showDetails"> نمایش جزءیات شرکت <i class="fa fa-info"></i> </button> &nbsp;
                </form>

                    <button type="button" disabled class="btn btn-sm btn-warning" id="editBranchBtn" > ویرایش <i class="fa fa-edit"></i> </button> &nbsp;
                    <button type="button" disabled class="btn btn-sm btn-danger" id="deleteBranche"> حذف <i class="fa fa-trash"></i> </button>
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
                            <th> تعداد فورم </th>
                            <th> انتخاب </th>
                        </tr>
                    </thead>
                    <tbody id="branchListBody">
                        @foreach($branches as $branch)
                        <tr class="docsTr"  onclick="selectTableTrBranch(this)">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$branch->Name}}</td>
                                <td>{{$branch->JawazNumber}}</td>
                                <td>{{$branch->CellPhone}}</td>
                                <td>{{$branch->BossName}}</td>
                                <td>{{$branch->BranchCode}}</ bnmtd>
                                <td>{{$branch->countDoc}}</td>
                                <td>
                                    <span class="form-check">
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
                    <div class="modal-header">
						<button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h5 class="modal-title" id="exampleModalLabel"> ویرایش شعبه </h5>
                    </div>
                         <div class="modal-body">
                         <form action="{{url('/editBranch')}}" method="Post" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="BranchId" id="BranchId">
                          <div class="row"> 
                            <div class="col-lg-12">
                                <form action="/action_page.php">
                                    <div class="mb-3 mt-3">
                                        <label for="email"> نام شعبه :</label>
                                        <input type="text" name="Name" id="branchName" class="form-control form-control-sm" placeholder="شرکت سیاحتی کاروان عشق">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pwd">کد شعبه :</label>
                                        <input type="text" name="BranchCode" id="BranchCode" class="form-control form-control-sm" placeholder="08">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pwd">نام کاربری:</label>
                                        <input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="08">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pwd">رمز کاربری:</label>
                                        <input type="text" name="password" id="password" class="form-control form-control-sm" placeholder="08">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pwd">  آدرس :</label>
                                        <input type="text" name="Address" id="BranchAddress" class="form-control form-control-sm" placeholder="کابل دشت برچی ">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pwd"> عکس:</label>
                                        <input type="file" name="picture" id="BranchPicture" class="form-control form-control-sm">
                                    </div>
                             </div>
                           </div>
                         </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="">  انصراف <i class="fa fa-xmark"></i></button>
                                <button type="submit" class="btn btn-primary">ذخیره <i class="fa fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   
@endsection
