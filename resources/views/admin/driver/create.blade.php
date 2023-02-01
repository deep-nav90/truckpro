@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<style type="text/css">
.thumb-image{
 float:left;width:100px;
 position:relative;
 padding:5px;
}
</style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Driver</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Driver</li>
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
            <h3 class="card-title">Add Driver</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
           
            <form class="sellfformtruck"  method="POST" action="{{route('driver.store')}}" enctype="multipart/form-data" id="sellfformtruck">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Driver Name</label>
                        <input type="text" name="driver_name" id="driver_name" class="form-control driver_name myrequire" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Driver Email</label>
                        <input type="text" name="driver_email" class="form-control driver_email" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Driver Phone No</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                        <input type="text" name="driver_phone" id="driver_phone" class="form-control driver_phone_no myrequire" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <label>Alternative Phone No</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                        <input type="text" name="driver_alter_phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Driving Licence No</label>
                        <input type="text" name="driving_licence" class="form-control" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Exp Date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" name="licence_exp_date" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                    </div>
                    <!-- /.input group -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Doc</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="licence_doc"  multiple="multiple" class="custom-file-input" id="licence_doc">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div id="image-holder-licence">
                        
                        </div>
                        </div>
                    </div>
                
                </div>
          
           
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Aadhar Card No</label>
                        <input type="text" maxlength="12" name="aadhar_card" id="aadhar_card" class="form-control myrequire" onkeypress="return onlyNumberKey(event)" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Aadhar Card</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="aadhar_card_doc"  multiple="multiple" class="custom-file-input" id="aadhar_card_doc">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div id="image-holder-aadhar">
                        
                        </div>
                        </div>
                    </div>
                
                </div>
            
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Address</label>
                       <textarea class="form-control" name="driver_address" ></textarea>
                    </div>
                </div>
                <!-- row div -->
            </div> 
            <div class="row">
              <div class="col-md-12">
                <div class="card-footer">
                    <a href="{{url('/driver')}}" class="btn btn-danger">Back</a>
                  <button type="button" class="btn btn-info float-right selfbtn">Save</button>
                  
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
  <script src="{{ asset('dist/js/adminpage/driver.js') }}"></script>
@endsection