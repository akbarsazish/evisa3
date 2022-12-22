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
                    <button type="button" class="btn btn-sm btn-success" id="okeDocumentBtn"> تایید <i class="fa fa-check"></i> </button> &nbsp;
                    <button type="button" class="btn btn-sm btn-dark" id="rejectDocumentBtn"> ردکردن <i class="fa fa-xmark"></i> </button> &nbsp;
                @endif
                    <button type="button" class="btn btn-sm btn-warning" id="editDocumentBtn"> ویرایش <i class="fa fa-edit"></i> </button> &nbsp;
                    <button type="button" class="btn btn-sm btn-danger" id="deleteDocumentBtn"> حذف <i class="fa fa-trash"></i> </button>
            </div>
        </div>

    <div class="row">
        <div class="col-lg-12 ">
            <input type="hidden" id="selectedDocID">
                <table class="table table-bordered select-highlight evisaDataTable">
                    <thead>
                        <tr class="docsTr">
                            <th>نام </th>
                            <th>نام خانودگی</th>
                            <th>نام پدر </th>
                            <th>  تاریخ تولد </th>
                            <th>  محل تولد </th>
                            <th> شماره پاسپورت  </th>
                            <th>  انقضا پاسپورت   </th>
                            <th>  شماره تماس </th>
                            <th>  شماره تماس فامیل</th>
                            <th> کد رهگیری  </th>
                            <th> شرکت </th>
                            <th> تاریخ مراجعه  </th>
                            <th> انتخاب </th>
                        </tr>
                    </thead>
                    <tbody id="docListBody">
                        
                        <tr class="docsTr" 
                                            @if($doc->isOke ==2) style="background-color:red!important;" @endif
                                            @if($doc->isOke ==1) style="background-color:green!important;" @endif
                        
                        onclick="selectTableTrDocs(this)">
                                <td>{{$doc->dName}}</td>
                                <td>{{$doc->LastName}}</td>
                                <td>{{$doc->FatherName}}</td>
                                <td>{{$doc->BirthDate}}</td>
                                <td>{{$doc->BirthPlace}}</td>
                                <td>{{$doc->PassNo}}</td>
                                <td>{{$doc->PassEndDate}}</td>
                                <td>{{$doc->dCellPhone}}</td>
                                <td>{{$doc->dOtherPhone}}</td>
                                <td>{{$doc->RefCode}}</td>
                                <td>{{$doc->branchName}}</td>
                                <td>{{$doc->referDate}}</td>
                                <td>
                                    <span class="form-check">
                                        <input class="form-check-input " type="radio" name="exampleRadios" id="exampleRadios2" value="{{$doc->DocSn}}">
                                    </span>
                                </td>
                        </tr>
                    </tbody>
                </table>
</div>
</div>

@endsection