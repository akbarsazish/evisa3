@extends('admin.layout')
@section('content')

<div class="container rounded-2" style="background-color:#fff; padding:20px;margin-top:20px;">
    <div class="row">
        <div class="col-lg-12">
            <h4> افزودن شعبه </h4>
            <form action="/action_page.php">
                <div class="mb-3 mt-3">
                    <label for="email"> نام شعبه :</label>
                    <input type="text" class="form-control form-control-sm" placeholder="شرکت سیاحتی کاروان عشق">
                </div>
                <div class="mb-3">
                     <label for="pwd">کد شعبه :</label>
                     <input type="text" class="form-control form-control-sm" placeholder="08">
                </div>
                <div class="mb-3">
                     <label for="pwd">  آدرس :</label>
                     <input type="text" class="form-control form-control-sm" placeholder="کابل دشت برچی ">
                </div>
                <button type="submit" class="btn btn-primary">ذخیره <i class="fa fa-save"></i></button>
            </form>
        </div>
    </div>
</div>


@endsection