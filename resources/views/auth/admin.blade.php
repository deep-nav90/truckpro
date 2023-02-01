@extends('layouts.admin')
@section('content')


      <section id="wrapper">
        <div class="login-register" style="background-image:url(<?= asset('images/background/truckbg.jpg')?>);">
            <div class="login-box card" style="background-color: #fdfeffeb !important;">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform"  >
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
      

@endsection