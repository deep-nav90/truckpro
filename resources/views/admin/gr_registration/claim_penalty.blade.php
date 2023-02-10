@extends('layouts.app')
@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Claim/Penalty</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Claim/Penalty</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    @if(session()->has("danger"))
            <div class="alert alert-danger" style="text-align: center;" role="alert">
                {{session()->get("danger")}}
            </div>
            @endif 

        @if(session()->has("success"))
          <div class="alert alert-success" style="text-align: center;" role="alert">
                {{session()->get("success")}}
          </div>
          @endif


      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Claim/Penalty</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
           
            <form class="sellfformtruck"  method="POST"  enctype="multipart/form-data" id="claimPenaltyForm">
                @csrf


                

            <div class="row card-footer mb-3">
                
                
                <div class="col-md-4">
                    
                    <div class="form-group">
                      <label>Claim Price Per Day</label>
                        <input type="text" maxlength="6" value="{{$find_claim_penalty_record->claim_price_per_day}}" name="claim_price_per_day" class="form-control only-numeric" placeholder="Enter ...">
                    </div>
                </div>

                <div class="col-md-4">
                    
                    <div class="form-group">
                      <label>Penalty Price Per Day</label>
                        <input type="text" maxlength="6" name="penalty_price_per_day" value="{{$find_claim_penalty_record->penalty_price_per_day}}" class="form-control only-numeric" placeholder="Enter ...">
                    </div>
                </div>
                
              
              </div>

              
              
                <!-- row div -->
            </div> 
            {{-- newrow --}}
            
          
            <div class="row">
              <div class="col-md-12">
                <div class="card-footer">
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


      $('#claimPenaltyForm').validate({ // initialize the plugin
          rules: {
              claim_price_per_day: {
                  required: true,
                 
              },
              penalty_price_per_day: {
                  required: true,
                  
              }
              
          },
          messages : {
            claim_price_per_day : {
              required : "Claim Price Per Day is required."
            },
            penalty_price_per_day : {
              required : "Penalty Price Per Day is required."
            }
          }
      });


      window.addEventListener('load', function(){
        $(".saveBtn").removeAttr("disabled");
      });



    });
     
</script>
@endsection()