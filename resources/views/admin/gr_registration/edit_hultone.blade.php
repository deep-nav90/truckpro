@extends('layouts.app')
@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Hul Tone</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Hul Tone</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Hul Tone</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
           
            <form class="sellfformtruck"  method="POST"  enctype="multipart/form-data" id="hultoneRegisterForm">
                @csrf


                

            <div class="row card-footer mb-3">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tone Sr. No.</label>
                        <input type="text" name="tone_serial_number" value = "{{$find_hul_tone->tone_serial_number}}" maxlength="10" class="form-control" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-md-4">
                    
                    <div class="form-group">
                      <label>Hul Tone</label>
                        <input type="text" maxlength="3" name="hul_tone" value = "{{$find_hul_tone->hul_tone}}" class="form-control only-numeric" placeholder="Enter ...">
                    </div>
                </div>

                <div class="col-md-4">
                    
                    <div class="form-group">
                      <label>Price</label>
                        <input type="text" maxlength="6" name="price" value="{{$find_hul_tone->price}}" class="form-control only-numeric" placeholder="Enter ...">
                    </div>
                </div>
                
              
              </div>

              
              
                <!-- row div -->
            </div> 
            {{-- newrow --}}
            
          
            <div class="row">
              <div class="col-md-12">
                <div class="card-footer">
                    <a href="{{route('admin.gr-register.hulTone')}}" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-info float-right selfbtn saveBtn" disabled="true">Save</button>
                  
                </div>
              </div>
            </div>
          </form>
      
             {{-- row dive end --}}
           
            <!-- /.row -->
          </div>
       
        </div>
        <!-- /.card -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

    

@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js" integrity="sha256-NdDw7k+fJewgwI1XmH9NMR6OILvTX+3arqb/OgFicoM=" crossorigin="anonymous"></script>

  <script type="text/javascript">
    
    $(document).ready(function() {
      $(".only-numeric").bind("keypress", function (e) {
          var keyCode = e.which ? e.which : e.keyCode
               
          if (!(keyCode >= 48 && keyCode <= 57)) {
            return false;
          }
      });


      $.validator.addMethod("check_exists_hul_tone",function(argument){
        var exit;
        $.ajax({
          url: "{{route('admin.gr-register.checkExistsHulTone')}}",
          type:"POST",
          data: {
            hul_tone: argument,
            id : "{{$find_hul_tone->id}}",
            '_token': "{{csrf_token()}}",
          },
          async: false,
          success:function(data){
            exit = data
          }
        });
        return exit == 1?false:true;
          
      },'Hul Tone already exists.');


      $.validator.addMethod("check_tone_serial_number",function(argument){
        var exit;
        $.ajax({
          url: "{{route('admin.gr-register.checkToneSerialNumber')}}",
          type:"POST",
          data: {
            tone_serial_number: argument,
            id : "{{$find_hul_tone->id}}",
            '_token': "{{csrf_token()}}",
          },
          async: false,
          success:function(data){
            exit = data
          }
        });
        return exit == 1?false:true;
          
      },'Tone serial number already exists.');

      $('#hultoneRegisterForm').validate({ // initialize the plugin
          rules: {
              tone_serial_number: {
                  required: true,
                  check_tone_serial_number : true
              },
              hul_tone: {
                  required: true,
                  check_exists_hul_tone : true
              },
              price: {
                  required: true,
              }
          },
          messages : {
            tone_serial_number : {
              required : "Tone Sr. No. is required."
            },
            hul_tone : {
              required : "Hul Tone is required."
            },
            price : {
              required : "Price is required."
            }
          }
      });


      window.addEventListener('load', function(){
        $(".saveBtn").removeAttr("disabled");
      });



    });
     
</script>
@endsection()