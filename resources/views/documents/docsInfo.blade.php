@extends('admin.layout')
@section('content')

<style>


@media print {
  .noPrint{
    display:none;
  }

@page { 
     size: landscape;
     margin-top: 0;
     margin-bottom: 0;
}

.personImage {
     width:111px !important;
     height:155px !important;
}
.reminder {
     font-size:15px;
}

.exportDate {
     font-size:12px;
}
.bottomeText p {
     font-size:14px;
}

.tazakor {
     margin-top:44px !important;
}

.signatur{
     margin:20px 5px
}
.forPrint {
     direction: rtl !important;
}

}

#pritnArea{
     display:none;
}
.logoImage {
     display:none;
}


</style>

<div class="container-fluid forPrint" dir="rtl" id="pritnArea" >
     <?php 
          $passNo = $doc->PassNo;
          $docName = $doc->dName;
          $lastName = $doc->LastName;
          $dateOfBrith = $doc->BirthDate;
          $province = $doc->province;
          $rhgeriCode = $doc->RefCode;

          if($doc->Gender==0){
               $sex="آقای";
          }else{
               $sex="خانم";
          }
          
          $ldate = date('Y-m-d   H:i:s');
     
     ?>
    <div class="row">
          <div class="col-lg-10 col-md-10 col-sm-10">
           <h4 class="title text-center" style="margin-bottom:50px;"> رسید تحویل پاسپورت </h4>
               <p class="reminder">
                 بدینوسیله گواهی میشود. پاسپورت شماره  {{$passNo}} متعلق به  {{$sex}} {{$docName }} {{$lastName}} متولد {{$dateOfBrith}} ولایت {{$province }} به منظور ارائه به کنسولگری جهت صدور ویزا در اجرای طرح کاهش مراجعین سر کنسولگری جمهوری اسلام ایران - کابل از نامبرده دریافت گردید.  <br>
              </p>
                <?php
                     echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($rhgeriCode, 'C39+',1,44, array(1,1,1), true) . '" alt="barcode"   />';
                  
               ?> 

             <!-- <?php
               // echo DNS1D::getBarcodeHTML("$docName", 'C39+');
              ?> -->
      
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 px-0">
            <p class="exportDate"> <b> تاریخ صدور </b>: <br> <?php echo $ldate ?> </p>
           <img class="personImage rounded" style="width:100%; height:177px;" src="{{url('/resources/assets/images/document/person/'.$doc->DocSn.'.jpg')}}" alt="عکس شخص">
        </div>
    </div>
    <div class="row">
          <div class="col-lg-12 col-md-12">
               <h3 class="tazakor"> تذکر </h3>
               <p class="reminder">  مبلغ 80 یورو به عنوان وجه ویزای جهانگردی و مبلغ 1000 افغانی به عنوان هزینه کارمزد از دارنده پاسپورت فوق الذکر دریافت گردید.   </p>  
               
                <p class="reminder">ذکر این نکته ضوروی است چنانچه به هر دلیل ممکن با صدور ویزای شما از سرکنسولگری جمهور اسلام ایران موافقت نگردد. صرفا وجه ویزای پرداختی به انضمام کارمزد بانک به مبلغ 700 افغانی قابل برگشت خواهد بود. </p>
                <p class="reminder"> این رسید در قبال تحویل پاسپورت ارائه شده صادر گردیده است و فاقد هرگونه ارزش و اعتبار دیگری میباشد. ارائه رسید در هنگام دریافت پاسپورت الزامی است. لذا در حفظ و نگهداری آن دقت نمائید. </p>
                <p class="reminder"> حد اکثر اعتبار این رسید از تاریخ صدور به مدت یک ماه میباشد. </p>
          </div>
    </div>
    <div class="row bottomeText">
          <div class="col-lg-6 col-md-6 col-sm-6">
               <p class="fw-bold signatur"> امضاً و انگشت  </p>
               <p class="phoneNo"> <b>شماره تماس </b>:  0706909063 </p>
               <p class="address"> <b> آدرس </b>: هرات چهار راهی آمریت، مقابل کلینیک آریا آپلو  </p>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 text-end">
               <p class="fw-bold"> چاپ توسط: حمیدی  </p>
               <p class="address"> <b> تاریخ چاپ </b>: <?php echo $ldate ?> </p>
          </div>
    </div>
</div>




<div class="container bg-white mt-2 rounded-2 noPrint">
    <div class="row mt-1">
        <h4 class="title "> جزءیات سند</h4>
    </div>
    


      <div class="row mt-2">
            <div class="col-lg-3 ">
               <div class="mb-3">
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected> فلتر اسناد </option>
                        <option value="1"> تایید شده </option>
                        <option value="1">تایید ناشده </option>
                        <option value="1"> رد شده </option>
                    </select>
                </div>
            </div> 
            <div class="col-lg-9 text-end">
                @if(Session::get("userSession")==1 or Session::get("userSession")==2)
                    <button type="button" class="btn btn-sm btn-info" id="printDocumentBtn"> چاپ <i class="fa fa-print"></i> </button> &nbsp;
                @endif
            </div>
        </div>

        <div class="brancheDetails">
                    <div class="branchItem">
                         <span class="item">  نام    </span> : {{$doc->dName}}
                    </div>
                    <div class="branchItem">
                         <span class="item"> نام خانودگی </span> : {{$doc->LastName}}
                    </div>
                    <div class="branchItem">
                         <span class="item">  نام پدر </span> : {{$doc->FatherName}}
                    </div>
                    <div class="branchItem">
                         <span class="item">  تاریخ تولد  </span> : {{$doc->BirthDate}}
                    </div>
                    <div class="branchItem">
                         <span class="item"> محل تولد  </span> : {{$doc->BirthPlace}}
                    </div>
                    <div class="branchItem">
                         <span class="item">  شماره پاسپورت  </span> : {{$doc->PassNo}}
                    </div>
                    <div class="branchItem">
                         <span class="item">  انقضا پاسپورت  </span> : {{$doc->PassEndDate}}
                    </div>
                    <div class="branchItem">
                         <span class="item">   شماره تماس  </span> : {{$doc->dCellPhone}}
                    </div>
                    <div class="branchItem">
                         <span class="item">   شماره تماس فامیل </span> : {{$doc->dOtherPhone}}
                    </div>
                     
                    <div class="branchItem">
                         <span class="item">  کد رهگیری  </span> : {{$doc->RefCode}}
                    </div>
                    <div class="branchItem">
                         <span class="item"> شرکت  </span> : {{$doc->branchName}}
                    </div>
                    <div class="branchItem">
                         <span class="item"> تاریخ مراجعه   </span> : {{$doc->referDate}}
                    </div>
                    <div class="branchItem">
                         <span class="item d-block"> &nbsp; عکس شخص &nbsp; &nbsp; </span> : <img src="{{url('/resources/assets/images/document/person/'.$doc->DocSn.'.jpg')}}" alt=" عکس شخص" class="responsive brancheDetailsImg ">
                    </div>

                    <div class="branchItem">
                         <span class="item d-block"> پاسپورت   </span> : <img src="{{url('/resources/assets/images/document/passport/'.$doc->DocSn.'.jpg')}}" alt=" پاسپورت یا تذکره" class="responsive brancheDetailsImg ">
                    </div>
                    <div class="branchItem">
                         <span class="item d-block">  تذکره  </span> : <img src="{{url('/resources/assets/images/document/tazkira/'.$doc->DocSn.'.jpg')}}" alt=" عکس یا لوگو " class="responsive brancheDetailsImg ">
                    </div>
                </div>
            </div>      
        </div>
</div>

<script>
     $("#printDocumentBtn").on("click", ()=>{
          $("#pritnArea").css("display", "inline");
          window.print();
     })
</script>
@endsection