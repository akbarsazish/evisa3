@extends('admin.layout')
@section('content')

<div class="container bg-white mt-2 rounded-2">
    <div class="row mt-1">
        <h4 class="title"> جزءیات سند</h4>
    </div>
      <div class="row mt-2">
            <div class="col-lg-3">
                    <div class="mb-3">
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected> فلتر اسناد </option>
                        <option value="1"> تایید شده </option>
                        <option value="1">تایید ناشده </option>
                        <option value="1"> رد شده </option>
                    </select>
                </div>
            </div> 
            <div class="col-lg-9 text-end">
                @if(Session::get("userSession")==1 or Session::get("userSession")==2)
                    <button type="button" class="btn btn-sm btn-info" id="printDocumentBtn"> چاپ <i class="fa fa-print"></i> </button> &nbsp;
                @endif
            </div>
        </div>

        <div class="brancheDetails">
                    <div class="branchItem">
                         <span class="item">  نام    </span> : {{$doc->dName}}
                    </div>
                    <div class="branchItem">
                         <span class="item"> نام خانودگی </span> : {{$doc->LastName}}
                    </div>
                    <div class="branchItem">
                         <span class="item">  نام پدر </span> : {{$doc->FatherName}}
                    </div>
                    <div class="branchItem">
                         <span class="item">  تاریخ تولد  </span> : {{$doc->BirthDate}}
                    </div>
                    <div class="branchItem">
                         <span class="item"> محل تولد  </span> : {{$doc->BirthPlace}}
                    </div>
                    <div class="branchItem">
                         <span class="item">  شماره پاسپورت  </span> : {{$doc->PassNo}}
                    </div>
                    <div class="branchItem">
                         <span class="item">  انقضا پاسپورت  </span> : {{$doc->PassEndDate}}
                    </div>
                    <div class="branchItem">
                         <span class="item">   شماره تماس  </span> : {{$doc->dCellPhone}}
                    </div>
                    <div class="branchItem">
                         <span class="item">   شماره تماس فامیل </span> : {{$doc->dOtherPhone}}
                    </div>
                     
                    <div class="branchItem">
                         <span class="item">  کد رهگیری  </span> : {{$doc->RefCode}}
                    </div>
                    <div class="branchItem">
                         <span class="item"> شرکت  </span> : {{$doc->branchName}}
                    </div>
                    <div class="branchItem">
                         <span class="item"> تاریخ مراجعه   </span> : {{$doc->referDate}}
                    </div>
                    <div class="branchItem">
                         <span class="item"> &nbsp; عکس شخص &nbsp; &nbsp; </span> : <img src="{{url('/resources/assets/images/document/person/'.$doc->DocSn.'.jpg')}}" alt="سکن جواز" class="responsive brancheDetailsImg ">
                    </div>

                    <div class="branchItem">
                         <span class="item"> پاسپورت   </span> : <img src="{{url('/resources/assets/images/document/passport/'.$doc->DocSn.'.jpg')}}" alt=" پاسپورت یا تذکره" class="responsive brancheDetailsImg ">
                    </div>
                    <div class="branchItem">
                         <span class="item">  تذکره  </span> : <img src="{{url('/resources/assets/images/document/tazkira/'.$doc->DocSn.'.jpg')}}" alt=" عکس یا لوگو " class="responsive brancheDetailsImg ">
                    </div>
                </div>
            </div>      
        </div>
</div>

@endsection