@extends('layouts.app')
@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add GR Register</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add GR Register</li>
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
            <h3 class="card-title">Add GR Register</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
           
            <form class="sellfformtruck"  method="POST" action="{{route('gr-register.store')}}" enctype="multipart/form-data" id="sellfformtruck">
                @csrf
            <div class="row card-footer mb-3">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" name="gr_date" class="form-control gr_date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        
                    </div>
                    <span class="error gr_date_error"></span>
                    <!-- /.input group -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Gr No</label>
                        <input type="text" name="gr_no" class="form-control gr_no" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Shipping No</label>
                    <div class="input-group">
                        
                        <input type="text" name="shipping_no" id="shipping_no" class="form-control shipping_no myrequire" >
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Truck No</label>
                    <div class="input-group">
                       <input type="text" name="truck_no" class="form-control truck_no" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Station</label>
                        <input type="text" name="station" class="form-control station" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Quantity </label>
                      <input type="text" name="quantity" class="form-control quantity" placeholder="Enter ...">
                  </div>
              </div>
              
                <!-- row div -->
            </div> 
            {{-- newrow --}}
            <div class="row card-footer mb-3">
              <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>HUL Rate</label>
                        <div class="input-group">
                           <input type="text" name="hul_rate" class="form-control hul_rate" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error hul_rate_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>HUL Ton</label>
                        <div class="input-group">
                            <input type="text" name="hul_ton" class="form-control hul_ton" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error hul_ton_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                </div>
                
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <label>Amount</label>
                      <input type="text" name="hul_amount" class="form-control hul_amount" placeholder="Enter ...">
                  </div>
              </div>
              <div class="col-md-4">
                  <label>Bill No</label>
                  <div class="input-group">
                      
                      <input type="text" name="hul_bill_no" id="hul_bill_no" class="form-control hul_bill_no_no myrequire" >
                  </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Penalty</label>
                        <div class="input-group">
                           <input type="text" name="penalty" class="form-control penalty" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error penalty_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Detention</label>
                        <div class="input-group">
                            <input type="text" name="detention" class="form-control detention" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error detention_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                </div>
                
              </div>
              <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Claims</label>
                        <div class="input-group">
                           <input type="text" name="claims" class="form-control claims" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error claims_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Amount</label>
                        <div class="input-group">
                            <input type="text" name="claims_amount" class="form-control claims_amount" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error claims_amount_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                </div>
                
              </div>
              <div class="col-md-4">
                  <label>Final Amount</label>
                  <div class="input-group">
                     <input type="text" name="final_amount" class="form-control final_amount" >
                  </div>
              </div>
              
            
              <!-- row div -->
          </div> 
            {{-- endrow --}}

            {{-- newrow --}}
            <div class="row card-footer mb-3">
              <div class="col-md-4">
                <div class="form-group">
                    <label>Cash</label>
                    <input type="text" name="gr_cash" class="form-control gr_cash" placeholder="Enter ...">
                </div>
            </div>
              <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Bank</label>
                        <div class="input-group">
                           <input type="text" name="gr_bank" class="form-control gr_bank" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_bank_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date</label>
                        <div class="input-group">
                            <input type="text" name="gr_new_date" class="form-control gr_new_date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_new_date_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                </div>
                
              </div>
              <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Extras</label>
                        <div class="input-group">
                           <input type="text" name="gr_extra" class="form-control gr_extra" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_extra_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Details</label>
                        <div class="input-group">
                            <input type="text" name="gr_details" class="form-control gr_details" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_details_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                </div>
                
              </div>
              <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Lt</label>
                        <div class="input-group">
                           <input type="text" name="gr_lt" class="form-control gr_lt" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_lt_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Amount</label>
                        <div class="input-group">
                            <input type="text" name="gr_lt_amt" class="form-control gr_lt_amt" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_lt_amt_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                </div>
                
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <label>Total Diesel</label>
                      <input type="text" name="gr_diesel" class="form-control gr_diesel" placeholder="Enter ...">
                  </div>
              </div>
              <div class="col-md-4">
                  <label>Total Advance</label>
                  <div class="input-group">
                      
                      <input type="text" name="gr_total_advance" id="gr_total_advance" class="form-control gr_total_advance_no myrequire" >
                  </div>
              </div>
            
              
            
              <!-- row div -->
          </div> 
            {{-- endrow --}}
             {{-- newrow --}}
             <div class="row card-footer mb-3">
              <div class="col-md-4">
                <div class="form-group">
                    <label>Transporter</label>
                    <input type="text" name="gr_transporter" class="form-control gr_transporter" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Rate</label>
                        <div class="input-group">
                           <input type="text" name="gr_rate" class="form-control gr_rate" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_rate_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Ton</label>
                        <div class="input-group">
                            <input type="text" name="gr_ton" class="form-control gr_ton" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_ton_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                </div>
                
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Total</label>
                    <input type="text" name="gr_rate_total" class="form-control gr_rate_total" placeholder="Enter ...">
                </div>
            </div>
              <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Diesel Amt</label>
                        <div class="input-group">
                           <input type="text" name="gr_diesel_amt" class="form-control gr_diesel_amt" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_diesel_amt_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Cash</label>
                        <div class="input-group">
                            <input type="text" name="gr_cash" class="form-control gr_cash" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_cash_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                </div>
                
              </div>
              <div class="col-md-4">
                <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Total Adv</label>
                        <div class="input-group">
                           <input type="text" name="gr_total_adv" class="form-control gr_total_adv" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_total_adv_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Deductions</label>
                        <div class="input-group">
                            <input type="text" name="gr_deducation" class="form-control gr_deducation" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_deducation_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Additions</label>
                        <div class="input-group">
                            <input type="text" name="gr_addition" class="form-control gr_addition" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_addition_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                </div>
                
              </div>
             
              <div class="col-md-4">
                  <div class="form-group">
                      <label>Net Payment</label>
                      <input type="text" name="gr_net_payment" class="form-control gr_net_payment" placeholder="Enter ...">
                  </div>
              </div>
             
            
              
            
              <!-- row div -->
          </div> 
            {{-- endrow --}}
             {{-- newrow --}}
             <div class="row card-footer mb-3">
              <div class="col-md-4">
                <div class="form-group">
                    <label>Balance 1</label>
                    <input type="text" name="gr_balance_1" class="form-control gr_balance_1" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Amount</label>
                        <div class="input-group">
                           <input type="text" name="gr_balance_1_amt" class="form-control gr_balance_1_amt" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_balance_1_amt_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date</label>
                        <div class="input-group">
                            <input type="text" name="gr_balance_1_date" class="form-control gr_balance_1_date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_balance_1_date_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                </div>
                
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Trip Margin</label>
                    <input type="text" name="gr_margin" class="form-control gr_margin" placeholder="Enter ...">
                </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label>Balance 2</label>
                  <input type="text" name="gr_balance_2" class="form-control gr_balance_2" placeholder="Enter ...">
              </div>
          </div>
              <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Amount</label>
                        <div class="input-group">
                           <input type="text" name="gr_balance_2_amt" class="form-control gr_balance_2_amt" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_balance_2_amt_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date</label>
                        <div class="input-group">
                            <input type="text" name="gr_balance_date" class="form-control gr_balance_date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_balance_date_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                </div>
                
              </div>
              
             
            
              
            
              <!-- row div -->
          </div> 
            {{-- endrow --}}
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