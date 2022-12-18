@extends('admin.layout')
@section('content')

<div class="container mt-2">
  <div class="row">
       <div class="col-lg-6 p-2 d-flex justify-content-start">
            <a href="{{url('adminDashboard')}}" class="activeLink">  <i class="fa fa-home fa-lg"></i> صفحه نخست  </a>
       </div>
        <div class="col-lg-6 p-2 d-flex justify-content-end">
         
        </div>
  </div>
  <div class="row contentRow">
      <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="likeAndDislike">
                    <div class="like-item"> 
                        <span class="like"> <i class="fa fa-thumbs-up" aria-hidden="true" style="color:#fff" ></i> </span>
                    </div>
                    <div class="like-item">
                        <span class="emtyaz">227</span>
                        <br>
                        <br>
                        <span class="etebar"> اعتبار مثبت </span>
                    </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="likeAndDislike">
                    <div class="like-item"> 
                        <span class="dislike"> <i class="fa fa-thumbs-down" aria-hidden="true" style="color:#fff" ></i> </span>
                    </div>
                    <div class="like-item">
                        <span class="emtyaz">104</span>
                        <br>
                        <br>
                        <span class="etebar"> اعتبار منفی </span>
                    </div>
                  </div>
              </div>
          </div>

          <div class="row mt-2">
              <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="likeAndDislike">
                    <div class="like-item text-start">
                        <span class="confirmedDocs "> تعداد ثبت نام های تایید نشده </span> &nbsp; &nbsp; <span class="notConfirmedIcon">   <i class="fa fa-xmark" aria-hidden="true" style="color:#fff"></i> </span> 
                        <div class="registeredForVisa mt-3"> 53 </div>
                    </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="likeAndDislike">
                   <div class="like-item">
                        <span class="confirmedDocs "> تعداد ثبت نام های تایید شده </span> &nbsp; &nbsp;  <span class="confirmedIcon">  <i class="fa fa-check" aria-hidden="true" style="color:#fff"></i> </span> 
                        <span class="registeredForVisa mt-3">  82 </span>
                    </div>
                  </div>
              </div>
          </div>
          <div class="row p-2">
              <div class="col-lg-12 col-md-12 col-sm-12 financeCard">
                  <span class="financeReport"> <i class="fas fa-money-bill fa-xl" style="color:#765bd9"></i> </span>
                  <span class="moneyText"> مبلغ کارمزد قابل پرداخت </span>
                  <span class="countMoney"> 4353443 <sub>ا</sub>ف </span>
                  <span class="moneyDescription"> مجموع مبلغ ذکر شده قابل پرداخت میباشد. </span>
              </div>
          </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 anncounceMentBoard">
          <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
              <h3 class="title mt-4"> تابلوی اعلانات  </h3>
            </div>
              <div class="col-lg-6 p-2 d-flex justify-content-end">
                 <span class="speaker p-2"> <i class="fa fa-bullhorn fa-lg"  aria-hidden="true"></i> </span>
              </div>
          </div>
           <p class="information p-3">
          روند رو به رشد مراجعین به سرکنسولگری جمهوری اسلامی ایران و تشکیل صف های طولانی به منظور اخذ روادید از یک سو و ارائه خدمات شایسته در کمترین زمان ممکن به اهالی محترم ولایات هرات، فراه، غور و بادغیس از سوی دیگر باعث گردید تا این نمایندگی با بهره مندی از ظرفیت های ایجاد شده در جهت تقویت کیفیت ارائه خدمات کنسولی و همچنین کاهش مراجعین به سرکنسولگری جمهوری اسلامی ایران و پیشگیری از تمرکز و تجمیع درخواست کنندگان روادید در یک محل و گسترش آنان در سطح شهر با استفاده از سامانه ای که بدین منظور طراحی گردیده است روی آورد. بدین منظور کلیه اشخاص حقیقی و حقوقی مجاز در ارائه خدمات با موضوعات پیش گفته قادرخواهند بود بر اساس قوانین و مقررات تعین و تائید شده از سوی سرکنسولگری جمهوری اسلامی ایران مندرج در سامانه کاهش مراجعین به سرکنسولگری جمهوری اسلامی ایران در هرات ثبت نام نموده و از میان سه مرکز تعیین شده نزدیکترین آن را به دفتر خویش انتخواب نمایند.
          </p>
      </div>
  </div> <hr>
    <div class="row">
        <h3> گزارشات عمومی </h3>
    </div>
    <div class="row bg-white p-4">
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
        </div>
    </div>

@endsection
