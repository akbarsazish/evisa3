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
        .downloadAppimg {
                list-style-type: none;
                height:28px;
            }
        .contactlogin {
            text-decoration:none;
            color:#000;
            font-size:16px;
            display:block;
        }
        .loginButton{
            padding:5px 6px;
            margin-top:17px;
            font-size:18px;
        }
        .about-img {
                display: flex;
                justify-content: center !important;
                align-items: center !important;
                align-self: center !important;
            }

            /* sweet alert style changes  */
            .about-img img {
                width: 80px;
                height: 80px;
            }
            .trust {
                background-color: white;
                width: 100px;
                height:100px;
                margin:20px;
                border-radius:5px;
            }
            @media only screen and (max-width: 940px) and (min-width:250px) {
                .about-img img {
                    width: 60px;
                    height: 60px;
                    margin-top: 3px;
                }
            }
            @media only screen and (max-width: 940px) and (min-width:250px) {
                .trust {
                    width: 60px;
                    height:60px;
                    margin:3px;
                }
            }
    </style>
</head>
<body style="background-color:#ebeef9">
 <div class="container"> 
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4" style="background: linear-gradient(#ffa, #abc, #9ad); margin-top:33px; border-radius:3px; padding:20px;">
               <span  style="display:flex;justify-content:center; margin-bottom:20px;">
                    <img class="img-responsive text-center" width="88px" height="80px" src="{{ url('/resources/assets/images/loginLog.jpg')}}" alt="logi"></span>
                  <h3 style="text-align:center; margin:10px">ورود به ادمین پنل </h3>
                    <form action="{{url('/checkUser')}}" method="post">
                        @csrf

                        <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label"> نام کاربری </label>
                            <input class="form-control" maxlength="11" name="username" pattern="[0-9]{11}+" type="tel" pattern="[0-9]*" placeholder="0912000000" required>
                        </div>

                        <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label">کلمه عبور</label>
                           <input class="form-control pass" id="password" maxlength="4"  name="password" type="password" pattern="\d*" placeholder="کلمه عبور خود را وارد نمایید" required onchange="changeValue()">
                        </div>
                        <hr>
                        
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
                            @elseif ($loginError=="با دفتر شرکت در تماس شوید")
                                <script>
                                    swal({
                                        title: "تایید!",
                                        text: "با دفتر شرکت در تماس شوید",
                                        icon: "warning",
                                        button: "تایید!",
                                    });
                                </script>
                            @endif
                            @php
                                unset($loginError);
                            @endphp
                        @endif
                    
                    </form>
                    <div class="mb-3 text-center"> 
                           <a href="{{url('adminDashboard')}}"> <button class="btn btn-secondary btn-lg loginButton" type="button"><i class="fa fa-unlock"></i>  ورود به سیستم </button></a>
                        </div>
                    <a class="contactlogin" href="tel://02148286">   <span class="fa fa-phone"></span> <span>&nbsp;ارتباط:</span> 0093857454587 </a>
                        
         </div>
        <div class="col-lg-4"></div>
    </div>
       <div class="row"> 
        </div>
</div>
<script>
if (!navigator.serviceWorker.controller) {
    navigator.serviceWorker.register("/sw.js").then(function (reg) {
        console.log("Service worker has been registered for scope: " + reg.scope);
    });
}else{
}

// changing password input field into star
// let password = document.querySelector("#password");
// password.addEventListener('keyup', e =>{
//     let mypass = document.querySelector(".pass");
//     mypass.value = "*".repeat(e.target.value.length);
// });


</script>
</body>
</html>
