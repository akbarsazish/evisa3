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



        <!-- <div class="row">
            <div class="col-lg-6 p-2 d-flex justify-content-start">
                <a href="{{url('adminDashboardFinance')}}" class="activeLink">  <i class="fa fa-chart-line fa-lg"></i>  گزارش مالی  </a>
            </div>
            <div class="col-lg-6 p-2 d-flex justify-content-end">
                
            </div>
            </div>

                <div class="row p-4 rounded-3" style="background-image: linear-gradient(to right, #ffffff,#3fa7ef,#3fa7ef)">
                    <div class="col-md-2 col-sm-6">
                        <div class="counter">
                            <div class="counter-icon">
                                <i class="fa fa-group"></i>
                            </div>
                            <h3>  شعبات   </h3>
                            <span class="counter-value">23</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="counter orange">
                            <div class="counter-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <h3> تایید شده ها </h3>
                            <span class="counter-value">3423</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="counter blue">
                            <div class="counter-icon">
                                <i class="fa fa-toggle-on"></i>
                            </div>
                            <h3> معلق ها </h3>
                            <span class="counter-value">234</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="counter blue">
                            <div class="counter-icon">
                                <i class="fa fa-toggle-off"></i>
                            </div>
                            <h3> رد شده ها </h3>
                            <span class="counter-value">12</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="counter green">
                            <div class="counter-icon">
                                <i class="fa fa-sign-out"></i>
                            </div>
                            <h3> قرضدار </h3>
                            <span class="counter-value"> 20000 </span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="counter green">
                            <div class="counter-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <h3> جمع کل پول </h3>
                            <span class="counter-value">800000000</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="counter red">
                            <div class="counter-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <h3> مجموع کاربر </h3>
                            <span class="counter-value">450</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="counter blue">
                            <div class="counter-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <h3> </h3>
                            <span class="counter-value">450</span>
                        </div>
                    </div>
                </div> -->
           

        <!-- <div class="row">
            <div class="col-md-3">
                <div class="card h-100 dashboardCard">
                    <a class=" stretched-link" href="{{url('/allCustomers')}}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="large fw-bold">لیست کل مشتریان</div>
                                    <div class="text-xxl fw-bold"></div>
                                </div>
                                <i class="fa fa-home fa-3x" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small"></div>
                    </a>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card  h-100 dashboardCard">
                    <a class=" stretched-link" href="{{url('/karbarAction')}}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="fw-bold">عمل کرد کاربران</div>
                                    <div class="text-lg fw-bold"></div>
                                </div>
                                <i class="fa fa-user fa-3x" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <div class=""></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 dashboardCard">
                <a class=" stretched-link" href="{{url('/crmSetting')}}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="-75 fw-bold">مدیریت اختصاصی سایت</div>
                                <div class="text-lg fw-bold"></div>
                            </div>
                            <i class="fa fa-cog fa-3x" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <div class=""></div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 dashboardCard">
                <a class=" stretched-link" href="{{url('/reports')}}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="-75 fw-bold ">گزارشات</div>
                                <div class="text-lg fw-bold"></div>
                            </div>
                            <i class="fa-solid fa-chart-mixed fa-3x"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <div class=""></div>
                    </div>
                    </a>
                </div>
            </div>
         </div>
         <br>
         <br>
          <div class="row">
            <div class="col-md-6">
                <div class="card h-100 dashboardCard">
                  <a class=" stretched-link" href="{{url('/referedCustomer')}}" target="_blank">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="fw-bold"> ارجاعات </div>
                                <div class="text-lg fw-bold"></div>
                            </div>
                            <i class="fa fa-history fa-3x" aria-hidden="true"></i>
                            </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                       <div class=""></div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 dashboardCard">
                  <a class="stretched-link" href="{{url('/customerLocation')}}" target="_blank">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="-75 fw-bold">موقعیت مشتری </div>
                                <div class="text-lg fw-bold"></div>
                            </div>
                            <i class="fas fa-map-marker-alt fa-3x" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                       <div class=""></div>
                    </div>
                    </a>
                </div>
            </div>
        </div> -->
 </div>


@endsection
