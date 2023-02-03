@extends('admin.layout')
@section('content')

<div class="container mt-5 bg-white pt-3 rounded-3">
        <div class="row" style=" padding: 13px; border-radius: 10px; margin: 5px;">
                <div class="col-lg-4">
                    <select class="form-select form-select-ms mb-3" aria-label=".form-select-lg example">
                        <option selected> انتخاب حسابات مالی  </option>
                        <option value="1"> 1 </option>
                        <option value="2"> 2 </option>
                        <option value="3"> 3 </option>
                    </select>
                </div>

                <div class="col-lg-3">
                     <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm"> از تاریخ  </span>
                        <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
                <div class="col-lg-3">
                     <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm"> تا تاریخ  </span>
                        <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
            
                <div class="col-lg-2">
                    <button class="btn btn-info btn-md"> بروز رسانی  <i class="fa fa-refresh"> </i> </button>
                </div>
        </div>
        <div class="row">
        <table class="table table-bordered select-highlight evisaDataTable">
                <thead class="bg-info">
                    <tr class="docsTr">
                        <th> ردیف </th>
                        <th>اسم شرکت </th>
                        <th> تعداد فورمها</th>
                        <th>تعداد فورمهای تایید نشده </th>
                        <th> بدهکار </th>
                    </tr>
                </thead>
                <tbody id="financeListBody">
                    @foreach($reports as $report)
                        <tr class="docsTr">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$report->Name}}</td>
                            <td>{{$report->countDocument}}</td>
                            <td>{{$report->countNotOkeDocument}}</td>
                            <td>{{$report->debets}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


@endsection
