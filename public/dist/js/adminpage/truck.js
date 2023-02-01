$(document).ready(function() {
  var myurl   = window.location.origin;
    $("#registerUploaddoc").on('change', function() {
      //Get count of selected files
      var countFiles = $(this)[0].files.length;
      var imgPath = $(this)[0].value;
      var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
      var image_holder = $("#image-holder");
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

    //national permit
    $("#nationalpermitUploaddoc").on('change', function() {
      //Get count of selected files
      var countFiles = $(this)[0].files.length;
      var imgPath = $(this)[0].value;
      var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
      var image_holder = $("#national-permit-holder");
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
    //end national permit

    //punjab permit
    
    $("#punjabpermitUploaddoc").on('change', function() {
      //Get count of selected files
      var countFiles = $(this)[0].files.length;
      var imgPath = $(this)[0].value;
      var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
      var image_holder = $("#punjab-permit-holder");
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
    //end punjab permit
   //Insurance holder
    
   $("#insuranceUploaddoc").on('change', function() {
    //Get count of selected files
    var countFiles = $(this)[0].files.length;
    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $("#insurance-holder");
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
  //end insurance holder
     //drivinglic permit
    
 //Insurance holder
    
 $("#polutionUploaddoc").on('change', function() {
  //Get count of selected files
  var countFiles = $(this)[0].files.length;
  var imgPath = $(this)[0].value;
  var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
  var image_holder = $("#polution-holder");
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
//end insurance holder
    //end punjab permit
    

    //pancard 
    $("#pancardUploaddoc").on('change', function() {
      //Get count of selected files
      var countFiles = $(this)[0].files.length;
      var imgPath = $(this)[0].value;
      var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
      var image_holder = $("#pancard-holder");
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
    //end pancard
    

    
    //pancard 
    $("#affidavitUploaddoc").on('change', function() {
      //Get count of selected files
      var countFiles = $(this)[0].files.length;
      var imgPath = $(this)[0].value;
      var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
      var image_holder = $("#affi-holder");
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
    //end pancard
// pan card validation
$(".pan_card_no").change(function () {      
  var inputvalues = $(this).val().toUpperCase();  
  $('.pan_card_no_error').hide(); 
    var regex = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/;    
    if(!regex.test(inputvalues)){      
    $(".pan_card_no").val("");    
    $('.pan_card_no_error').show(); 
    $('#pan_card_no').val(1);
       
    return regex.test(inputvalues);    
    }    
  });
// end pan card validation
    //trucktype
    $(document).change('.trucktype',function(){
        var truckid=$(".trucktype").val();
        $('#selftruck').addClass('d-none');
        $('#othertruck').addClass('d-none');
        $('#myselfbtn').addClass('d-none');
        $('#myotherbtn').addClass('d-none');
        if(truckid==1)
        {
            $('#myselfbtn').removeClass('d-none');
            $('#selftruck').removeClass('d-none');
        }
        if(truckid==2)
        {
            $('#myotherbtn').removeClass('d-none');
            $('#othertruck').removeClass('d-none');
        }

    })
    //end truck type
    //submit truck
    $(document).on('click','.selfbtn',function(){
      var error=0;
      $('.error').hide();
      if($('#truckerrr').val()==1)
      {
        error++;
        $('.truck_no_error').show();
        $('.truck_no_error').text('Truck no is required');
      }
      if($('.truckno').val()=='')
      {
        error++;
        $('.truck_no_error').show();
        $('.truck_no_error').text('Truck no is required');
      }
      if($('.driver_name').val()==0)
      {
        error++;
        $('.driver_name_error').show();
        $('.driver_name_error').text('Must be selected');
      }
      if($('.insurance_no').val()=='')
      {
        error++;
        $('.insurance_no_error').show();
        $('.insurance_no_error').text('Insurance no is required');
      }
      if($('.insurance_exp_date').val()=='')
      {
        error++;
        $('.insurance_exp_date_error').show();
        $('.insurance_exp_date_error').text('Insurance exp date is required');
      }
      if($('.polution_no').val()=='')
      {
        error++;
        $('.polution_no_error').show();
        $('.polution_no_error').text('Polution no is required');
      }
      if($('.polution_exp_date').val()=='')
      {
        error++;
        $('.polution_exp_date_error').show();
        $('.polution_exp_date_error').text('Polution exp date is required');
      }
      console.log("error",error);
      if(error==0)
      {
        var fd = new FormData($('.sellfformtruck')[0]);
        fd.append("trucktype",$('.trucktype').val());
         var myurl   = window.location.origin; 
         console.log("formdata",myurl);
         $.ajax({
             type: "POST",
             url: myurl+"/truck/store",
             contentType: false,
             processData: false,
             data: fd,
             success: function(response) {
                 console.log('response',response);
             },
             error: function(xhr) {
           }
         });
      }
      
    })
      //other truck
      $(document).on('click','.ownerbtn',function(){
        var error=0;
        $('.error').hide();
        if($('#truckerrr').val()==1)
        {
          error++;
          $('.truck_no_error').show();
          $('.truck_no_error').text('Truck no is required');
        }
        if($('.truckno').val()=='')
        {
          error++;
          $('.truck_no_error').show();
          $('.truck_no_error').text('Truck no is required');
        }
        if($('.owner_name').val()=='')
        {
          error++;
          $('.owner_name_error').show();
          $('.owner_name_error').text('Name is required');
        }
        if($('.pan_card_no').val()=='')
        {
          error++;
          $('.pan_card_no_error').show();
          $('.pan_card_no_error').text('Number is required');
        }
        if($('.pan_card_no').val()=='')
        {
          error++;
          $('.pan_card_no_error').show();
          $('.pan_card_no_error').text('Number is required');
        }
        if($('#pan_card_no').val()=='1')
        {
          error++;
          $('.pan_card_no_error').show();
          $('.pan_card_no_error').text('Number is required');
        }
        if($('.bank_name').val()=='')
        {
          error++;
          $('.bank_name_error').show();
          $('.bank_name_error').text('Bank name is required');
        }
        if($('.account_no').val()=='')
        {
          error++;
          $('.account_no_error').show();
          $('.account_no_error').text('Account no is required');
        }
        if($('.ifsc_no').val()=='')
        {
          error++;
          $('.ifsc_no_error').show();
          $('.ifsc_no_error').text('IFSC no is required');
        }
        console.log("OOOOOOOOOOOOO",error);
        if(error==0)
      {
        var fd = new FormData($('.otherformtruck')[0]);
      fd.append("trucktype",$('.trucktype').val());
        var myurl   = window.location.origin; 
        console.log("formdata",myurl);
        $.ajax({
            type: "POST",
            url: myurl+"/truck/store",
            contentType: false,
            processData: false,
            data: fd,
            success: function(response) {
                console.log('response',response);
            },
            error: function(xhr) {
            }
        });
      } 
    })

    var timeout = null;
    $(document).on('keyup','.truckno',function(){
          clearTimeout(timeout);
          $('.truck_no_error').hide();
                  $('.truck_no_error').text('');
          timeout = setTimeout(() => {
            trucksearch($(this).val())
            
            
          },1000);
        });
    //truck search
        function trucksearch(truck_no){
          $.ajax({
            type: "get",
            url: myurl+"/truck_no_search/"+truck_no,
            
            success: function(response) {
              if(response=='already')
              {
                $('#truckerrr').val(1)
                $('.truck_no_error').show();
                $('.truck_no_error').text('Truck no already enter');
              }
              else if(response=='empty')
              {
                $('#truckerrr').val(1)
                $('.truck_no_error').show();
                $('.truck_no_error').text('Truck no is required');
              }
              else
              {
                $('#truckerrr').val(0)
                $('.truck_no_error').hide();
                $('.truck_no_error').text('');
              }
              
                console.log('response',response);
                return "hghgghj"
            },
            error: function(xhr) {
            }
        });
        }
  
  });