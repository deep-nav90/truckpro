$(document).ready(function(){
    $("#licence_doc").on('change', function() {
        //Get count of selected files
        var countFiles = $(this)[0].files.length;
        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $("#image-holder-licence");
        image_holder.empty();
        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
          if (typeof(FileReader) != "undefined") {
            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++) 
            {
              var reader = new FileReader();
              reader.onload = function(e) {
                $("<img />", {
                  "src": e.target.result,
                  "class": "thumb-image"
                }).appendTo(image_holder);
              }
              image_holder.show();
              reader.readAsDataURL($(this)[0].files[i]);
            }
          } else {
            alert("This browser does not support FileReader.");
          }
        } else {
          alert("Pls select only images");
        }
      });
      //aadhar card upload
      $("#aadhar_card_doc").on('change', function() {
        //Get count of selected files
        var countFiles = $(this)[0].files.length;
        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $("#image-holder-aadhar");
        image_holder.empty();
        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
          if (typeof(FileReader) != "undefined") {
            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++) 
            {
              var reader = new FileReader();
              reader.onload = function(e) {
                $("<img />", {
                  "src": e.target.result,
                  "class": "thumb-image"
                }).appendTo(image_holder);
              }
              image_holder.show();
              reader.readAsDataURL($(this)[0].files[i]);
            }
          } else {
            alert("This browser does not support FileReader.");
          }
        } else {
          alert("Pls select only images");
        }
      });

      //save doc
      $(document).on('click','.selfbtn',function(){
        var error=0;
        $('.myrequire').each(function() {
            console.log('muid',$('#'+this.id).val());
            if($('#'+this.id).val()=="")
            {
                $('#'+this.id).css("border", "1px solid red");
                error++;
                setTimeout(function() {
                    console.log('cc');
                    $('#'+this.id).css("border", "1px solid #ced4da");
                }, 5000);
            }
        });
        if(error===0)
        {
          var myurl   = window.location.origin; 
          var fd = new FormData($('#sellfformtruck')[0]);
          $.ajax({
              type: "POST",
              url: myurl + '/driver/store',
              contentType: false,
              processData: false,
              data: fd,
              success: function(response) {
                 console.log(response);
                 $('#successmsgshow').show();
                 $('.servicemsgshow').addClass('message-header')
                 $('.servingmsgsuccess').text(response.message);
                 $('.servingmsgsuccess').fadeIn().delay(500).fadeOut();
                //  window.location.href = url + "/admin/rate-plan/edit" + "/" + response.rate_plan_id;
              },
              error: function(message) {
                  console.log('error', message);
              }
          });
        }
        
      })

})