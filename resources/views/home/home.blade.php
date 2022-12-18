@extends('layout.layout')
@section('content')

<div class="container">
    <div class="row">
    <div class="col-lg-12 mt-4 d-flex justify-content-end">
          <a href="{{ url('/loginAdmin')}}"> <button type="button" class="btn btn-primary">ورود کاربران  &nbsp; <i class="fa fa-sign-in"></i> </button> </a> 
        </div>
    </div>
    <div class="row bannerImage"> 
        <h1 class="bigTitle">سامانه مدیریت مراجعین به سفارت جمهوری اسلامی ایران   </h1>
    </div>
    <div class="row infoDiv">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h6> متقاضی محترم ! </h6>
            <p class="information">
            با  در نظر داشت حجم وسیع از متقاضیان روادید جمهوری اسلامی ایران و ارایه خدمات معیاری و شایسته این سامانه طراحی و مورد تایید سفارت جمهوری اسلامی ایران در کابل قرار گرفته است. 
شما می  توانید بدون مراجعه به  سفارت جمهوری اسلامی ایران در کابل، با استفاده از این سامانه درخواست خویش جهت اخذ روادید جمهوری اسلامی ایران در این سامانه تبت نمایید. 
            </p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <img src="{{ url('resources/assets/images/services.jpeg')}}" alt="" class="responsive serviceImage">
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row footer d-flex justify-content-center">
            www.asankar.com &copy;
    </div>
</div>

@endsection
