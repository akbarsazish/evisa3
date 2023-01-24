<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>استارفود</title>
    <link rel="stylesheet" href="{{ url('/resources/assets/css/login.css')}}"/>
    <meta name="viewport" content="width =device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/png" href="{{ url('/resources/assets/images/part.png')}}"/>
    <script src="{{url('/resources/assets/js/sweetalert.min.js')}}"></script>
    <script src="{{ url('resources/assets/js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{ url('/resources/assets/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ url('/resources/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <style>
        .downloadAppimg {  list-style-type: none; height:28px;}
        .contactlogin { text-decoration:none; color:#000; font-size:16px;display:block; margin-top:20px;}
        .loginButton{ margin-top:20px;}
        .about-img { display: flex;justify-content: center !important;align-items: center !important;align-self: center !important;}

            /* sweet alert style changes  */
        .about-img img { width: 80px;height: 80px;}
        .trust {background-color: white; width: 100px; height:100px;margin:20px; border-radius:5px; }
         @media only screen and (max-width: 940px) and (min-width:250px) {
                .about-img img { width: 60px; height: 60px; margin-top: 3px;}
            }
         @media only screen and (max-width: 940px) and (min-width:250px) {
                .trust { width: 60px;height:60px;margin:3px;}
            }
		
	   .loginDiv { top:50%;left: 50%; transform: translate3d(-50%,-50%, 0);position: absolute;}  	

       .loginDiv {background-color:#aec5e1; width:28%; }         
        @media only screen and (max-width: 920px) {
            .loginDiv { width:90%; }  
        }
		
    </style>
</head>
<body style="background-color:#ebeef9">
 <div class="container"> 
    <div class="row">
        <div class="col-lg-4"></div>
            <div class="col-lg-4 loginDiv p-3 rounded-2 shadow-lg">
               <span  style="display:flex;justify-content:center; margin-bottom:20px;">
                    <img class="img-responsive" width="80px" height="80px" src="{{ url('/resources/assets/images/admin.png')}}" alt="logi"></span>
                  <h5 style="text-align:center; margin:5px">ورود به ادمین پنل </h5>
                    <form action="{{url('/checkAdmin')}}" method="post">
                        @csrf
                        <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label"> نام کاربری </label>
                            <input class="form-control"  name="username" type="text" placeholder="نام کاربری" required>
                        </div>
                        <div>
                            <label for="exampleFormControlInput1" class="form-label">کلمه عبور</label>
                           <input class="form-control pass" id="password"  name="password" type="password" placeholder="رمز عبور" required>
                        </div>
                        @if(isset($loginError))
                            @if($loginError=="نام کاربری و یا رمز ورود اشتباه است")
                                <script>
                                    swal({
                                            title: "خطا!",
                                            text: "نام کاربری و یا رمز ورود اشتباه است",
                                            icon: "warning",
                                            button: "تایید!",
                                        });
                                </script>
                            @endif
                            @php
                                unset($loginError);
                            @endphp
                        @endif
                    <div class="mb-3 text-center"> 
                           <a href="{{url('adminDashboard')}}"> <button class="btn btn-primary btn-md loginButton" type="submit"><i class="fa fa-unlock"></i>  ورود به سیستم </button></a> 
                           <a class="contactlogin" href="tel://02148286">  <i class="fa-solid fa-phone-rotary fa-lg"></i>  00989100473242 </a>
                    </div>
                    </form>
         </div>
        <div class="col-lg-4"></div>
    </div>
</div>
</body>
</html>
