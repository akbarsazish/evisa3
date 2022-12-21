@extends('admin.layout')
@section('content')
    <div class="container bg-white mt-3 rounded-2 p-4">
        <div class="row mt-2">
            <div class="col-lg-3">
                <div class="mb-3">
                     <h4 class="title"> جزءیات شرکت ({{$branch->Name}}) </h4>
                </div>
            </div>
            <div class="col-lg-9 text-end">
                <form action="{{url('/listBranchDocs')}}" method="get" style="display:inline">
                    <input type="hidden" id="selectedBranchID" name="branchID">
                    <button type="submit" disabled class="btn btn-sm btn-info" id="showDetails"> نمایش فورمها <i class="fa fa-info"></i> </button> &nbsp;
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
                            <th> نام شرکت  </th>
                            <th> نمبر جواز  </th>
                            <th>  شماره تماس  </th>
                            <th>  اسم رئیس یا معاون شرکت  </th>
                            <th> کد شعبه  </th>
                            <th> آدرس </th>
                            <th> نا تایید </th>
                            <th> رد شده ها </th>
                            <th> تایید شده ها </th>
                            <th> همه فورمها </th>
                            <th> مبلغ قابل پرداخت</th>
                            <th> انتخاب </th>
                        </tr>
                    </thead>
                    <tbody id="branchListBody">
                        
                        <tr class="docsTr"  onclick="selectTableTrBranch(this)">
                                <td>{{$branch->Name}}</td>
                                <td>{{$branch->JawazNumber}}</td>
                                <td>{{$branch->CellPhone}}</td>
                                <td>{{$branch->BossName}}</td>
                                <td>{{$branch->BranchCode}}</td>
                                <td>{{$branch->Address}}</td>
                                
                                <td>{{$countAllNewDocs}}</td>
                                <td>{{$countAllNotOkeDocs}}</td>
                                <td>{{ $countAllOkeDocs}}</td>
                                <td>{{$countAllDocs}}</td>
                                <td>{{$allMoneyToGive}} اف</td>
                                <td>
                                    <span class="form-check">
                                        <input class="form-check-input " type="radio" name="branchId" id="" value="{{$branch->BranchSn}}">
                                    </span>
                                </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection