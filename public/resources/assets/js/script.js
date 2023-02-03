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

       if($("#adminDetails")){
        $("#adminDetails").prop("disabled",false);
    }
    if($("#editAdminBtn")){
        $("#editAdminBtn").prop("disabled",false);
    }
    if($("#deleteAdminBtn")){
        $("#deleteAdminBtn").prop("disabled",false);
    }
    
    }

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
        $("#cancelRequestBtn").prop("disabled",false);
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

    function selectTableTrOutBranch(element){
        let input = $(element).find('input:radio').prop("checked", true);
        
        $("#showOutDetails").val(input.val());
        $("#editOutBranchBtn").val(input.val());
        $("#deleteOutBranche").val(input.val());
        $("#okeOutBranchBtn").val(input.val());
        $("#showOutDetails").prop("disabled",false);
        $("#editOutBranchBtn").prop("disabled",false);
        $("#deleteOutBranche").prop("disabled",false);
        $("#okeOutBranchBtn").prop("disabled",false);

        if($("#selectedBranchIDDetail")){
            $("#selectedBranchIDDetail").val($(input).val());
        }
            
    }
    $("#okeOutBranchBtn").on("click",()=>{
        $.ajax({
            method:'get',
            url:baseUrl+'/moveToBranch',
            data:{_token:"{{@csrf}}",
            branchID:$("#okeOutBranchBtn").val()},
            async:true,
            success:function(response){
                window.location.reload();
            },
            error:function(error){

            }
        });
    });

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
                  <tr class="docsTr" onclick="selectTableTr(this)">
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

$("#deleteOutBranche").on("click",()=>{

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
            url: baseUrl + "/deleteOutBranch",
            data: {
                _token: "{{ csrf_token() }}",
                BranchID: $("#deleteOutBranche").val()
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

    $("#editOutBranchBtn").on("click",()=>{
        $.ajax({
            type: "get",
            url: baseUrl + "/getOutBranch",
            data: {
                _token: "{{ csrf_token() }}",
                BranchID: $("#editOutBranchBtn").val()
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
                $("#cellPhone1").val(resp.CellPhone);
                $("#cellPhone2").val(resp.OtherPhone);
                $("#JawazNumber").val(resp.JawazNumber);
                $("#BossName").val(resp.BossName);

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
       if($(element).val().length>2){
        $.ajax({
            type: "get",
            url: baseUrl + "/checkBranchUserName",
            data: {
                _token: "{{ csrf_token() }}",
                username:$(element).val()
            },
            dataType: "json",
            success: function(resp) {
                console.log(resp)
                if(resp==1){
                    $("#userExistError").css("display","block");
                    $("#SaveSubmitOut").prop("disabled",true);
                }else{
                    $("#SaveSubmitOut").prop("disabled",false);
                    $("#userExistError").css("display","none");
                }
            },
            error:function(error){
                console.log(error)
            }
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
                docID: $("#deleteDocumentBtn").val()
            },
            dataType: "json",
            success: function(resp) {
              swal("موفقانه حذف گردید", {
                icon: "success",
              });
    window.location.reload();
                //
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
            docID:$("#editDocumentBtn").val()
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
          switch (resp.province) {
            case "بدخشان":
                $("#v1").prop("selected",true);
                
                break;
                case "بادغیس":
                $("#v2").prop("selected",true);
                
                break;
            case "بغلان":
                $("#v3").prop("selected",true);
                
                break;
            case "بلخ":
                $("#v4").prop("selected",true);
                
                break;
            case "بامیان":
                $("#v5").prop("selected",true);
                
                break;
            case "دایکندی":
                $("#v6").prop("selected",true);
                
                break;
            case "فراه":
                $("#v7").prop("selected",true);
                
                break;
            case "فاریاب":
                $("#v8").prop("selected",true);
                
                break;
            case "غزنی":
                $("#v9").prop("selected",true);
                
                break;
            case "غور":
                $("#v10").prop("selected",true);
                
                break;
            case "هلمند":
                $("#v11").prop("selected",true);
                
                break;
            case "هرات":
                $("#v12").prop("selected",true);
                
                break;
            case "جوزجان":
                $("#v13").prop("selected",true);
                
                break;
            case "کابل":
                $("#v14").prop("selected",true);
                
                break;
            case "کندهار":
                $("#v15").prop("selected",true);
                
                break;
            case "کاپیسا":
                $("#v16").prop("selected",true);
                
                break;
            case "خوست":
                $("#v17").prop("selected",true);
                
                break;
            case "کنر":
                $("#v18").prop("selected",true);
                
                break;
            case "کندز":
                $("#v19").prop("selected",true);
                
                break;
            case "لغمان":
                $("#v20").prop("selected",true);
                
                break;
            case "لوگر":
                $("#v21").prop("selected",true);
                
                break;
            case "ننگرهار":
                $("#v22").prop("selected",true);
                
                break;
            case "نیمروز":
                $("#v23").prop("selected",true);
                
                break;
            case "نورستان":
                $("#v24").prop("selected",true);
                
                break;
            case "ارزگان":
                $("#v25").prop("selected",true);
                
                break;
            case "پکتیا":
                $("#v26").prop("selected",true);
                
                break;
            case "پکتیکا":
                $("#v27").prop("selected",true);
                
                break;
            case "پنجشیر":
                $("#v28").prop("selected",true);
                
                break;
            case "دایکندی":
                $("#v29").prop("selected",true);
                
                break;
            case "پروان":
                $("#v30").prop("selected",true);
                
                break;
            case "سمنگان":
                $("#v31").prop("selected",true);
                
                break;
            case "سرپل":
                $("#v32").prop("selected",true);
                
                break;
            case "تخار":
                $("#v33").prop("selected",true);
                break;
            case "وردک":
                $("#v34").prop("selected",true);
                break;
    
            case "زابل":
                $("#v35").prop("selected",true);
                break;
                  
            default:
                break;
          }
          if(resp.visaType=='ورود'){
            $("#vrood").prop("selected",true);
          }
          if(resp.visaType=='جهانگردی'){
            $("#jahangardi").prop("selected",true);
          }
          if(resp.visaType=='جهانگردی فوری'){
            $("#fastJahangardi").prop("selected",true);
          }
          if(resp.visaType=='خدمت'){
            $("#khidmat").prop("selected",true);
          }
          if(resp.visaType=='سیاسی'){
            $("#politic").prop("selected",true);
          }
          if(resp.visaType=='خانوده'){
            $("#family").prop("selected",true);
          }
          if(resp.visaType=='زیارتی'){
            $("#ziyarati").prop("selected",true);
          }
          if(resp.visaType=='زیارت اربعین'){
            $("#arbaeen").prop("selected",true);
          }
          if(resp.visaType=='بازدید بستگان'){
            $("#bazdid").prop("selected",true);
          }
          if(resp.visaType=='تجارت'){
            $("#commercial").prop("selected",true);
          }
        },
        error:function(error){

        }
      });
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
                $("#confirmableDocId").val($("#okeDocumentBtn").val());
                $("#addmingMoneyModal").modal("show");
                }
            });

    });

    $("#addDocMoneyForm").on("submit",function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                window.location.reload();
            },
            error:function(data){

            }
        });
    })
            // $.ajax({
        //     type: "get",
        //     url: baseUrl + "/okeDocument",
        //     data: {
        //         _token: "{{ csrf_token() }}",
        //         DocSn: $("#okeDocumentBtn").val()
        //     },
        //     dataType: "json",
        //     success: function(respond) {
        //         swal({
        //             title: "تایید!",
        //             text: "موفقانه تایید شد",
        //             icon: "success",
        //             buttons: true,
        //             dangerMode: true,
        //           });
        //           window.location.reload();
        //     },
        //     error:function(error){
        //         alert("server data response error");
        //     }
        // });
    
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
    
    

function selectTableTrDocs(element) {
    let input = $(element).find('input:radio').prop("checked", true);
        $("#printDocumentBtn").val(input.val());
        $("#okeDocumentBtn").val(input.val());
        $("#rejectDocumentBtn").val(input.val());
        $("#editDocumentBtn").val(input.val());
        $("#deleteDocumentBtn").val(input.val());
        $("#docDetailsBtn").val(input.val());
        $("#docDetailsInp").val(input.val());
        

        $("#printDocumentBtn").prop('disabled',false);

        
        
        $("#deleteDocumentBtn").prop('disabled',false);
        $("#docDetailsBtn").prop('disabled',false);
        $("#docDetailsInp").prop('disabled',false);

      $.ajax({
        type: "get",
        url: baseUrl + "/getDocument",
        data: {
            _token: "{{ csrf_token() }}",
            docID:input.val()
        },
        dataType: "json",
        success: function(respond) {
            if(respond[0].isOke==0){
                $("#okeDocumentBtn").prop('disabled',false);
                $("#rejectDocumentBtn").prop('disabled',false);
                $("#editDocumentBtn").prop('disabled',false);
            }else{
                $("#okeDocumentBtn").prop('disabled',true);
                $("#rejectDocumentBtn").prop('disabled',true);
                $("#editDocumentBtn").prop('disabled',true);
            }
},
error:function(){

}});
        
    
}


$("#adminDetails").on("click", ()=>{ 
    $("#adminDetailsModal").modal("show");
});

$("#tasviyahToEmbossyBtn").on("click",function(){
    swal({
        title: "خطا!",
        text: "آیا از تسویه مطمیین هستید؟",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                method:"get",
                url:baseUrl+'/tasviyahWithEmbossy',
                data:{_token:"{{@csrf}}"},
                async:true,
                success:function(respond){
                    window.location.reload();
                },
                error:function(error){

                }
            })
        }
      });
})


  $(document).ready( function () {
  
  $('.evisaDataTable').DataTable({
          "order": [],
          "columnDefs": [
            { "targets"  : 0, "orderable": false},
            { targets: -1, orderable: false },
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