var baseUrl = "https://127.0.0.1:8000";
var myVar;


function selectTableTr(element) {
    let input = $(element).find('input:radio').prop("checked", true);
    
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
          swal("موفقانه حذف گردید", {
            icon: "success",
          });
        } else {
          swal("منصرف شدید");
        }
      });
    });


