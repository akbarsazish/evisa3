@extends('layout.layout')
@section('content')

<div class="container">
    <div class="row">
    <div class="col-lg-12 mt-4 d-flex justify-content-end">
          <a href="{{ url('/login')}}"> <button type="button" class="btn btn-primary">ورود کاربران  &nbsp; <i class="fa fa-sign-in"></i> </button> </a> 
        </div>
    </div>
    <div class="row bannerImage"> 
        <h1 class="bigTitle"> سامانه کاهش مراجعین سفارت جمهوری اسلامی ایران</h1>
    </div>
    <div class="row infoDiv">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h6> متقاضی محترم ! </h6>
            <p class="information">با در نظر داشت ميزان گسترده مراجعين به بخش كنسولي سفارت جمهوري اسلامي ايران در كابل و براي جلوگيري از تجميع مراجعين و عرضه خدمات كنسولي هرچه بهتر و شايسته تَر اين سامانه طراحي و در اختيار متقاضيان محترم قرار گرفته است.
بدين منظور تمام اشخاص حقيقي و حقوقي مجاز به به ارائه خدمات قادر خواهند بود تا با استفاده از اين سامانه درخواست خويش را براي اخذ رواديد جمهوري اسلامي ايران ثبت نمايند.
ما مسرانه در تلاش هستيم تا با استفاده از ظرفيت هاي موجود جهت تقويت كيفيت خدمات به متقاضيان محترم رواديد و براي ايجاد يك بستر مناسب هماهنگي ميان اين ظرفيت ها از تجميع متقاضيان مقابل بخش كنسولي سفارت جمهوري اسلامي ايران در كابل جلوگيري به عمل آورده و با گسترش اين خدمات در سطح شهر كابل خدمات بهتري را به متقاضيان محترم عرضه نماييم.</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <img src="{{ url('resources/assets/images/services.jpeg')}}" alt="" class="responsive serviceImage">
        </div>
    </div>
</div>
<div class="container">
    <div class="row footer d-flex justify-content-center">
          <p class="text-white copyRight">
             <?php echo date("Y"); ?>    &copy;
          </p>
    </div>
</div>

@endsection
