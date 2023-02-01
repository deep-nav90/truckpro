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
            <h1>Add Truck</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Truck</li>
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
            <h3 class="card-title">Add Truck</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Select Type</label>
                  <select class="form-control select2 trucktype" style="width: 100%;">
                    <option value="0">Select Type</option>
                    <option value="1">NMCC</option>
                    <option value="2">Other</option>
                  
                  </select>
                </div>
              
              </div>
          
            </div>
            <input type="hidden" id="truckerrr" value="0">
            <form class="sellfformtruck" enctype="multipart/form-data" id="sellfformtruck">
                @csrf
            <div class="row d-none" id="selftruck">
             
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Truck No</label>
                        <input type="text" name="truck_no" class="form-control truckno" >
                        <span class="error truck_no_error"></span>
                    </div>
                    
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Driver Name</label>
                        <select class="form-control select2 driver_name" name="driver_id" style="width: 100%;">
                            <option value="0">Select Driver</option>
                            @foreach($driverlist as $driverdata)
                                <option value="{{$driverdata->id}}">{{$driverdata->driver_name}}</option>
                            @endforeach
                        </select>
                        <span class="error driver_name_error"></span>
                        {{-- <input type="text" name="driver_name" class="form-control driver_name" placeholder="Enter ..."> --}}
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Registration No.</label>
                        <input type="text" name="register_no" class="form-control" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Exp Date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" name="register_exp_date" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                    </div>
                    <!-- /.input group -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Doc</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="register_doc"  multiple="multiple" class="custom-file-input" id="registerUploaddoc">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div id="image-holder">
                        
                        </div>
                        </div>
                    </div>
                
                </div>
            <!-- national permit -->
            <div class="col-md-4">
                    <div class="form-group">
                        <label>National Permit</label>
                        <input type="text" name="national_permit_no" class="form-control" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Exp Date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" class="form-control" name="national_permit_exp_date"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                    </div>
                    <!-- /.input group -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nationpermit">Permit Upload</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="national_permit_doc"  multiple="multiple" class="custom-file-input" id="nationalpermitUploaddoc">
                            <label class="custom-file-label" for="nationpermit">Choose file</label>
                        </div>
                        <div id="national-permit-holder">
                        
                        </div>
                        </div>
                    </div>
                
                </div>
            <!-- end permit -->
             <!-- Punjab permit -->
             <div class="col-md-4">
                    <div class="form-group">
                        <label>Punjab Permit</label>
                        <input type="text" name="punjab_permit_no" class="form-control" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Exp Date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" name="punjab_exp_date" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                    </div>
                    <!-- /.input group -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="punjabpermit">Permit Upload</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="punjab_permit_doc"  multiple="multiple" class="custom-file-input" id="punjabpermitUploaddoc">
                            <label class="custom-file-label" for="punjabpermit">Choose file</label>
                        </div>
                        <div id="punjab-permit-holder">
                        
                        </div>
                        </div>
                    </div>
                
                </div>
            <!-- end permit -->
              <!-- Punjab permit -->
              
                <!-- end permit -->
                <!-- insurence -->
                <!-- Punjab permit -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Insurance No</label>
                        <input type="text" name="insurance_no" class="form-control insurance_no" placeholder="Enter ...">
                        <span class="error insurance_no_error"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Exp Date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" name="insurance_exp_date" class="form-control insurance_exp_date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                       
                    </div>
                    <span class="error insurance_exp_date_error"></span>
                    <!-- /.input group -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="drivinglic">Insurance Upload</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="insurance_doc"  multiple="multiple" class="custom-file-input" id="insuranceUploaddoc">
                            <label class="custom-file-label" for="drivinglic">Choose file</label>
                        </div>
                        <div id="insurance-holder">
                        
                        </div>
                        </div>
                    </div>
                
                </div>
                 <!-- end permit -->
                     <!-- insurence -->
                <!-- Polloution permit -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Pollution No</label>
                        <input type="text" name="polution_no" class="form-control polution_no" placeholder="Enter ...">
                        <span class="error polution_no_error"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Exp Date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" name="polution_exp_date" class="form-control polution_exp_date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        
                    </div>
                    <span class="error polution_exp_date_error"></span>
                    <!-- /.input group -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="polution">Pollution Upload</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="polution_doc"  multiple="multiple" class="custom-file-input" id="polutionUploaddoc">
                            <label class="custom-file-label" for="polution">Choose file</label>
                        </div>
                        <div id="polution-holder">
                        
                        </div>
                        </div>
                    </div>
                
                </div>
                <!-- end permit -->
                
            
                <!-- row div -->
            </div> 
            <div class="row d-none" id="myselfbtn">
              <div class="col-md-12">
                <div class="card-footer">
                    <a href="{{url('/truck')}}" class="btn btn-danger">Back</a>
                  <button type="button" class="btn btn-info float-right selfbtn">Save</button>
                  {{-- <button type="submit" class="btn btn-default float-right">Cancel</button> --}}
                </div>
              </div>
            </div>
          </form>
          <form class="otherformtruck" enctype="multipart/form-data" id="otherformtruck">
            @csrf
       
            <div class="row d-none" id="othertruck">
            
            
            <div class="col-md-6">
                    <div class="form-group">
                        <label>Truck No</label>
                        <input type="text" name="truck_no" class="form-control truckno" >
                        <span class="error truck_no_error"></span>

                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Owner Name</label>
                        <input type="text" name="owner_name" class="form-control owner_name" placeholder="Enter ...">
                        <span class="error owner_name_error"></span>
                    </div>
                </div>
                {{-- pancrd --}}
                <input type="hidden" id="pan_errorr" value="0">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pan Card No</label>
                        <input type="text" name="pan_card_no" class="form-control pan_card_no" placeholder="Enter ...">
                        <span class="error pan_card_no_error"> invalid pan card</span>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cardpan">Pan Card Upload</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="pan_card_doc"  multiple="multiple" class="custom-file-input" id="pancardUploaddoc">
                            <label class="custom-file-label" for="cardpan">Choose file</label>
                        </div>
                        <div id="pancard-holder">
                        
                        </div>
                        </div>
                    </div>
                
                </div>
                {{-- end pancard --}}

                {{-- affidavite --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Affidavit</label>
                        <input type="text" name="affidavit_no" class="form-control" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="upaffidavit">Affidavit Upload</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="affidavit_doc"  multiple="multiple" class="custom-file-input" id="affidavitUploaddoc">
                            <label class="custom-file-label" for="upaffidavit">Choose file</label>
                        </div>
                        <div id="affi-holder">
                        
                        </div>
                        </div>
                    </div>
                
                </div>
                {{-- end pancard --}}
                {{-- bank detail --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Bank Name</label>
                        <input type="text" name="bank_name" class="form-control bank_name" placeholder="Enter ...">
                        <span class="error bank_name_error"></span>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Account No.</label>
                        <input type="text" name="account_no" class="form-control account_no" placeholder="Enter ...">
                        <span class="error account_no_error"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>IFSC Code</label>
                        <input type="text" name="ifsc_no" class="form-control ifsc_no" placeholder="Enter ...">
                        <span class="error ifsc_no_error"></span>
                    </div>
                </div>
                {{-- end bank detail --}}
                {{-- col-md-end --}}
               
            </div>
            <div class="row d-none" id="myotherbtn">
              <div class="col-md-12">
                <div class="card-footer">
                    <a href="{{url('/truck')}}" class="btn btn-danger">Back</a>
                  <button type="button" class="btn btn-info float-right ownerbtn" id="othertruckbtn">Save</button>
                  {{-- <button type="submit" class="btn btn-default float-right">Cancel</button> --}}
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
  <script src=" {{ asset('dist/js/adminpage/truck.js') }}"></script>
  
  
@endsection