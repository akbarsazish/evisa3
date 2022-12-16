@extends('layout.layout')
@section('content')

<div class="container">
    <div class="row">
    <div class="col-lg-12 mt-4 d-flex justify-content-end">
          <a href="{{ url('/loginAdmin')}}"> <button type="button" class="btn btn-primary">ورود کاربران  &nbsp; <i class="fa fa-sign-in"></i> </button> </a> 
        </div>
    </div>
    <div class="row bannerImage"> </div>
    <div class="row infoDiv">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <p class="information">
            روند رو به رشد مراجعین به سرکنسولگری جمهوری اسلامی ایران و تشکیل صف های طولانی به منظور اخذ روادید از یک سو و ارائه خدمات شایسته در کمترین زمان ممکن به اهالی محترم ولایات هرات، فراه، غور و بادغیس از سوی دیگر باعث گردید تا این نمایندگی با بهره مندی از ظرفیت های ایجاد شده در جهت تقویت کیفیت ارائه خدمات کنسولی و همچنین کاهش مراجعین به سرکنسولگری جمهوری اسلامی ایران و پیشگیری از تمرکز و تجمیع درخواست کنندگان روادید در یک محل و گسترش آنان در سطح شهر با استفاده از سامانه ای که بدین منظور طراحی گردیده است روی آورد.
بدین منظور کلیه اشخاص حقیقی و حقوقی مجاز در ارائه خدمات با موضوعات پیش گفته قادرخواهند بود بر اساس قوانین و مقررات تعین و تائید شده از سوی سرکنسولگری جمهوری اسلامی ایران مندرج در سامانه کاهش مراجعین به سرکنسولگری جمهوری اسلامی ایران در هرات ثبت نام نموده و از میان سه مرکز تعیین شده نزدیکترین آن را به دفتر خویش انتخواب نمایند.
            </p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <img src="{{ url('resources/assets/images/services.png')}}" alt="" class="responsive serviceImage">
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row footer d-flex justify-content-center">
            www.asankar.com &copy;
    </div>
</div>

@endsection
