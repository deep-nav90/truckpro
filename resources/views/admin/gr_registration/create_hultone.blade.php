@extends('layouts.app')
@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Hul Tone</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Hul Tone</li>
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
            <h3 class="card-title">Add Hul Tone</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
           
            <form class="sellfformtruck"  method="POST"  enctype="multipart/form-data" id="hultoneRegisterForm">
                @csrf


                

            <div class="row card-footer mb-3">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tone Sr. No.</label>
                        <input type="text" name="tone_serial_number" maxlength="10" class="form-control" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-md-4">
                    
                    <div class="form-group">
                      <label>Hul Tone</label>
                        <input type="text" maxlength="3" name="hul_tone" class="form-control only-numeric" placeholder="Enter ...">
                    </div>
                </div>
                
              
              </div>

              
              
                <!-- row div -->
            </div> 
            {{-- newrow --}}
            
          
            <div class="row">
              <div class="col-md-12">
                <div class="card-footer">
                    <a href="{{url('/driver')}}" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-info float-right selfbtn">Save</button>
                  
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

  <script type="text/javascript">
    
    $(document).ready(function() {
      $(".only-numeric").bind("keypress", function (e) {
          var keyCode = e.which ? e.which : e.keyCode
               
          if (!(keyCode >= 48 && keyCode <= 57)) {
            return false;
          }
      });

      $('#hultoneRegisterForm').validate({ // initialize the plugin
          rules: {
              tone_serial_number: {
                  required: true,
              },
              hul_tone: {
                  required: true,
              }
          },
          messages : {
            tone_serial_number : {
              required : "Tone Sr. No. is required."
            },
            hul_tone : {
              required : "Hul Tone is required."
            }
          }
      });


    });
     
</script>
@endsection()