@extends('admin.layout')
@section('content')

<div class="container p-3 mt-2 rounded-2">
        <div class="row">
            <div class="col-lg-6 p-2 d-flex justify-content-start">
                <a href="{{url('adminDashboardFinance')}}" class="activeLink">  <i class="fa fa-chart-line fa-lg"></i>  گزارش مالی  </a>
            </div>
                <div class="col-lg-6 p-2 d-flex justify-content-end">
                <a href="tel:070007000"> <button type="button" class="btn btn-danger btn-sm"> تماس با ادمین    &nbsp; <i class="fa fa-phone"></i> </button> </a> 
                </div>
        </div>
        <div class="row">
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
        </div>
 </div>


@endsection
