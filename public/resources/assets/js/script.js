var baseUrl = "http://127.0.0.1:8000";
var myVar;


function selectTableTr(element) {
    let input = $(element).find('input:radio').prop("checked", true);

    if($("#selectedDocID")){
        $("#selectedDocID").val($(input).val());
    }

    if($("#selectedBranchID")){
        $("#selectedBranchID").val($(input).val());
    }
    
    if($("#selectedAdminID")){
        $("#selectedAdminID").val($(input).val());
    }

    $('.select-highlight tr').removeClass('tableTrSelected');
    $(element).addClass('tableTrSelected');
    
    };

    $("#requestBranchBtn").on("click",function(){
             swal({
            title: "خطا!",
            text: "آیا میخواهید درخواست کنید",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
        $.ajax({
            type: "get",
            url: baseUrl + "/requestToBranch",
            data: {
                _token: "{{ csrf_token() }}",
                branchID: $("#requestBranchBtn").val()
            },
            dataType: "json",
            success: function(resp) {
                window.location.reload();
            }
        });
    }
});
    });

    $("#acceptRequestBtn").on("click",function(){

        swal({
            title: "خطا!",
            text: "آیا میخواهید قبول کنید",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
        $.ajax({
            type: "get",
            url: baseUrl + "/acceptRequest",
            data: {
                _token: "{{ csrf_token() }}",
                BranchID: $("#acceptRequestBtn").val()
            },
            dataType: "json",
            success: function(resp) {
                alert(resp);
                window.location.reload();
            }
        });
    }})
    });

    $("#cancelRequestBtn").on("click",function(){
        swal({
            title: "خطا!",
            text: "آیا میخواهید کنسل کنید",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
        $.ajax({
            type: "get",
            url: baseUrl + "/cancelRequest",
            data: {
                _token: "{{ csrf_token() }}",
                BranchID: $("#cancelRequestBtn").val()
            },
            dataType: "json",
            success: function(resp) {
                window.location.reload();
            }
        });
    }
});
    });

    $("#dislikeBranchBtn").on("click",function(){
        swal({
            title: "خطا!",
            text: "آیا میخواهید امتیاز کم گردد",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
        $.ajax({
            type: "get",
            url: baseUrl + "/dislikeBranch",
            data: {
                _token: "{{ csrf_token() }}",
                branchID: $("#dislikeBranchBtn").val()
            },
            dataType: "json",
            success: function(resp) {
                window.location.reload();
            },
            error:()=>{

            }
        });
        }});
            });
            
        

    $("#likeBranchBtn").on("click",function(){
        swal({
            title: "خطا!",
            text: "آیا میخواهید امتیاز اضافه گردد",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
        $.ajax({
            type: "get",
            url: baseUrl + "/likeBranch",
            data: {
                _token: "{{ csrf_token() }}",
                branchID:  $("#likeBranchBtn").val()
            },
            dataType: "json",
            success: function(resp) {
                window.location.reload();
            },
            error:()=>{

            }
        });
    }});
    });

    $("#doTasviyahBranchBtn").on("click",function(){
        $.ajax({
            type: "get",
            url: baseUrl + "/doTasviyahHisab",
            data: {
                _token: "{{ csrf_token()}}",
                BranchID: $("#doTasviyahBranchBtn").val()
            },
            dataType: "json",
            success: function(resp) {
                
                window.location.reload();

            }
        });
    })



    function selectTableTrBranch(element) {
        let input = $(element).find('input:radio').prop("checked", true);
        $("#showDetails").val(input.val());
        $("#showBranchForms").val(input.val());
        $("#editBranchBtn").val(input.val());
        $("#deleteBranche").val(input.val());
        $("#likeBranchBtn").val(input.val());
        $("#dislikeBranchBtn").val(input.val());
        $("#requestBranchBtn").val(input.val());
        $("#cancelRequestBtn").val(input.val());
        $("#acceptRequestBtn").val(input.val());
        $("#doTasviyahBranchBtn").val(input.val());

        $("#showBranchForms").prop("disabled",false);
        $("#showDetails").prop("disabled",false);
        $("#editBranchBtn").prop("disabled",false);
        $("#deleteBranche").prop("disabled",false);
        $("#likeBranchBtn").prop("disabled",false);
        $("#dislikeBranchBtn").prop("disabled",false);
        $("#requestBranchBtn").prop("disabled",false);
        $("#doTasviyahBranchBtn").prop("disabled",false);
        if($("#selectedBranchID")){
            $("#selectedBranchID").val($(input).val());
        }
        if($("#selectedBranchIDDetail")){
            $("#selectedBranchIDDetail").val($(input).val());
        }
            
        $.ajax({
            type: "get",
            url: baseUrl + "/getAllBranchInfo",
            data: {
                _token: "{{ csrf_token() }}",
                BranchID: input.val()
            },
            dataType: "json",
            success: function(resp) {
            if(resp==0){
                $("#requestBranchBtn").css("display","inline");
                $("#cancelRequestBtn").css("display","none");
                $("#doTasviyahBranchBtn").css("display","none");
            }
            if(resp==1){
                $("#cancelRequestBtn").css("display","inline");
                $("#requestBranchBtn").css("display","none");
                $("#doTasviyahBranchBtn").css("display","none");
            }
            if(resp==2){
                $("#doTasviyahBranchBtn").css("display","inline");
                $("#requestBranchBtn").css("display","none");
                $("#cancelRequestBtn").css("display","none");
            }
        
                
            },
            error:function(error){

            }
        });
          
    }

$("#editAdminBtn").on("click",()=>{
    $.ajax({
        type: "get",
        url: baseUrl + "/getAdmin",
        data: {
            _token: "{{ csrf_token() }}",
            adminID: $("#selectedAdminID").val()
        },
        dataType: "json",
        success: function(resp) {
            $("#AdminID").val(resp[0].AdminSn);
            $("#name").val(resp[0].Name);
            $("#username").val(resp[0].UserName);
            $("#password").val(resp[0].Password);
            $("#address").val(resp[0].Address);
            $("#cellPhone").val(resp[0].CellPhone);
            $("#otherPhone").val(resp[0].OtherPhone);
            $("#gender").empty();
            if(resp[0].Gender==1){
                $("#gender").append(`
                <option selected value="1">مرد</option>
                <option value="2">زن </option>`); 
            }else{
                $("#gender").append(`
                <option value="1">مرد</option>
                <option selected value="2">زن </option>`); 
            }
            $("#adminType").empty();
            if(resp[0].AdminType==1){
                $("#adminType").append(`
                <option selected value="1">ادمین </option>
                <option value="2"> کارمند </option>`);
            }else{
                $("#adminType").append(`
                <option  value="1">ادمین </option>
                <option selected value="2"> کارمند </option>`);
            }

        },
        error:function(error){

        }
    });

    $("#editingUser").modal("show");

});

$("#deleteAdminBtn").on("click",()=>{
    swal({
        title: "خطا!",
        text: "آیا میخواهید حذف گردد",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            type: "get",
            url: baseUrl + "/deleteAdmin",
            data: {
                _token: "{{ csrf_token() }}",
                adminID: $("#selectedAdminID").val()
            },
            dataType: "json",
            success: function(resp) {
              swal("موفقانه حذف گردید", {
                icon: "success",
              });
    
                //
                $("#adminListBody").empty();
                resp.forEach((element,index) => {
                  $("#adminListBody").append(`
                  <tr class="docsTr"  onclick="selectTableTr(this)">
                  <td>`+(index+1)+`</td>
                  <td>`+element.Name+`</td>
                  <td>`+element.CellPhone+`</td>
                  <td>`+element.OtherPhone+`</td>
                  <td>`+element.AdminType+`</td>
                  <td>`+element.Address+`</td>
                  <td>
                      <span class="form-check">
                          <input class="form-check-input " type="radio" name="" id="" value="`+element.AdminSn+`">
                      </span>
                  </td>
              </tr>
                  `);

                });
            },
            error: function(msg) {
              alert("data resp errors");
            }
        });
          
        } else {
          swal("منصرف شدید");
        }
      });
});

$("#deleteBranche").on("click",()=>{

    swal({
        title: "خطا!",
        text: "آیا میخواهید حذف گردد",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            type: "get",
            url: baseUrl + "/deleteBranch",
            data: {
                _token: "{{ csrf_token() }}",
                BranchID: $("#selectedBranchID").val()
            },
            dataType: "json",
            success: function(resp) {
              swal("موفقانه حذف گردید", {
                icon: "success",
              });
              window.location.reload();
    
        //         //
        //         $("#branchListBody").empty();
        //         resp.forEach((element,index) => {
        //           $("#branchListBody").append(`
        //           <tr class="docsTr"  onclick="selectTableTr(this)">
        //           <td>`+(index+1)+`</td>
        //           <td>`+element.Name+`</td>
        //           <td>`+element.BranchCode+`</td>
        //           <td>`+element.Address+`</td>
        //           <td>
        //               <span class="form-check">
        //                   <input class="form-check-input " type="radio" name="branchId" id="" value="`+element.BranchSn+`">
        //               </span>
        //           </td>
        //    </tr>`);

        //         });
            },
            error: function(msg) {
              alert("data resp errors");
            }
        });
          
        } else {
          swal("منصرف شدید");
        }
      });
});

    $("#editBranchBtn").on("click",()=>{
        $.ajax({
            type: "get",
            url: baseUrl + "/getBranch",
            data: {
                _token: "{{ csrf_token() }}",
                BranchID: $("#editBranchBtn").val()
            },
            dataType: "json",
            success: function(resp) {
                $("#editBranchList").modal("show");
                $("#BranchId").val(resp.BranchSn);
                $("#branchName").val(resp.Name);
                $("#username").val(resp.username);
                $("#password").val(resp.password);
                $("#BranchCode").val(resp.BranchCode);
                $("#BranchAddress").val(resp.Address);
            },
            error:function(error){

            }
        });
        
    });
    function checkAdminExistBefor(element) {
        if(($(element).val()).length>2){

            $.ajax({
                type: "get",
                url: baseUrl + "/checkAdminUserName",
                data: {
                    _token: "{{ csrf_token() }}",
                    username:$(element).val()
                },
                dataType: "json",
                success: function(resp) {
                    if(resp==1){
                        $("#adminExistError").css("display","block");
                    }else{
                        $("#adminExistError").css("display","none");
                    }
                },
            });
        }
    }

    function checkUserNameExistance(element){
       if(($(element).val()).length>2){

        $.ajax({
            type: "get",
            url: baseUrl + "/checkBranchUserName",
            data: {
                _token: "{{ csrf_token() }}",
                username:$(element).val()
            },
            dataType: "json",
            success: function(resp) {
                if(resp==1){
                    $("#userExistError").css("display","block");
                }else{
                    $("#userExistError").css("display","none");
                }
            },
        });
    }
    }


$("#deleteDocumentBtn").on("click", ()=>{

    swal({
        title: "خطا!",
        text: "آیا میخواهید حذف گردد",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            type: "get",
            url: baseUrl + "/deleteDocs",
            data: {
                _token: "{{ csrf_token() }}",
                docID: $("#selectedDocID").val()
            },
            dataType: "json",
            success: function(resp) {
              swal("موفقانه حذف گردید", {
                icon: "success",
              });
    
                //
                $("#docListBody").empty();
                resp.forEach((element,index) => {
                  $("#docListBody").append(`
                  <tr class="docsTr"  onclick="selectTableTr(this)">
                  <th>`+(index+1)+`</th>
                  <td>`+element.Name+`</td>
                  <td>`+element.LastName+`</td>
                  <td>`+element.FatherName+`</td>
                  <td>`+element.BirthDate+`</td>
                  <td>`+element.BirthPlace+`</td>
                  <td>`+element.PassNo+`</td>
                  <td>`+element.PassEndDate+`</td>
                  <td>`+element.CellPhone+`</td>
                  <td>`+element.OtherPhone+`</td>
                  <td>`+element.RefCode+`</td>
                  <td>`+element.UserAddress+`</td>
                  <td>`+element.referDate+`</td>
                  <td>
                      <span class="form-check">
                          <input class="form-check-input " type="radio" name="exampleRadios" id="exampleRadios2" value="`+element.DocSn+`">
                      </span>
                  </td>
          </tr>`);

                });
            },
            error: function(msg) {
              alert("data resp errors");
            }
        });
          
        } else {
          swal("منصرف شدید");
        }
      });
    });


    $("#editDocumentBtn").on("click",()=>{
      $.ajax({
        type: "get",
        url: baseUrl + "/getDocument",
        data: {
            _token: "{{ csrf_token() }}",
            docID: $("#selectedDocID").val()
        },
        dataType: "json",
        success: function(respond) {
          
          let resp=respond[0];
          let countries=respond[1];
          $("#editDocsList").modal("show");
          $("#PassNo").val(resp.PassNo);
          $("#Name").val(resp.Name);
          $("#LastName").val(resp.LastName);
          $("#FatherName").val(resp.FatherName);
          $("#BirthDate").val(resp.BirthDate);
          $("#BirthPlace").empty();
          countries.forEach((element)=>{
            let isSelected="";
            if(resp.BirthPlace==element.countrySn)
            {
              isSelected="selected";
              
            }
            $("#BirthPlace").append(`<option `+isSelected+` value="`+element.countrySn+`">`+element.Name+`</option>`);
            
          });

           if(resp.Gender==1){
          $("#sex").append(`
          <option selected value="1">مرد</option>
          <option  value="0">زن</option>`);
          }else{
            $("#sex").append(`
            <option  value="1">مرد</option>
            <option selected value="0">زن</option>`);
          }
          
          $("#PassEndDate").val(resp.PassEndDate);
          $("#CellPhone").val(resp.CellPhone);
          $("#OtherPhone").val(resp.OtherPhone);
          $("#RefCode").val(resp.RefCode);
          $("#ReferDate").val(resp.referDate);
          $("#PersonAddress").val(resp.UserAddress);
          $("#DocId").val(resp.DocSn);
        },
        error:function(error){

        }
      });
    });

    $("#printDocumentBtn").on("click",function(){

        alert($(this).val());

    });
        
    $("#okeDocumentBtn").on("click",function(){
        swal({
            title: "اخطار!",
            text: "آیا میخواهید تایید گردد",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
        $.ajax({
            type: "get",
            url: baseUrl + "/okeDocument",
            data: {
                _token: "{{ csrf_token() }}",
                DocSn: $("#okeDocumentBtn").val()
            },
            dataType: "json",
            success: function(respond) {
                swal({
                    title: "تایید!",
                    text: "موفقانه تایید شد",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                  });
                  window.location.reload();
            },
            error:function(error){
                alert("server data response error");
            }
        });
    }});

    });
    
    $("#rejectDocumentBtn").on("click",function(){
        swal({
            title: "اخطار!",
            text: "آیا میخواهید رد گردد",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
        $.ajax({
            type: "get",
            url: baseUrl + "/rejectDocument",
            data: {
                _token: "{{ csrf_token() }}",
                DocSn: $("#rejectDocumentBtn").val()
            },
            dataType: "json",
            success: function(respond) {
                swal({
                    title: "تایید!",
                    text: "موفقانه رد شد",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                  });
                  window.location.reload();
            },
            error:function(error){
                alert("server data response error");
            }
        });
    }
});

    });
    
    
    $("#deleteDocumentBtn").on("click",function(){

        alert($(this).val());

    });

    function selectTableTrDocs(element) {
        let input = $(element).find('input:radio').prop("checked", true);
        $("#printDocumentBtn").val(input.val());
        
        $("#okeDocumentBtn").val(input.val());
        
        $("#rejectDocumentBtn").val(input.val());
        
        $("#editDocumentBtn").val(input.val());
        
        $("#deleteDocumentBtn").val(input.val());
        $("#docDetailsBtn").val(input.val());
        $("#docDetailsInp").val(input.val());
        
    }


$("#adminDetails").on("click", ()=>{
   
    $("#adminDetailsModal").modal("show");
});

   



  $(document).ready( function () {
  
  $('.evisaDataTable').DataTable({
          "order": [],
          "columnDefs": [ {
          "targets"  : 0,
          "orderable": false,
          },
          { className: "dt[-head|-body]-center", targets: "_all" },
      ],

      searchable: true,
      visible: true,
      paginate: true,
      info: true,

      "language": {
          "emptyTable": "هیچ داده‌ای در جدول وجود ندارد",
          "info": "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
          "infoEmpty": "نمایش 0 تا 0 از 0 ردیف",
          "infoFiltered": "(فیلتر شده از _MAX_ ردیف)",
          "infoThousands": ",",
          "lengthMenu": "نمایش _MENU_ ردیف",
          "processing": "در حال پردازش...",
          "search": "جستجو:",
          "zeroRecords": "رکوردی با این مشخصات پیدا نشد",
          "paginate": {
              "next": "بعدی",
              "previous": "قبلی",
              "first": "ابتدا",
              "last": "انتها"
          },
          "aria": {
              "sortAscending": ": فعال سازی نمایش به صورت صعودی",
              "sortDescending": ": فعال سازی نمایش به صورت نزولی"
          },
          "autoFill": {
              "cancel": "انصراف",
              "fill": "پر کردن همه سلول ها با ساختار سیستم",
              "fillHorizontal": "پر کردن سلول به صورت افقی",
              "fillVertical": "پرکردن سلول به صورت عمودی"
          },
          "buttons": {
              "collection": "مجموعه",
              "colvis": "قابلیت نمایش ستون",
              "colvisRestore": "بازنشانی قابلیت نمایش",
              "copy": "کپی",
              "copySuccess": {
                  "1": "یک ردیف داخل حافظه کپی شد",
                  "_": "%ds ردیف داخل حافظه کپی شد"
              },
              "copyTitle": "کپی در حافظه",
              "excel": "اکسل",
              "pageLength": {
                  "-1": "نمایش همه ردیف‌ها",
                  "_": "نمایش %d ردیف"
              },
              "print": "چاپ",
              "copyKeys": "برای کپی داده جدول در حافظه سیستم کلید های ctrl یا ⌘ + C را فشار دهید",
              "csv": "فایل CSV",
              "pdf": "فایل PDF",
              "renameState": "تغییر نام",
              "updateState": "به روز رسانی"
          },
          "searchBuilder": {
              "add": "افزودن شرط",
              "button": {
                  "0": "جستجو ساز",
                  "_": "جستجوساز (%d)"
              },
              "clearAll": "خالی کردن همه",
              "condition": "شرط",
              "conditions": {
                  "date": {
                      "after": "بعد از",
                      "before": "بعد از",
                      "between": "میان",
                      "empty": "خالی",
                      "equals": "برابر",
                      "not": "نباشد",
                      "notBetween": "میان نباشد",
                      "notEmpty": "خالی نباشد"
                  },
                  "number": {
                      "between": "میان",
                      "empty": "خالی",
                      "equals": "برابر",
                      "gt": "بزرگتر از",
                      "gte": "برابر یا بزرگتر از",
                      "lt": "کمتر از",
                      "lte": "برابر یا کمتر از",
                      "not": "نباشد",
                      "notBetween": "میان نباشد",
                      "notEmpty": "خالی نباشد"
                  },
                  "string": {
                      "contains": "حاوی",
                      "empty": "خالی",
                      "endsWith": "به پایان می رسد با",
                      "equals": "برابر",
                      "not": "نباشد",
                      "notEmpty": "خالی نباشد",
                      "startsWith": "شروع  شود با",
                      "notContains": "نباشد حاوی",
                      "notEnds": "پایان نیابد با",
                      "notStarts": "شروع نشود با"
                  },
                  "array": {
                      "equals": "برابر",
                      "empty": "خالی",
                      "contains": "حاوی",
                      "not": "نباشد",
                      "notEmpty": "خالی نباشد",
                      "without": "بدون"
                  }
              },
              "data": "اطلاعات",
              "logicAnd": "و",
              "logicOr": "یا",
              "title": {
                  "0": "جستجو ساز",
                  "_": "جستجوساز (%d)"
              },
              "value": "مقدار",
              "deleteTitle": "حذف شرط فیلتر",
              "leftTitle": "شرط بیرونی",
              "rightTitle": "شرط داخلی"
          },
          "select": {
              "cells": {
                  "1": "1 سلول انتخاب شد",
                  "_": "%d سلول انتخاب شد"
              },
              "columns": {
                  "1": "یک ستون انتخاب شد",
                  "_": "%d ستون انتخاب شد"
              },
              "rows": {
                  "1": "1ردیف انتخاب شد",
                  "_": "%d  انتخاب شد"
              }
          },
          "thousands": ",",
          "searchPanes": {
              "clearMessage": "همه را پاک کن",
              "collapse": {
                  "0": "صفحه جستجو",
                  "_": "صفحه جستجو (٪ d)"
              },
              "count": "{total}",
              "countFiltered": "{shown} ({total})",
              "emptyPanes": "صفحه جستجو وجود ندارد",
              "loadMessage": "در حال بارگیری صفحات جستجو ...",
              "title": "فیلترهای فعال - %d",
              "showMessage": "نمایش همه"
          },
          "loadingRecords": "در حال بارگذاری...",
          "datetime": {
              "previous": "قبلی",
              "next": "بعدی",
              "hours": "ساعت",
              "minutes": "دقیقه",
              "seconds": "ثانیه",
              "amPm": [
                  "صبح",
                  "عصر"
              ],
              "months": {
                  "0": "ژانویه",
                  "1": "فوریه",
                  "10": "نوامبر",
                  "2": "مارچ",
                  "4": "می",
                  "6": "جولای",
                  "8": "سپتامبر",
                  "11": "دسامبر",
                  "3": "آوریل",
                  "5": "جون",
                  "7": "آست",
                  "9": "اکتبر"
              },
              "unknown": "-",
              "weekdays": [
                  "یکشنبه",
                  "دوشنبه",
                  "سه‌شنبه",
                  "چهارشنبه",
                  "پنجشنبه",
                  "جمعه",
                  "شنبه"
              ]
          },
          "editor": {
              "close": "بستن",
              "create": {
                  "button": "جدید",
                  "title": "ثبت جدید",
                  "submit": "ایجــاد"
              },
              "edit": {
                  "button": "ویرایش",
                  "title": "ویرایش",
                  "submit": "به‌روزرسانی"
              },
              "remove": {
                  "button": "حذف",
                  "title": "حذف",
                  "submit": "حذف",
                  "confirm": {
                      "_": "آیا از حذف %d خط اطمینان دارید؟",
                      "1": "آیا از حذف یک خط اطمینان دارید؟"
                  }
              },
              "multi": {
                  "restore": "واگرد",
                  "noMulti": "این ورودی را می توان به صورت جداگانه ویرایش کرد، اما نه بخشی از یک گروه"
              }
          },
          "decimal": ".",
          "stateRestore": {
              "creationModal": {
                  "button": "ایجاد",
                  "columns": {
                      "search": "جستجوی ستون",
                      "visible": "وضعیت نمایش ستون"
                  },
                  "name": "نام:",
                  "order": "مرتب سازی",
                  "paging": "صفحه بندی",
                  "search": "جستجو",
                  "select": "انتخاب",
                  "title": "ایجاد وضعیت جدید",
                  "toggleLabel": "شامل:"
              },
              "emptyError": "نام نمیتواند خالی باشد.",
              "removeConfirm": "آیا از حذف %s مطمئنید؟",
              "removeJoiner": "و",
              "removeSubmit": "حذف",
              "renameButton": "تغییر نام",
              "renameLabel": "نام جدید برای $s :"
          }
      }
  });

} );