@extends('admin.layout')
@section('content')

<div class="container p-3 mt-2 rounded-2">
        <div class="row">
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
                </div>
           

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
