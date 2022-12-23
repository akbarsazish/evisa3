@extends('admin.layout')
@section('content')
    <div class="container bg-white mt-3 rounded-2 p-4">
        <div class="row mt-2">
                <div class="col-lg-4">
                    <div class="mb-3">
                        <h5 class="title"> جزءیات شرکت ({{$branch->Name}}) </h5>
                    </div>
                </div>
                <div class="col-lg-8 text-end">
                    <form action="{{url('/listBranchDocs')}}" method="get" style="display:inline">
                        <input type="hidden" id="selectedBranchID" name="branchID">
                        <button type="submit" disabled class="btn btn-sm btn-info" id="showDetails"> نمایش فورمها <i class="fa fa-info"></i> </button> &nbsp;
                    </form>

                        <button type="button" disabled class="btn btn-sm btn-warning" id="editBranchBtn" > ویرایش <i class="fa fa-edit"></i> </button> &nbsp;
                        <button type="button" disabled class="btn btn-sm btn-danger" id="deleteBranche"> حذف <i class="fa fa-trash"></i> </button>
                </div>
            </div>
            <div class="row">
            <div class="brancheDetails">
                    <div class="branchItem">
                         <span class="item">  نام شرکت   </span> : {{$branch->Name}}
                    </div>
                    <div class="branchItem">
                         <span class="item">  نمبر جواز  </span> : {{$branch->JawazNumber}}
                    </div>
                    <div class="branchItem">
                         <span class="item">   شماره تماس  </span> : {{$branch->CellPhone}}
                    </div>
                    <div class="branchItem">
                         <span class="item">  اسم رئیس یا معاون شرکت  </span> : {{$branch->BossName}}
                    </div>
                    <div class="branchItem">
                         <span class="item">  کد شعبه  </span> : {{$branch->BranchCode}}
                    </div>
                    <div class="branchItem">
                         <span class="item">  آدرس </span> : {{$branch->Address}}
                    </div>
                    <div class="branchItem">
                         <span class="item">  تایید نشده  </span> : {{$countAllNewDocs}}
                    </div>
                    <div class="branchItem">
                         <span class="item">   رد شده ها  </span> : {{$countAllNotOkeDocs}}
                    </div>
                    <div class="branchItem">
                         <span class="item">  تایید شده ها  </span> : {{ $countAllOkeDocs}}
                    </div>
                     
                    <div class="branchItem">
                         <span class="item">  همه فورمها  </span> : {{$countAllDocs}}
                    </div>
                    <div class="branchItem">
                         <span class="item"> مبلغ قابل پرداخت   </span> : {{$allMoneyToGive}} اف
                    </div>
                    <div class="branchItem docsTr"  onclick="selectTableTrBranch(this)">
                         <span class="item">  انتخاب   
                            <input class="form-check-input " type="radio" name="branchId" id="" value="{{$branch->BranchSn}}">
                        </span>
                    </div>
                    <div class="branchItem">
                         <span class="item"> &nbsp; سکن جواز  &nbsp; &nbsp; </span> : <img src="{{url('/resources/assets/images/branches/jawaz/'.$branch->BranchSn.'.jpg')}}" alt="سکن جواز" class="responsive brancheDetailsImg ">
                    </div>

                    <div class="branchItem">
                         <span class="item"> پاسپورت یا تذکره شخص ثبت نام کننده </span> : <img src="{{url('/resources/assets/images/branches/tazkira/'.$branch->BranchSn.'.jpg')}}" alt=" پاسپورت یا تذکره" class="responsive brancheDetailsImg ">
                    </div>
                    <div class="branchItem">
                         <span class="item"> عکس فرد یا لوگوی شرکت </span> : <img src="{{url('/resources/assets/images/branches/users/'.$branch->BranchSn.'.jpg')}}" alt=" عکس یا لوگو " class="responsive brancheDetailsImg ">
                    </div>
                </div>
            </div>

    </div>
    @endsection