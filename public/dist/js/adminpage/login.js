$(document).ready(function(){
   
    $('#loginform').submit(function(e) {
        e.preventDefault();
       start_loader();
      var isValid = true;
      if($('input[name="username"]').val().trim()==''){
         swal({
             title: "Notice",
             text: 'Username and Password is Required',
             type: "warning",
             showCancelButton: false,
             confirmButtonColor: "#DD6B55",
             confirmButtonText: "Ok",
             cancelButtonText:false,
             closeOnConfirm: false,
             closeOnCancel: false,
               dangerMode: true,
         });
        isValid = false;
      }
      if($('input[name="password"]').val()==''){
        isValid = false;
        swal({
             title: "Notice",
             text: 'Username and Password is Required',
             type: "warning",
             showCancelButton: false,
             confirmButtonColor: "#DD6B55",
             confirmButtonText: "Ok",
             cancelButtonText:false,
             closeOnConfirm: false,
             closeOnCancel: false,
               dangerMode: true,
         });
      }
      if(isValid){
          $.ajax({
              url: "{{ route('checklogin') }}",
              type: "POST",
              data: $("#loginform").serialize(),
              success: function(data) {
                  stop_loader();
                  if(data.status=='success'){
                  
                      swal({
                             title: "Login Successfully",
                             text: "",
                             type: "success",
                             showCancelButton: false,
                             confirmButtonColor: "#DD6B55",
                             confirmButtonText: "Ok",
                             cancelButtonText:false,
                             closeOnConfirm: false,
                             closeOnCancel: false
                         });
                        setTimeout(() => {
                            window.location = data.redirect;
                        }, 500);
             }else if(data.status=='fail'){
                   $('input[name=username]').css('border','2px solid red');
                   $('input[name=password]').css('border','2px solid red');
                     swal({
                         title: "Notice",
                         text: data.msg,
                         type: "warning",
                         showCancelButton: false,
                         confirmButtonColor: "#DD6B55",
                         confirmButtonText: "Ok",
                         cancelButtonText:false,
                         closeOnConfirm: false,
                         closeOnCancel: false,
                           dangerMode: true,
                     });
            }else{
                     swal({
                         title: "Notice",
                         text: "Server Error",
                         type: "warning",
                         showCancelButton: false,
                         confirmButtonColor: "#DD6B55",
                         confirmButtonText: "Ok",
                         cancelButtonText:false,
                         closeOnConfirm: false,
                         closeOnCancel: false,
                           dangerMode: true,
                     });
              
            }
                  
                  
              },

          });
           return false;
      }
       // your code here
    });
   
})