@extends('layouts.admin')
@section('content')


      <section id="wrapper">
        <div class="login-register" style="background-image:url(<?= asset('images/background/truckbg.jpg')?>);">
            <div class="login-box card" style="background-color: #fdfeffeb !important;">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform">
                        <h3 class="box-title m-b-20 text-center">Sign In</h3>


                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text"  name="username" placeholder="Username"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password"  name="password" placeholder="Password"> </div>
                        </div>
                      
                        <div class="form-group text-right m-t-20" >

                            <div class="col-xs-12" style="margin: 0;padding: 0;">
                                @csrf
                                <button class="btn btn-info btn-block text-uppercase waves-effect waves-light login_action" type="submit">Log In</button>
                            </div>
                        </div>
                    

                       <!--  <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <div>Don't have an account? <a href="pages-register.html" class="text-info m-l-5"><b>Sign Up</b></a></div>
                            </div>
                        </div> -->
                    </form>
                  
                </div>
            </div>
        </div>
    </section> 
    <script type="text/javascript">
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
                        console.log('ttf',data);
                        if(data=='success'){
                        
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
                                  window.location = "{{ url('dashboard') }}";
                              }, 500);
                   }else if(data=='fail'){
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
      </script>
    {{-- <script src=" {{ asset('dist/js/adminpage/login.js') }}"></script> --}}
@endsection