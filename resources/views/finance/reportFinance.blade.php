@extends('admin.layout')
@section('content')

<div class="container mt-5 bg-white p-2 rounded-3">
        <div class="row" style="background-color: #e0e7eb; padding: 13px; border-radius: 10px; margin: 5px;">
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

        </div> <hr>
        <div class="row">
        <table class="table table-bordered select-highlight evisaDataTable">
              <thead class="bg-info">
                    <tr class="docsTr">
                        <th> ردیف </th>
                        <th> تاریخ  </th>
                        <th> شماره سند </th>
                        <th> شرح حساب  </th>
                        <th> بدهکار </th>
                        <th>  طلبکار  </th>
                        <th>تراز  </th>
                        <th>  ملاحظات  </th>
                    </tr>
                </thead>
                <tbody id="docListBody">
                  
                    <tr class="docsTr">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <span class="form-check">
                                    <input class="form-check-input " type="radio" name="" id="" value="">
                                </span>
                            </td>
                    </tr>
                </tbody>
             </table>
        </div>


@endsection
