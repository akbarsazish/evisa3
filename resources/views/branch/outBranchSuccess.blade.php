@extends('admin.layout')
@section('content')
<div class="container rounded-2" style="background-color:#fff; padding:20px;margin-top:20px;">
    <div class="row">
        <div class="col-lg-12 text-center">
            
            <h2>اکانت شما موفقانه ثبت شد</h2>
            <p> برای ورود به سیستم با نام کاربری و رمز کاربری که ثبت سیستم نموده اید وارد شوید</p>
            <a href="{{url('/login')}}" class="text-dark"> <button class="btn btn-primary">ورود به سیستم <i class="fa fa-sign-in"></i> </button> </a>
        </div>
    </div>
</div>
@endsection