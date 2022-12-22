<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>آسان ویزا </title>
    <link rel="stylesheet" href="{{ url('/resources/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/resources/assets/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ url('/resources/assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('/resources/assets/css/bootstrap-grid.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ url('/resources/assets/css/mainAdmin.css')}}">
    <link rel="stylesheet" href="{{ url('/resources/assets/css/bootstrap-utilities.rtl.min.css')}}">
    <link rel="stylesheet" href="{{ url('/resources/assets/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{ url('/resources/assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ url('/resources/assets/js/jquery.min.js')}}">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="{{ url('/resources/assets/js/jquery-ui.min.js')}}"></script>
    <link rel="icon" type="image/png" href="{{ url('/resources/assets/images/part.png')}}">
</head>
<body>

<div class="container-fluid px-0 mx-0">
            <nav class="navbar navbar-expand-lg  py-0 " style="background-color:#3d80c1">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{url('/adminDashboard')}}">
                        <img style="width:122px; height:auto" src="{{url('resources/assets/images/logo.png')}}" alt="logo" class="responsive">
                </a>
                @if(Session::get("userSession"))
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ps-2">
                            <li class="nav-item" id="adminDashboardHome">
                                <a class="nav-link px-1" aria-current="page" href="{{url('adminDashboard')}}"> <i class="fa fa-home fa-lg"></i> صفحه نخست  </a>
                            </li>
                            @if(Session::get("userSession")=="branch")
                            <li class="nav-item" id="adminDashboardForm">
                                <a class="nav-link px-1" href="{{url('registrationForm')}}"> <i class="fa fa-plus-square fa-lg" aria-hidden="true"></i>  فورم ثبت نام    </a>
                            </li>
                        @endif
                        @if(Session::get("userSession")==1)
                            <li class="nav-item" id="adminDashboardFinace">
                                <a class="nav-link px-1" href="{{url('adminDashboardFinance')}}" > <i class="fa fa-chart-line fa-lg"> </i>گزارش مالی   </a>
                            </li>
                            @endif
                            @if(Session::get("userSession")==2 or Session::get("userSession")=="branch")
                            <li class="nav-item" id="adminDashboardFinace">
                                <a class="nav-link px-1" href="{{url('docsList')}}" > <i class="fa fa-list fa-lg"> </i>  لیست اسناد  </a>
                            </li>
                            @endif
                            @if(Session::get("userSession")==1)
                            <li class="nav-item" id="siteSetting">
                                <a class="nav-link px-1" href="{{url('siteSetting')}}" > <i class="fa fa-cog fa-lg"> </i> تنظیمات </a>
                            </li>
                            @endif
                            @if(Session::get("userSession")==2 or Session::get("userSession")==1)
                            <li class="nav-item" id="addingBranch">
                                <a class="nav-link px-1" href="{{url('addingBranch')}}" > <i class="fa fa-plus fa-lg"> </i> افزودن شرکت </a>
                            </li>
                            @endif
                            @if(Session::get("userSession")==1 or Session::get("userSession")==2)
                            <li class="nav-item" id="branchList">
                                <a class="nav-link px-1" href="{{url('branchList')}}" > <i class="fa fa-list-ol fa-lg" aria-hidden="true"></i> لیست شرکت ها </a>
                            </li>
                            @endif
                            @if(Session::get("userSession")==1 or Session::get("userSession")==2)
                            <li class="nav-item" id="addingAdmin">
                                <a class="nav-link px-1" href="{{url('addingAdmin')}}" > <i class="fa fa-users fa-lg" aria-hidden="true"></i> افزودن کاربر  </a>
                            </li>
                            @endif
                            @if(Session::get("userSession")==1 or Session::get("userSession")==2)
                            <li class="nav-item" id="adminList">
                                <a class="nav-link px-1" href="{{url('adminList')}}" > <i class="fa fa-list fa-lg" aria-hidden="true"></i>  لیست کاربر   </a>
                            </li>
                            @endif
                    </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="جستجو" aria-label="Search">
                        </form> &nbsp;

                        <li class="nav-item dropdown text-black">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-responsive rounded-circle" width="44px" height="44px" src="{{url('/resources/assets/images/loginLog.jpg')}}" alt="logo">   &nbsp; {{ Session::get('name') }}
                            </a>   
                            
                        <ul class="dropdown-menu dropdown-menu-light">
                            <li><a class="dropdown-item logoutSetting text-dark text-start" href="#editingUser" data-bs-toggle="modal" data-bs-target="#editingUser"> پروفایل <i class="fa fa-cog" style="float:left"></i> </a></li>
                            <li><a class="dropdown-item logoutSetting text-dark text-start" href="{{url('/logout')}}"> خروج <i class="fa fa-sign-out" style="float:left"></i> </a></li>
                        </ul>
                    </li>
                    </div>
                @endif
            </div>
         </nav>
    </div>
    @yield('content')
<script src="{{url('/resources/assets/vendor/jquery.countdown.min.js')}}"></script>
<script defer src="{{url('/resources/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('/resources/assets/js/sweetalert.min.js')}}"></script>


<script src="{{url('/resources/assets/vendor/persianumber.min.js')}}"></script>
<script src="{{url('/resources/assets/js/script.js') }}"></script>
<script src="{{url('/resources/assets/js/bootstrap.min.js') }}"></script>
<script src="{{url('/resources/assets/js/datatables.min.js') }}"></script>
<script src="{{url('/resources/assets/js/datatable.fixedheader.min.js') }}"></script>
<script src="{{url('/resources/assets/js/datatable-responsive.min.js') }}"></script>

<script>
	var currentUrl = window.location.pathname;
    
	if (currentUrl == '\/adminDashboard') {
		$("#adminDashboardHome").addClass("activeLinks");
        $("#adminDashboardForm").removeClass("activeLinks");
        $("#adminDashboardFinace").removeClass("activeLinks");
        $("#siteSetting").removeClass("activeLinks");
        $("#branchList").removeClass("activeLinks");
        $("#addingBranch").removeClass("activeLinks");
        $("#addingAdmin").removeClass("activeLinks");
        $("#adminList").removeClass("activeLinks");
	}
    if (currentUrl == '\/registrationForm') {
		$("#adminDashboardForm").addClass("activeLinks");
        $("#adminDashboardHome").removeClass("activeLinks");
        $("#adminDashboardFinace").removeClass("activeLinks");
        $("#siteSetting").removeClass("activeLinks");
        $("#branchList").removeClass("activeLinks");
        $("#addingBranch").removeClass("activeLinks");
        $("#addingAdmin").removeClass("activeLinks");
        $("#adminList").removeClass("activeLinks");
	}
    if (currentUrl == '\/adminDashboardFinance') {
		$("#adminDashboardFinace").addClass("activeLinks");
        $("#adminDashboardForm").removeClass("activeLinks");
        $("#siteSetting").removeClass("activeLinks");
        $("#adminDashboardHome").removeClass("activeLinks");
        $("#branchList").removeClass("activeLinks");
        $("#addingBranch").removeClass("activeLinks");
        $("#addingAdmin").removeClass("activeLinks");
        $("#adminList").removeClass("activeLinks");
	}
    if (currentUrl == '\/siteSetting') {
		$("#siteSetting").addClass("activeLinks");
		$("#adminDashboardFinace").removeClass("activeLinks");
        $("#adminDashboardForm").removeClass("activeLinks");
        $("#adminDashboardHome").removeClass("activeLinks");
        $("#branchList").removeClass("activeLinks");
        $("#addingBranch").removeClass("activeLinks");
        $("#addingAdmin").removeClass("activeLinks");
        $("#adminList").removeClass("activeLinks");
	}
    if (currentUrl == '\/addingBranch') {
		$("#addingBranch").addClass("activeLinks");
		$("#adminDashboardFinace").removeClass("activeLinks");
        $("#adminDashboardForm").removeClass("activeLinks");
        $("#adminDashboardHome").removeClass("activeLinks");
        $("#branchList").removeClass("activeLinks");
        $("#siteSetting").removeClass("activeLinks");
        $("#addingAdmin").removeClass("activeLinks");
        $("#adminList").removeClass("activeLinks");
	}
    if (currentUrl == '\/branchList') {
		$("#branchList").addClass("activeLinks");
		$("#addingBranch").removeClass("activeLinks");
		$("#adminDashboardFinace").removeClass("activeLinks");
        $("#adminDashboardForm").removeClass("activeLinks");
        $("#adminDashboardHome").removeClass("activeLinks");
        $("#siteSetting").removeClass("activeLinks");
        $("#addingAdmin").removeClass("activeLinks");
        $("#adminList").removeClass("activeLinks");
	}
    if (currentUrl == '\/addingAdmin') {
		$("#addingAdmin").addClass("activeLinks");
		$("#branchList").removeClass("activeLinks");
		$("#addingBranch").removeClass("activeLinks");
		$("#adminDashboardFinace").removeClass("activeLinks");
        $("#adminDashboardForm").removeClass("activeLinks");
        $("#adminDashboardHome").removeClass("activeLinks");
        $("#siteSetting").removeClass("activeLinks");
	}
    if (currentUrl == '\/adminList') {
		$("#adminList").addClass("activeLinks");
		$("#branchList").removeClass("activeLinks");
		$("#addingBranch").removeClass("activeLinks");
		$("#adminDashboardFinace").removeClass("activeLinks");
        $("#adminDashboardForm").removeClass("activeLinks");
        $("#adminDashboardHome").removeClass("activeLinks");
        $("#siteSetting").removeClass("activeLinks");
        $("#addingAdmin").removeClass("activeLinks");
	}
     </script>
</body>
</html>
