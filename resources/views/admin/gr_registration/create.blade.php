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
           
            <form class="sellfformtruck"  method="POST"  enctype="multipart/form-data" id="grregistrationForm">
                @csrf


                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Select GR Type</label>
                      <select class="form-control select2" id="gr_type" style="width: 100%;">
                        <option value="0">Select Type</option>
                        <option value="1">Depo</option>
                        <option value="2">DD</option>
                      
                      </select>
                    </div>
                  
                  </div>
          
                </div>

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
                        <input type="text" name="gr_no" id="gr_no" class="form-control gr_no" placeholder="Enter ...">
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
                    <!-- <div class="input-group">
                       <input type="text" name="truck_no" class="form-control truck_no" >
                    </div> -->

                    <select class="form-control select2" name="truck_id" id="truck_id" style="width: 100%;">
                      <option value="">Select Truck No.</option>
                      @foreach($trucks as $truck)

                      <option class="option_truck_id" value="{{$truck->id}}" truck_type="{{$truck->truck_type}}">{{$truck->truck_no}}</option>

                      @endforeach()
                    
                    </select>

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
                      <input type="text" name="quantity" class="form-control quantity only-numeric" id="quantity" placeholder="Enter ...">
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
                           <input type="text" name="hul_rate" id = "hul_rate" class="form-control hul_rate" value="0" readonly>
                        </div>
                        <span class="error hul_rate_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>HUL Ton</label>
                        <div class="input-group">
                            <input type="text" name="hul_ton" id = "hul_tone" class="form-control hul_ton" value="0" readonly>
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
                      <input type="text" name="hul_amount" id = "hul_amount" class="form-control hul_amount" value="0" readonly>
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
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Penalty Days</label>
                        <!-- <div class="input-group">
                           <input type="text" name="penalty" class="form-control penalty" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div> -->

                       
                          
                          <select class="form-control select2" name="penalty_days" id="penalty_days" style="width: 100%;">
                            <option value="0">No Penalty</option>
                            @foreach($days_upto as $days)

                            <option value="{{$days}}">{{$days}} @if($days == 1) Day @else Days @endif()</option>

                            @endforeach()
                          
                          </select>
                        

                        <span class="error penalty_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>


                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Penalty Price</label>
                        <div class="input-group">
                            <input type="text" name="penalty_price" id="penalty_price" class="form-control penalty_price only-numeric" value="0">
                        </div>
                        <span class="error penalty_price_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                          


                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Detention</label>
                        <div class="input-group">
                            <input type="text" name="detention" id="detention" value="0" maxlength="8" class="form-control detention only-numeric">
                        </div>
                        <span class="error detention_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                </div>
                
              </div>
              <div class="col-md-4">
                <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Claims Days</label>
                        <!-- <div class="input-group">
                           <input type="text" name="claims" class="form-control claims" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div> -->

                        <select class="form-control select2" name="claim_days" id="claim_days" style="width: 100%;">
                          <option value="0">No Claim</option>
                          @foreach($days_upto as $days)

                          <option value="{{$days}}">{{$days}} @if($days == 1) Day @else Days @endif()</option>

                          @endforeach()
                        
                        </select>

                        <span class="error claims_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>


                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Claim Price</label>
                        <div class="input-group">
                            <input type="text" name="claim_price" id="claim_price" class="form-control only-numeric" value="0">
                        </div>
                        <span class="error claim_price_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>


                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Amount</label>
                        <div class="input-group">
                            <input type="text" name="claims_penalty_amount" id="claims_penalty_amount" class="form-control claims_penalty_amount" value="0" readonly>
                        </div>
                        <span class="error claims_penalty_amount_error"></span>
                        <!-- /.input group -->
                        </div>
                    </div>
                </div>
                
              </div>
              <div class="col-md-4">
                  <label>Final Amount</label>
                  <div class="input-group">
                     <input type="text" name="final_amount" id="final_amount" value="0" class="form-control final_amount" readonly >
                  </div>
              </div>
              
            
              <!-- row div -->
          </div> 
            {{-- endrow --}}

            {{-- newrow --}}
            <div class="row card-footer mb-3 forNmccTruck  d-none">
              <div class="row forNmccIndex" index-id="0">
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Cash</label>
                      <input type="text" name="gr_cash_nmcc" index-id="0" value="0" maxlength="8" class="form-control gr_cash_nmcc only-numeric" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Bank</label>
                          <div class="input-group">
                            <input type="text" name="gr_bank" index-id="0"  class="form-control gr_bank" maxlength="15">
                          </div>
                          <span class="error gr_bank_error"></span>
                          <!-- /.input group -->
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Date</label>
                          <div class="input-group">
                              <input type="text" name="gr_new_date" index-id="0"  class="form-control gr_new_date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
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
                            <input type="text" name="gr_extra" index-id="0" maxlength="8" value="0" class="form-control gr_extra only-numeric">
                          </div>
                          <span class="error gr_extra_error"></span>
                          <!-- /.input group -->
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Details</label>
                          <div class="input-group">
                              <input type="text" name="gr_details" index-id="0" maxlength="255" class="form-control gr_details">
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
                            <input type="text" name="gr_lt" index-id="0" maxlength="3" class="form-control gr_lt only-numeric">
                          </div>
                          <span class="error gr_lt_error"></span>
                          <!-- /.input group -->
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Amount</label>
                          <div class="input-group">
                              <input type="text" name="gr_lt_amt" index-id="0" maxlength="8" value="0" class="form-control gr_lt_amt only-numeric">
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
                        <input type="text" name="gr_diesel_amount" index-id="0" maxlength="8" class="form-control gr_diesel_amount only-numeric" value="0" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Total Advance</label>
                    <div class="input-group">
                        
                        <input type="text" name="gr_total_advance" index-id="0" maxlength="8" class="form-control gr_total_advance myrequire only-numeric" value="0" readonly >
                    </div>
                </div>
              </div>
            
              
            
              <!-- row div -->
          </div> 
            {{-- endrow --}}
             {{-- newrow --}}
             <div class="row card-footer mb-3 forOtherTruck">
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
                        <input type="text" name="gr_balance" index-id="0" index-id="0" class="form-control gr_balance" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Amount</label>
                            <div class="input-group">
                              <input type="text" name="gr_balance_amt" index-id="0" maxlength="8" class="form-control gr_balance_amt only-numeric" readonly>
                            </div>
                            <span class="error gr_balance_amt_error"></span>
                            <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Date</label>
                            <div class="input-group">
                                <input type="text" name="gr_balance_date" index-id="0" class="form-control gr_balance_date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                            </div>
                            <span class="error gr_balance_date_error"></span>
                            <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Trip Margin</label>
                        <input type="text" name="gr_margin" id="gr_margin" maxlength="8" class="form-control gr_margin only-numeric" readonly>
                    </div>
                </div>

              
            <div class="col-md-4">
              <div class="form-group">
                  <label>Balance 2</label>
                  <input type="text" name="gr_balance" class="form-control gr_balance" placeholder="Enter ...">
              </div>
          </div>
              <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Amount</label>
                        <div class="input-group">
                           <input type="text" name="gr_balance_amt" class="form-control gr_balance_amt" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                        <span class="error gr_balance_amt_error"></span>
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


@section('js')
<script>
  $(document).ready(function(){
    $("#penalty_days").on("change",function(){
      let penalty_days = parseInt($(this).val());
      let penalty_price_per_days = "{{$penalty_price}}";

      let total_amount_penalty_days = penalty_days * penalty_price_per_days;

      $("#penalty_price").val(total_amount_penalty_days);

      let penalty_price = parseFloat($("#penalty_price").val());
      let detention = parseFloat($("#detention").val());
      let claim_price = parseFloat($("#claim_price").val());
      let hul_amount = parseFloat($("#hul_amount").val());
      let truck_type = parseInt($(".option_truck_id[value='"+$("#truck_id").val()+"']").attr("truck_type"));


      if(truck_type == 1){
        //NMCC TRUCK
        let cal_claims_penalty_amount = detention - penalty_price - claim_price;
        $("#claims_penalty_amount").val(cal_claims_penalty_amount);

        let cal_final_amount = hul_amount + cal_claims_penalty_amount;
        $("#final_amount").val(cal_final_amount);

        let trip_margin = cal_final_amount - hul_amount;
        $("#gr_margin").val(trip_margin);

      }else{
        //OTHER TRUCK

        let cal_claims_penalty_amount =  penalty_price + claim_price - detention;
        $("#claims_penalty_amount").val(cal_claims_penalty_amount);

        let cal_final_amount = hul_amount + cal_claims_penalty_amount;
        $("#final_amount").val(cal_final_amount);

        let trip_margin = cal_final_amount - hul_amount;
        $("#gr_margin").val(trip_margin);

      }
      
    })

    $("#claim_days").on("change",function(){
      let claim_days = parseInt($(this).val());
      let claim_price_per_day = "{{$claim_price}}";

      let total_amount_claim_days = claim_days * claim_price_per_day;

      $("#claim_price").val(total_amount_claim_days);


      let penalty_price = parseFloat($("#penalty_price").val());
      let detention = parseFloat($("#detention").val());
      let claim_price = parseFloat($("#claim_price").val());
      let hul_amount = parseFloat($("#hul_amount").val());
      let truck_type = parseInt($(".option_truck_id[value='"+$("#truck_id").val()+"']").attr("truck_type"));


      if(truck_type == 1){
        //NMCC TRUCK
        let cal_claims_penalty_amount = detention - penalty_price - claim_price;
        $("#claims_penalty_amount").val(cal_claims_penalty_amount);

        let cal_final_amount = hul_amount + cal_claims_penalty_amount;
        $("#final_amount").val(cal_final_amount);

        let trip_margin = cal_final_amount - hul_amount;
        $("#gr_margin").val(trip_margin);

      }else{
        //OTHER TRUCK

        let cal_claims_penalty_amount =  penalty_price + claim_price - detention;
        $("#claims_penalty_amount").val(cal_claims_penalty_amount);

        let cal_final_amount = hul_amount + cal_claims_penalty_amount;
        $("#final_amount").val(cal_final_amount);

        let trip_margin = cal_final_amount - hul_amount;
        $("#gr_margin").val(trip_margin);

      }
      
    })


    $('#penalty_price').keyup(delay(function (e) {
      
      let penalty_price = $(this).val();
      
      if(penalty_price == undefined || penalty_price == ""){
        penalty_price = 0;
        //$(this).val(penality_price);
      }else{
        penalty_price = parseFloat(penalty_price);
      }

      
      
      let detention = parseFloat($("#detention").val());
      let claim_price = parseFloat($("#claim_price").val());
      let hul_amount = parseFloat($("#hul_amount").val());
      let truck_type = parseInt($(".option_truck_id[value='"+$("#truck_id").val()+"']").attr("truck_type"));


      if(truck_type == 1){
        //NMCC TRUCK
        
        let cal_claims_penalty_amount = detention - penalty_price - claim_price;
        $("#claims_penalty_amount").val(cal_claims_penalty_amount);

        let cal_final_amount = hul_amount + cal_claims_penalty_amount;
        $("#final_amount").val(cal_final_amount);

        let trip_margin = cal_final_amount - hul_amount;
        $("#gr_margin").val(trip_margin);

      }else{
        //OTHER TRUCK
        console.log(detention,penalty_price, claim_price)
        let cal_claims_penalty_amount =  penalty_price + claim_price - detention;
        $("#claims_penalty_amount").val(cal_claims_penalty_amount);

        let cal_final_amount = hul_amount + cal_claims_penalty_amount;
        $("#final_amount").val(cal_final_amount);

        let trip_margin = cal_final_amount - hul_amount;
        $("#gr_margin").val(trip_margin);

      }

    }, 500));


    $('#detention').keyup(delay(function (e) {
      

      let detention = $(this).val();
      
      if(detention == undefined || detention == ""){
        detention = 0;
        //$(this).val(penality_price);
      }else{
        detention = parseFloat(detention);
      }
      
      
      let penalty_price = parseFloat($("#penalty_price").val());
      let claim_price = parseFloat($("#claim_price").val());
      let hul_amount = parseFloat($("#hul_amount").val());
      let truck_type = parseInt($(".option_truck_id[value='"+$("#truck_id").val()+"']").attr("truck_type"));


      if(truck_type == 1){
        //NMCC TRUCK
        let cal_claims_penalty_amount = detention - penalty_price - claim_price;
        $("#claims_penalty_amount").val(cal_claims_penalty_amount);

        let cal_final_amount = hul_amount + cal_claims_penalty_amount;
        $("#final_amount").val(cal_final_amount);

        let trip_margin = cal_final_amount - hul_amount;
        $("#gr_margin").val(trip_margin);

      }else{
        //OTHER TRUCK

        let cal_claims_penalty_amount =  penalty_price + claim_price - detention;
        $("#claims_penalty_amount").val(cal_claims_penalty_amount);

        let cal_final_amount = hul_amount + cal_claims_penalty_amount;
        $("#final_amount").val(cal_final_amount);

        let trip_margin = cal_final_amount - hul_amount;
        $("#gr_margin").val(trip_margin);

      }

    }, 500));


    $('#claim_price').keyup(delay(function (e) {
      

      let claim_price = $(this).val();
      
      if(claim_price == undefined || claim_price == ""){
        claim_price = 0;
        //$(this).val(penality_price);
      }else{
        claim_price = parseFloat(claim_price);
      }
      
      
      let penalty_price = parseFloat($("#penalty_price").val());
      let detention = parseFloat($("#detention").val());
      let hul_amount = parseFloat($("#hul_amount").val());
      let truck_type = parseInt($(".option_truck_id[value='"+$("#truck_id").val()+"']").attr("truck_type"));


      if(truck_type == 1){
        //NMCC TRUCK
        let cal_claims_penalty_amount = detention - penalty_price - claim_price;
        $("#claims_penalty_amount").val(cal_claims_penalty_amount);

        let cal_final_amount = hul_amount + cal_claims_penalty_amount;
        $("#final_amount").val(cal_final_amount);

        let trip_margin = cal_final_amount - hul_amount;
        $("#gr_margin").val(trip_margin);

      }else{
        //OTHER TRUCK

        let cal_claims_penalty_amount =  penalty_price + claim_price - detention;
        $("#claims_penalty_amount").val(cal_claims_penalty_amount);

        let cal_final_amount = hul_amount + cal_claims_penalty_amount;
        $("#final_amount").val(cal_final_amount);
        let trip_margin = cal_final_amount - hul_amount;
        $("#gr_margin").val(trip_margin);

      }

    }, 500));



    $(".only-numeric").bind("keypress", function (e) {
      var keyCode = e.which ? e.which : e.keyCode
            
      if (!(keyCode >= 48 && keyCode <= 57)) {
        return false;
      }
    });

    function delay(callback, ms) {
      var timer = 0;
      return function() {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
          callback.apply(context, args);
        }, ms || 0);
      };
    }

    $('#quantity').keyup(delay(function (e) {
      let quantity = parseFloat($(this).val());

      if(quantity != undefined && quantity != ""){
          $.ajax({
          url: "{{route('admin.gr-register.findHultoneAccordingToQuantity')}}",
          type:"POST",
          data: {
            quantity: quantity,
            '_token': "{{csrf_token()}}",
          },
          async: false,
          success:function(res){
            let hultoneFind = res;
            if(hultoneFind == ""){
              swal("Alert", "Quantity not exists for hul tone & hul rate.", "error");
              $("#quantity").val("");
              return false;
            }

            let hul_rate = $("#hul_rate").val(hultoneFind.price);
            let hul_tone = $("#hul_tone").val(hultoneFind.hul_tone);
           // alert(hul_tone)

            let amount_calculate = parseFloat(hultoneFind.hul_tone) * parseFloat(hultoneFind.price);

            $("#hul_amount").val(amount_calculate);


            let claims_penalty_amount = parseFloat($("#claims_penalty_amount").val());
            let cal_final_amount = amount_calculate + claims_penalty_amount;
            $("#final_amount").val(cal_final_amount);

            let trip_margin = cal_final_amount - amount_calculate;
            $("#gr_margin").val(trip_margin);


          }
        });
      }


      
    }, 500));



    $("#gr_type").on("change",function(){
      $("#gr_no").val("");
    })

    $("#truck_id").on("change",function(){
      let val = $(this).val();
      let truck_type = parseInt($(".option_truck_id[value='"+val+"']").attr("truck_type"));
      let penalty_price = parseFloat($("#penalty_price").val());
      let detention = parseFloat($("#detention").val());
      let claim_price = parseFloat($("#claim_price").val());
      let hul_amount = parseFloat($("#hul_amount").val());



      if(truck_type == 1){
        //NMCC TRUCK
        let cal_claims_penalty_amount = detention - penalty_price - claim_price;
        $("#claims_penalty_amount").val(cal_claims_penalty_amount);

        let cal_final_amount = hul_amount + cal_claims_penalty_amount;
        $("#final_amount").val(cal_final_amount);

        let trip_margin = cal_final_amount - hul_amount;
        $("#gr_margin").val(trip_margin);
        

        $(".forNmccTruck").removeClass('d-none');
        $(".forOtherTruck").addClass('d-none');

      }else{
        //OTHER TRUCK

        let cal_claims_penalty_amount =  penalty_price + claim_price - detention;
        $("#claims_penalty_amount").val(cal_claims_penalty_amount);

        let cal_final_amount = hul_amount + cal_claims_penalty_amount;
        $("#final_amount").val(cal_final_amount);

        let trip_margin = cal_final_amount - hul_amount;
        $("#gr_margin").val(trip_margin);

        $(".forOtherTruck").removeClass('d-none');
        $(".forNmccTruck").addClass('d-none');

      }
    
      
      //calculate final amount
    })



    $('.gr_cash_nmcc').keyup(delay(function (e) {
      
      
      let gr_cash_nmcc = $(this).val();
      
      if(gr_cash_nmcc == undefined || gr_cash_nmcc == ""){
        gr_cash_nmcc = 0;
        //$(this).val(penality_price);
      }else{
        gr_cash_nmcc = parseFloat(gr_cash_nmcc);
      }
      

      let index_id = $(this).attr("index-id");
      //alert(index_id)
      let extra = parseFloat($(".gr_extra[index-id='"+index_id+"']").val());
      let gr_diesel_amount = parseFloat($(".gr_diesel_amount[index-id='"+index_id+"']").val());
      let __total_adv = gr_cash_nmcc + extra + gr_diesel_amount;
      //console.log(extra,gr_diesel_amount)
      
      $(".gr_total_advance[index-id='"+index_id+"']").val(__total_adv);

      let cal_balance = parseFloat($("#hul_amount").val()) - __total_adv;

      $(".gr_balance_amt[index-id='"+index_id+"']").val(cal_balance);

    }, 500));


    $('.gr_extra').keyup(delay(function (e) {
      
      
      let extra = $(this).val();
      
      if(extra == undefined || extra == ""){
        extra = 0;
        //$(this).val(penality_price);
      }else{
        extra = parseFloat(extra);
      }
      

      let index_id = $(this).attr("index-id");
      //alert(index_id)
      let gr_cash_nmcc = parseFloat($(".gr_cash_nmcc[index-id='"+index_id+"']").val());
      let gr_diesel_amount = parseFloat($(".gr_diesel_amount[index-id='"+index_id+"']").val());
      let __total_adv = gr_cash_nmcc + extra + gr_diesel_amount;
      //console.log(extra,gr_diesel_amount)
      
      $(".gr_total_advance[index-id='"+index_id+"']").val(__total_adv);

    }, 500));


    $('.gr_lt').keyup(delay(function (e) {
      
      
      let gr_lt = $(this).val();
      
      if(gr_lt == undefined || gr_lt == ""){
        gr_lt = 0;
        //$(this).val(penality_price);
      }else{
        gr_lt = parseFloat(gr_lt);
      }

      let index_id = $(this).attr("index-id");
      
      let gr_lt_amt = parseFloat($(".gr_lt_amt[index-id='"+index_id+"']").val());

      let lt_into_amount_gr_diesel_amount = gr_lt * gr_lt_amt;


      $(".gr_diesel_amount[index-id='"+index_id+"']").val(lt_into_amount_gr_diesel_amount);

      
      //alert(index_id)
      let extra = parseFloat($(".gr_extra[index-id='"+index_id+"']").val());
      let gr_cash_nmcc = parseFloat($(".gr_cash_nmcc[index-id='"+index_id+"']").val());
      let gr_diesel_amount = parseFloat($(".gr_diesel_amount[index-id='"+index_id+"']").val());
      let __total_adv = gr_cash_nmcc + extra + gr_diesel_amount;
      //console.log(extra,gr_diesel_amount)
      
      $(".gr_total_advance[index-id='"+index_id+"']").val(__total_adv);

    }, 500));



    $('.gr_lt_amt').keyup(delay(function (e) {
      
      
      let gr_lt_amt = $(this).val();
      
      if(gr_lt_amt == undefined || gr_lt_amt == ""){
        gr_lt_amt = 0;
        //$(this).val(penality_price);
      }else{
        gr_lt_amt = parseFloat(gr_lt_amt);
      }

      let index_id = $(this).attr("index-id");
      
      let gr_lt = parseFloat($(".gr_lt[index-id='"+index_id+"']").val());

      let lt_into_amount_gr_diesel_amount = gr_lt * gr_lt_amt;


      $(".gr_diesel_amount[index-id='"+index_id+"']").val(lt_into_amount_gr_diesel_amount);

      
      //alert(index_id)
      let extra = parseFloat($(".gr_extra[index-id='"+index_id+"']").val());
      let gr_cash_nmcc = parseFloat($(".gr_cash_nmcc[index-id='"+index_id+"']").val());
      let gr_diesel_amount = parseFloat($(".gr_diesel_amount[index-id='"+index_id+"']").val());
      let __total_adv = gr_cash_nmcc + extra + gr_diesel_amount;
      //console.log(extra,gr_diesel_amount)
      
      $(".gr_total_advance[index-id='"+index_id+"']").val(__total_adv);

    }, 500));
    
    

  })
</script>
@endsection()