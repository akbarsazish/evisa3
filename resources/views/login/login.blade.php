<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>ویزای الکترونیک</title>
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
			color:blue;
        }
      
		.membership{
			font-size:16px;
			font-size:bold;
			text-align:center;
			display:flex;
			align-self:cetner!important;
			justify-content:center;
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

        .wrap {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px auto;
            }

        .loginButton {
            min-width: 200px;
            min-height: 40px;
            font-family: 'Nunito', sans-serif;
            font-size: 18px;
            font-weight: 700;
            color: #313133;
            background: linear-gradient(90deg, #1f1e24 0%, #4f6ec5 100%);
            border: none;
            border-radius: 1000px;
            box-shadow: 12px 12px 24px rgba(79,209,197,.64);
            transition: all 0.3s ease-in-out 0s;
            cursor: pointer;
            outline: none;
            position: relative;
            padding: 10px;
            color:#fff;
        }

        .loginButton::before {
            content: '';
            border-radius: 1000px;
            min-width: calc(200px + 12px);
            min-height: calc(40px + 12px);
            border: 1px solid #1f1e24;
            box-shadow: 0 0 60px #1f1e24;
            
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: all .3s ease-in-out 0s;
            }

        .loginButton:hover, .loginButton:focus {
            color: #313133;
            transform: translateY(-6px);
            }

        .loginButton:hover::before, .loginButton:focus::before {
            opacity: 1;
            }

        .loginButton::after {
            content: '';
            width: 30px; height: 30px;
            border-radius: 100%;
            border: 6px solid #1f1e24;
            position: absolute;
            z-index: -1;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: ring 1.5s infinite;
            }

       .loginButton:hover::after,.loginButton:focus::after {
            animation: none;
            display: none;
            }

            @keyframes ring {
            0% {
                width: 30px;
                height: 30px;
                opacity: 1;
            }
            100% {
                width: 300px;
                height: 300px;
                opacity: 0;
            }
            }

    .loginDiv {
        top:50%;
        left: 50%;
        transform: translate3d(-50%,-50%, 0);
        position: absolute;
    }         

    </style>
</head>
<body style="background-color:#ebeef9">
 <div class="container p-5"> 
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 loginDiv p-3" style="background: linear-gradient(#fff, #fff, #fff); -webkit-box-shadow: 0px 0px 25px 11px #0079ed; 
box-shadow: 0px 0px 10px 1px #0079ed; border-radius:3px; padding:20px;">
               <span  style="display:flex;justify-content:center; margin-bottom:20px;">
                    <img class="img-responsive text-center" width="88px" height="80px" src="{{ url('/resources/assets/images/loginLog.jpg')}}" alt="logi"></span>
                  <h5 style="text-align:center; margin:4px">ورود به سیستم </h5>
                    <form action="{{url('/checkBranch')}}" method="post">
                        @csrf

                        <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label"> نام کاربری </label>
                            <input class="form-control" maxlength="11" name="username"  type="text" placeholder="نام کاربری" required>
                        </div>

                        <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label">کلمه عبور</label>
                           <input class="form-control pass" id="password" maxlength="4"  name="password" type="password" pattern="\d*" placeholder="کلمه عبور خود را وارد نمایید" required onchange="changeValue()">
                        </div>
                        <div class="mb-3 wrap">
                            <button class="loginButton" type="submit"><i class="fa fa-unlock"></i> ورود </button>
                        </div> <hr>
                        
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
                    
                    </form>
			
		      	<span class="membership">  عضویت ندارم؟ &nbsp;  <a class="contactlogin" href="#"> ثبت نام  </a>  </span>
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
