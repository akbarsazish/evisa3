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
    @if(Session::get("userSession")=="branch")
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
    @endif

          <div class="row mt-2">
              <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="likeAndDislike">
                    <div class="like-item text-start">
                        @if(Session::get("userSession")==2 or Session::get("userSession")==1)
                        <span class="confirmedDocs ">  تعداد ثبت نام های تایید نشده کل شرکت ها</span> &nbsp; &nbsp; <span class="notConfirmedIcon">   <i class="fa fa-xmark" aria-hidden="true" style="color:#fff"></i> </span> 

                        <div class="registeredForVisa mt-3"> {{$allNotOkeOfCenter}} </div>
                        @else
                        <span class="confirmedDocs "> تعداد ثبت نام های تایید نشده </span> &nbsp; &nbsp; <span class="notConfirmedIcon">   <i class="fa fa-xmark" aria-hidden="true" style="color:#fff"></i> </span> 

                            <div class="registeredForVisa mt-3"> {{$allNotOkeOfAgency}}</div>                        
                        @endif
                    </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="likeAndDislike">
                   <div class="like-item">
                        @if(Session::get("userSession")==2 or Session::get("userSession")==1)
                        <span class="confirmedDocs "> تعداد ثبت نام های تایید شده  کل شرکت ها</span> &nbsp; &nbsp;  <span class="confirmedIcon">  <i class="fa fa-check" aria-hidden="true" style="color:#fff"></i> </span> 

                        <span class="registeredForVisa mt-3">{{$allOkeOfCenter}}</span>
                        @else
                        <span class="confirmedDocs "> تعداد ثبت نام های تایید شده </span> &nbsp; &nbsp;  <span class="confirmedIcon">  <i class="fa fa-check" aria-hidden="true" style="color:#fff"></i> </span> 

                        <span class="registeredForVisa mt-3">{{$allOkeOfAgency}}</span>
                        @endif
                    </div>
                  </div>
              </div>
            </div>
            <div class="row p-2">
              <div class="col-lg-12 col-md-12 col-sm-12 financeCard">
                  <span class="financeReport"> <i class="fas fa-money-bill fa-xl" style="color:#765bd9"></i> </span>
                    @if(Session::get("userSession")=="branch")
                        <span class="moneyText"> مبلغ قابل دریافت</span>
                    @else
                        <span class="moneyText"> مبلغ قابل پرداخت برای شرکت ها</span>
                    @endif

                    @if(Session::get("userSession")==2 or Session::get("userSession")==1)
                        <span class="countMoney"> {{$allMoney_to_give}} <sub>ا</sub>ف </span>
                    @else
                        <span class="countMoney"> {{$allMoneyOfAgency}} <sub>ا</sub>ف </span>
                    @endif

                    @if(Session::get("userSession")=="branch")
                        <span class="moneyDescription"> مجموع مبلغ ذکر شده قابل دریافت می باشد. </span>
                    @else
                        <span class="moneyDescription"> مجموع مبلغ ذکر شده قابل پرداخت میباشد. </span>
                    @endif

              </div>
            </div>
        </div>
        @if(Session::get("userSession")=="branch")
        <div class="col-lg-6 col-md-6 col-sm-6 anncounceMentBoard">
            <div class="row">
                <div class="col-lg-6 d-flex justify-content-start">
                    <h3 class="title mt-4"> {{$elan->Title}} </h3>
                </div>
                <div class="col-lg-6 p-2 d-flex justify-content-end">
                    <span class="speaker p-2"> <i class="fa fa-bullhorn fa-lg"  aria-hidden="true"></i> </span>
                </div>
            </div>
           <p class="information p-3">
          {{$elan->content}}</p>
        </div>
@endif
    @if(Session::get("userSession")=="branch")
        <div class="row">
            <h3> ({{Session::get("name")}}) گزارشات عمومی </h3>
        </div>
    @else
        <div class="row">
            <h3> گزارشات عمومی کل شرکت ها</h3>
        </div>
    @endif
    @if(Session::get("userSession")!="branch")
        <div class="row bg-white p-4">
                <div class="col-md-2 col-sm-6">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class="fa fa-group"></i>
                        </div>
                        <h3>  تعداد شرکتها   </h3>
                        <span class="counter-value">{{$allBranches}}</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="counter orange">
                        <div class="counter-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <h3> تایید شده ها </h3>
                        <span class="counter-value">{{$allOkeOfCenter}}</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="counter blue">
                        <div class="counter-icon">
                            <i class="fa fa-toggle-off"></i>
                        </div>
                        <h3> رد شده ها </h3>
                        <span class="counter-value">{{$allRejectedOfCenter}}</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="counter green">
                        <div class="counter-icon">
                            <i class="fa fa-sign-out"></i>
                        </div>
                        <h3> قرضدار </h3>
                        <span class="counter-value"> {{$allMoney_to_give}} </span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="counter green">
                        <div class="counter-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <h3> تایید نشده ها</h3>
                        <span class="counter-value">{{$allNotOkeOfCenter}}</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="counter red">
                        <div class="counter-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <h3> مجموع پول </h3>
                        <span class="counter-value">{{$allOkeOfCenter*(300+200)}}</span>
                    </div>
                </div>
            </div>
    @endif
    </div>
@endsection
