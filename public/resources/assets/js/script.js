var baseUrl = "http://127.0.0.1:8000";
var myVar;


function selectTableTr(element) {
    let input = $(element).find('input:radio').prop("checked", true);
    $("#selectedDocID").val($(input).val());
    $('.select-highlight tr').removeClass('tableTrSelected');
    $(element).addClass('tableTrSelected');
    
    };
    

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
        },
        error:function(error){

        }
      });
    });



