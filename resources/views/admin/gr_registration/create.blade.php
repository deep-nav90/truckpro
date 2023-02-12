@extends('layouts.app')
@section('content')
<div class="content-wrapper">

<style>
  .row.card-footer.mb-3.forNmccTruck span img.gr_plush_icon, .row.card-footer.mb-3.forNmccTruck span img.gr_del_icon, .row.card-footer.mb-3.forOtherTruck span img.gr_plush_for_other_truck_icon, .row.card-footer.mb-3.forOtherTruck span img.gr_del_icon {
    width: 26px;
    position: absolute;
    right: 0;
    margin: -26px 0px 0px 0px;
    cursor : pointer;
}
</style>

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
            <div class="forNmccTruckIndex">
              <div class="row card-footer mb-3 forNmccTruck  d-none" index-id="0"><span><img class="gr_plush_icon" src="{{url('images/background/plus-vector-icon.jpg')}}"></span>
                
                
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Cash</label>
                        <input type="text" name="gr_cash_nmcc[]" index-id="0" value="0" maxlength="8" class="form-control gr_cash_nmcc only-numeric" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Bank</label>
                            <div class="input-group">
                              <input type="text" name="gr_bank[]" index-id="0"  class="form-control gr_bank" maxlength="15">
                            </div>
                            <span class="error gr_bank_error"></span>
                            <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Date</label>
                            <div class="input-group">
                                <input type="text" name="gr_new_date[]" index-id="0"  class="form-control gr_new_date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
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
                              <input type="text" name="gr_extra[]" index-id="0" maxlength="8" value="0" class="form-control gr_extra only-numeric">
                            </div>
                            <span class="error gr_extra_error"></span>
                            <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Details</label>
                            <div class="input-group">
                                <input type="text" name="gr_details[]" index-id="0" maxlength="255" class="form-control gr_details">
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
                              <input type="text" name="gr_lt[]" index-id="0" maxlength="3" class="form-control gr_lt only-numeric">
                            </div>
                            <span class="error gr_lt_error"></span>
                            <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Amount</label>
                            <div class="input-group">
                                <input type="text" name="gr_lt_amt[]" index-id="0" maxlength="8" value="0" class="form-control gr_lt_amt only-numeric">
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
                          <input type="text" name="gr_diesel_amount[]" index-id="0" maxlength="8" class="form-control gr_diesel_amount only-numeric" value="0" readonly>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <label>Total Advance</label>
                      <div class="input-group">
                          
                          <input type="text" name="gr_total_advance[]" index-id="0" maxlength="8" class="form-control gr_total_advance myrequire only-numeric" value="0" readonly >
                      </div>
                  </div>
                <!-- row div -->
            </div> 
          </div>  
            {{-- endrow --}}
             {{-- newrow --}}
             <div class="forOtherTruckIndex">
              <div class="row card-footer mb-3 forOtherTruck" index-id="0"><span><img class="gr_plush_for_other_truck_icon" index-id="0" src="{{url('images/background/plus-vector-icon.jpg')}}"></span>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Transporter</label>
                      <input type="text" name="gr_transporter[]" index-id="0" class="form-control gr_transporter" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Rate</label>
                          <div class="input-group">
                            <input type="text" name="gr_rate[]" index-id="0" maxlength="8" class="form-control gr_rate only-numeric">
                          </div>
                          <span class="error gr_rate_error"></span>
                          <!-- /.input group -->
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Ton</label>
                          <div class="input-group">
                              <input type="text" name="gr_ton[]" index-id="0" maxlength="3" class="form-control gr_ton only-numeric">
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
                      <input type="text" name="gr_rate_total[]" index-id="0" maxlength="8"  class="form-control gr_rate_total only-numeric" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Lt</label>
                          <div class="input-group">
                            <input type="text" name="other_gr_diesel_lt[]" index-id="0" maxlentgh="3" class="form-control other_gr_diesel_lt only-numeric">
                          </div>
                          <span class="error other_gr_diesel_lt_error"></span>
                          <!-- /.input group -->
                          </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Amount</label>
                          <div class="input-group">
                            <input type="text" name="other_gr_diesel_amt[]" index-id="0" maxlentgh="3" class="form-control other_gr_diesel_amt only-numeric">
                          </div>
                          <span class="error other_gr_diesel_amt_error"></span>
                          <!-- /.input group -->
                          </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Total Diesel Amt</label>
                          <div class="input-group">
                            <input type="text" name="other_total_diesel_amt[]" index-id="0" maxlentgh="3" class="form-control other_total_diesel_amt only-numeric" readonly>
                          </div>
                          <span class="error other_total_diesel_amt_error"></span>
                          <!-- /.input group -->
                          </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Cash</label>
                          <div class="input-group">
                              <input type="text" name="other_gr_cash[]" index-id="0" maxlentgh="8" class="form-control other_gr_cash only-numeric">
                          </div>
                          <span class="error other_gr_cash_error"></span>
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
                            <input type="text" name="other_gr_total_adv[]" index-id="0" maxlentgh="8" class="form-control other_gr_total_adv" readonly>
                          </div>
                          <span class="error other_gr_total_adv_error"></span>
                          <!-- /.input group -->
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Deductions</label>
                          <div class="input-group">
                              <input type="text" name="gr_deducation[]" index-id="0" maxlength="8" class="form-control gr_deducation only-numeric">
                          </div>
                          <span class="error gr_deducation_error"></span>
                          <!-- /.input group -->
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Additions</label>
                          <div class="input-group">
                              <input type="text" name="gr_addition[]" index-id="0" maxlength="8" class="form-control gr_addition only-numeric">
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
                        <input type="text" name="gr_net_payment[]" index-id="0" maxlength="8" class="form-control gr_net_payment only-numeric" placeholder="Enter ...">
                    </div>
                </div>
              </div>
             
            
              
            
              <!-- row div -->
          </div> 
            {{-- endrow --}}
             {{-- newrow --}}
              <div class="row card-footer balance_append mb-3">
              
                  <div class="col-md-4 balance" index-id="0">
                    <div class="form-group">
                        <label>Balance 1</label>
                        <input type="text" name="gr_balance[]" index-id="0"  class="form-control gr_balance" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-md-4 balance" index-id="0">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Amount</label>
                            <div class="input-group">
                              <input type="text" name="gr_balance_amt[]" index-id="0" maxlength="8" class="form-control gr_balance_amt only-numeric" readonly>
                            </div>
                            <span class="error gr_balance_amt_error"></span>
                            <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Date</label>
                            <div class="input-group">
                                <input type="text" name="gr_balance_date[]" index-id="0" class="form-control gr_balance_date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                            </div>
                            <span class="error gr_balance_date_error"></span>
                            <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    
                  </div>
                  <div class="col-md-4 balance" index-id="0">
                    <div class="form-group">
                        <label>Trip Margin</label>
                        <input type="text" name="gr_margin" id="gr_margin" maxlength="8" class="form-control gr_margin only-numeric" readonly>
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


      $(".balance").remove();

      let balance_append_html = `<div class="col-md-4 balance" index-id="0">
                    <div class="form-group">
                        <label>Balance 1</label>
                        <input type="text" name="gr_balance[]" index-id="0" class="form-control gr_balance" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-md-4 balance" index-id="0">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Amount</label>
                            <div class="input-group">
                              <input type="text" name="gr_balance_amt[]" index-id="0" maxlength="8" class="form-control gr_balance_amt only-numeric" readonly>
                            </div>
                            <span class="error gr_balance_amt_error"></span>
                            <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Date</label>
                            <div class="input-group">
                                <input type="text" name="gr_balance_date[]" index-id="0" class="form-control gr_balance_date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                            </div>
                            <span class="error gr_balance_date_error"></span>
                            <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    
                  </div>
                  <div class="col-md-4 balance" index-id="0">
                    <div class="form-group">
                        <label>Trip Margin</label>
                        <input type="text" name="gr_margin" id="gr_margin" maxlength="8" class="form-control gr_margin only-numeric" readonly>
                    </div>
                  </div>`;

      $(".balance_append").append(balance_append_html);
    
      
      //calculate final amount
    })


    $(document).on("keyup",".gr_cash_nmcc",delay(function(e){

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

      //cal balance

      $(".gr_total_advance").each(function(){
        let __index_id = $(this).attr("index-id");
        let tt_avd = [];
        for(let j = __index_id; j >= 0; j--){
          if($(".gr_total_advance[index-id='"+j+"']").length > 0){
            let gr_total_adv = parseFloat($(".gr_total_advance[index-id='"+j+"']").val());
            tt_avd.push(gr_total_adv);
          }
        }

        let sum_tt_adv = tt_avd.reduce((a, b) => a + b, 0);
        
        let cal_balance = parseFloat($("#hul_amount").val()) - sum_tt_adv;

        $(".gr_balance_amt[index-id='"+index_id+"']").val(cal_balance);
        
      })
      
    }, 500))
    // $('.gr_cash_nmcc').keyup(delay(function (e) {
      
      
    //   let gr_cash_nmcc = $(this).val();
      
    //   if(gr_cash_nmcc == undefined || gr_cash_nmcc == ""){
    //     gr_cash_nmcc = 0;
    //     //$(this).val(penality_price);
    //   }else{
    //     gr_cash_nmcc = parseFloat(gr_cash_nmcc);
    //   }
      

    //   let index_id = $(this).attr("index-id");
    //   //alert(index_id)
    //   let extra = parseFloat($(".gr_extra[index-id='"+index_id+"']").val());
    //   let gr_diesel_amount = parseFloat($(".gr_diesel_amount[index-id='"+index_id+"']").val());
    //   let __total_adv = gr_cash_nmcc + extra + gr_diesel_amount;
    //   //console.log(extra,gr_diesel_amount)
      
    //   $(".gr_total_advance[index-id='"+index_id+"']").val(__total_adv);

    //   //cal balance

    //   $(".gr_total_advance").each(function(){
    //     let __index_id = $(this).attr("index-id");
    //     let tt_avd = [];
    //     for(let j = __index_id; j >= 0; j--){
    //       if($(".gr_total_advance[index-id='"+j+"']").length > 0){
    //         let gr_total_adv = parseFloat($(".gr_total_advance[index-id='"+j+"']").val());
    //         tt_avd.push(gr_total_adv);
    //       }
    //     }

    //     let sum_tt_adv = tt_avd.reduce((a, b) => a + b, 0);
        
    //     let cal_balance = parseFloat($("#hul_amount").val()) - sum_tt_adv;

    //     $(".gr_balance_amt[index-id='"+index_id+"']").val(cal_balance);
        
    //   })

      

    // }, 500));



    $(document).on("keyup",".gr_extra",delay(function(e){
      
      
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

      $(".gr_total_advance").each(function(){
        let __index_id = $(this).attr("index-id");
        let tt_avd = [];
        for(let j = __index_id; j >= 0; j--){
          if($(".gr_total_advance[index-id='"+j+"']").length > 0){
            let gr_total_adv = parseFloat($(".gr_total_advance[index-id='"+j+"']").val());
            tt_avd.push(gr_total_adv);
          }
        }

        let sum_tt_adv = tt_avd.reduce((a, b) => a + b, 0);
        
        let cal_balance = parseFloat($("#hul_amount").val()) - sum_tt_adv;

        $(".gr_balance_amt[index-id='"+index_id+"']").val(cal_balance);
        
      })

    }, 500));


    //$('.gr_lt').keyup(delay(function (e) {
    $(document).on("keyup",".gr_lt",delay(function(e){
      
      
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

      $(".gr_total_advance").each(function(){
        let __index_id = $(this).attr("index-id");
        let tt_avd = [];
        for(let j = __index_id; j >= 0; j--){
          if($(".gr_total_advance[index-id='"+j+"']").length > 0){
            let gr_total_adv = parseFloat($(".gr_total_advance[index-id='"+j+"']").val());
            tt_avd.push(gr_total_adv);
          }
        }

        let sum_tt_adv = tt_avd.reduce((a, b) => a + b, 0);
        
        let cal_balance = parseFloat($("#hul_amount").val()) - sum_tt_adv;

        $(".gr_balance_amt[index-id='"+index_id+"']").val(cal_balance);
        
      })

    }, 500));



    //$('.gr_lt_amt').keyup(delay(function (e) {
    $(document).on("keyup",".gr_lt_amt",delay(function(e){
      
      
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

      $(".gr_total_advance").each(function(){
        let __index_id = $(this).attr("index-id");
        let tt_avd = [];
        for(let j = __index_id; j >= 0; j--){
          if($(".gr_total_advance[index-id='"+j+"']").length > 0){
            let gr_total_adv = parseFloat($(".gr_total_advance[index-id='"+j+"']").val());
            tt_avd.push(gr_total_adv);
          }
          
        }

        let sum_tt_adv = tt_avd.reduce((a, b) => a + b, 0);
        
        let cal_balance = parseFloat($("#hul_amount").val()) - sum_tt_adv;

        $(".gr_balance_amt[index-id='"+index_id+"']").val(cal_balance);
        
      })

    }, 500));


    $(".gr_plush_icon").on("click",function(){
      let lastIndex = $(".forNmccTruck:last").attr("index-id");
      let nextIndex = parseInt(lastIndex) + 1;
      let balance_counting = nextIndex + 1;

      let __html = `<div class="row card-footer mb-3 forNmccTruck" index-id="`+nextIndex+`"><span><img class="gr_del_icon"  index-id="`+nextIndex+`" src="{{url('images/background/del.png')}}"></span>
                
                
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Cash</label>
                      <input type="text" name="gr_cash_nmcc[]" index-id="`+nextIndex+`" value="0" maxlength="8" class="form-control gr_cash_nmcc only-numeric" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Bank</label>
                          <div class="input-group">
                            <input type="text" name="gr_bank[]" index-id="`+nextIndex+`"  class="form-control gr_bank" maxlength="15">
                          </div>
                          <span class="error gr_bank_error"></span>
                          
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Date</label>
                          <div class="input-group">
                              <input type="text" name="gr_new_date[]" index-id="`+nextIndex+`"  class="form-control gr_new_date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                          </div>
                          <span class="error gr_new_date_error"></span>
                          
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
                            <input type="text" name="gr_extra[]" index-id="`+nextIndex+`" maxlength="8" value="0" class="form-control gr_extra only-numeric">
                          </div>
                          <span class="error gr_extra_error"></span>
                          
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Details</label>
                          <div class="input-group">
                              <input type="text" name="gr_details[]" index-id="`+nextIndex+`" maxlength="255" class="form-control gr_details">
                          </div>
                          <span class="error gr_details_error"></span>
                          
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
                            <input type="text" name="gr_lt[]" index-id="`+nextIndex+`" maxlength="3" class="form-control gr_lt only-numeric">
                          </div>
                          <span class="error gr_lt_error"></span>
                          <!-- /.input group -->
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Amount</label>
                          <div class="input-group">
                              <input type="text" name="gr_lt_amt[]" index-id="`+nextIndex+`" maxlength="8" value="0" class="form-control gr_lt_amt only-numeric">
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
                        <input type="text" name="gr_diesel_amount[]" index-id="`+nextIndex+`" maxlength="8" class="form-control gr_diesel_amount only-numeric" value="0" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Total Advance</label>
                    <div class="input-group">
                        
                        <input type="text" name="gr_total_advance[]" index-id="`+nextIndex+`" maxlength="8" class="form-control gr_total_advance myrequire only-numeric" value="0" readonly >
                    </div>
                </div>
              
          </div>`;

      let balance_append_html = `<div class="col-md-4 balance" index-id="`+nextIndex+`">
                    <div class="form-group">
                        <label>Balance `+balance_counting+`</label>
                        <input type="text" name="gr_balance[]" index-id="`+nextIndex+`" class="form-control gr_balance" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-md-4 balance" index-id="`+nextIndex+`">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Amount</label>
                            <div class="input-group">
                              <input type="text" name="gr_balance_amt[]" index-id="`+nextIndex+`" maxlength="8" class="form-control gr_balance_amt only-numeric" readonly>
                            </div>
                            <span class="error gr_balance_amt_error"></span>
                            <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Date</label>
                            <div class="input-group">
                                <input type="text" name="gr_balance_date[]" index-id="`+nextIndex+`" class="form-control gr_balance_date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                            </div>
                            <span class="error gr_balance_date_error"></span>
                            <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    
                  </div>
                  <div class="col-md-4 balance" index-id="`+nextIndex+`">
                    <div class="form-group">
                        <label>Trip Margin</label>
                        <input type="text" name="gr_margin" id="gr_margin" maxlength="8" class="form-control gr_margin only-numeric" readonly>
                    </div>
                  </div>`;

      $(".balance_append").append(balance_append_html);

      $(".forNmccTruckIndex").append(__html);

      
    })


    $(".gr_plush_for_other_truck_icon").on("click",function(){
      let lastIndex = $(".forOtherTruck:last").attr("index-id");
      let nextIndex = parseInt(lastIndex) + 1;
      let balance_counting = nextIndex + 1;

      let __html = `<div class="row card-footer mb-3 forOtherTruck" index-id="`+nextIndex+`"><span><img class="gr_del_icon"  index-id="`+nextIndex+`" src="{{url('images/background/del.png')}}"></span>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Transporter</label>
                      <input type="text" name="gr_transporter[]" index-id="`+nextIndex+`" class="form-control gr_transporter" placeholder="Enter ...">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Rate</label>
                          <div class="input-group">
                            <input type="text" name="gr_rate[]" index-id="`+nextIndex+`" maxlength="8" class="form-control gr_rate only-numeric">
                          </div>
                          <span class="error gr_rate_error"></span>
                          
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Ton</label>
                          <div class="input-group">
                              <input type="text" name="gr_ton[]" index-id="`+nextIndex+`" maxlength="3" class="form-control gr_ton only-numeric">
                          </div>
                          <span class="error gr_ton_error"></span>
                          
                          </div>
                      </div>
                  </div>
                  
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Total</label>
                      <input type="text" name="gr_rate_total[]" index-id="`+nextIndex+`" maxlength="8"  class="form-control gr_rate_total only-numeric" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Lt</label>
                          <div class="input-group">
                            <input type="text" name="other_gr_diesel_lt[]" index-id="`+nextIndex+`" maxlentgh="3" class="form-control other_gr_diesel_lt only-numeric">
                          </div>
                          <span class="error other_gr_diesel_lt_error"></span>
                          
                          </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Amount</label>
                          <div class="input-group">
                            <input type="text" name="other_gr_diesel_amt[]" index-id="`+nextIndex+`" maxlentgh="3" class="form-control other_gr_diesel_amt only-numeric">
                          </div>
                          <span class="error other_gr_diesel_amt_error"></span>
                          
                          </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Total Diesel Amt</label>
                          <div class="input-group">
                            <input type="text" name="other_total_diesel_amt[]" index-id="`+nextIndex+`" maxlentgh="3" class="form-control other_total_diesel_amt only-numeric" readonly>
                          </div>
                          <span class="error other_total_diesel_amt_error"></span>
                         
                          </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Cash</label>
                          <div class="input-group">
                              <input type="text" name="other_gr_cash[]" index-id="`+nextIndex+`" maxlentgh="8" class="form-control other_gr_cash only-numeric">
                          </div>
                          <span class="error other_gr_cash_error"></span>
                          
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
                            <input type="text" name="other_gr_total_adv[]" index-id="`+nextIndex+`" maxlentgh="8" class="form-control other_gr_total_adv" readonly>
                          </div>
                          <span class="error other_gr_total_adv_error"></span>
                          
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Deductions</label>
                          <div class="input-group">
                              <input type="text" name="gr_deducation[]" index-id="`+nextIndex+`" maxlength="8" class="form-control gr_deducation only-numeric">
                          </div>
                          <span class="error gr_deducation_error"></span>
                          
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Additions</label>
                          <div class="input-group">
                              <input type="text" name="gr_addition[]" index-id="`+nextIndex+`" maxlength="8" class="form-control gr_addition only-numeric">
                          </div>
                          <span class="error gr_addition_error"></span>
                          
                          </div>
                      </div>
                  </div>
                  
                </div>
              
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Net Payment</label>
                        <input type="text" name="gr_net_payment[]" index-id="`+nextIndex+`" maxlength="8" class="form-control gr_net_payment only-numeric" placeholder="Enter ...">
                    </div>
                </div>
              </div>`;


              let balance_append_html = `<div class="col-md-4 balance" index-id="`+nextIndex+`">
                    <div class="form-group">
                        <label>Balance `+balance_counting+`</label>
                        <input type="text" name="gr_balance[]" index-id="`+nextIndex+`" class="form-control gr_balance" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-md-4 balance" index-id="`+nextIndex+`">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Amount</label>
                            <div class="input-group">
                              <input type="text" name="gr_balance_amt[]" index-id="`+nextIndex+`" maxlength="8" class="form-control gr_balance_amt only-numeric" readonly>
                            </div>
                            <span class="error gr_balance_amt_error"></span>
                            
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Date</label>
                            <div class="input-group">
                                <input type="text" name="gr_balance_date[]" index-id="`+nextIndex+`" class="form-control gr_balance_date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                            </div>
                            <span class="error gr_balance_date_error"></span>
                            
                            </div>
                        </div>
                    </div>
                    
                  </div>
                  <div class="col-md-4 balance" index-id="`+nextIndex+`">
                    <div class="form-group">
                        <label>Trip Margin</label>
                        <input type="text" name="gr_margin" id="gr_margin" maxlength="8" class="form-control gr_margin only-numeric" readonly>
                    </div>
                  </div>`;

          $(".balance_append").append(balance_append_html);

          $(".forOtherTruckIndex").append(__html);
    })


    $(document).on("click",".gr_del_icon",function(){
      let index_id = $(this).attr("index-id");
      $(".forNmccTruck[index-id='"+index_id+"']").remove();
      $(".forOtherTruck[index-id='"+index_id+"']").remove();
      $(".balance[index-id='"+index_id+"']").remove();
    })


    $(document).on("keyup",".gr_rate",delay(function(e){
      
      
      let gr_rate = $(this).val();
      
      if(gr_rate == undefined || gr_rate == ""){
        gr_rate = 0;
        //$(this).val(penality_price);
      }else{
        gr_rate = parseFloat(gr_rate);
      }

      let index_id = $(this).attr("index-id");
      
      let gr_ton = $(".gr_ton[index-id='"+index_id+"']").val();

      if(gr_ton != ""){
        gr_ton = parseFloat(gr_ton);
      }else{
        gr_ton = 0;
      }

      let gr_rate_into_gr_ton = gr_rate * gr_ton;


      $(".gr_rate_total[index-id='"+index_id+"']").val(gr_rate_into_gr_ton);

      
      //alert(index_id)
      let __gr_rate_total = $(".gr_rate_total[index-id='"+index_id+"']").val();
      if(__gr_rate_total != ""){
        __gr_rate_total = parseFloat(__gr_rate_total);
      }else{
        __gr_rate_total = 0;
      }

      let __other_total_diesel_amt = $(".other_total_diesel_amt[index-id='"+index_id+"']").val();
      if(__other_total_diesel_amt != ""){
        __other_total_diesel_amt = parseFloat(__other_total_diesel_amt);
      }else{
        __other_total_diesel_amt = 0;
      }

      let __other_gr_cash = $(".other_gr_cash[index-id='"+index_id+"']").val();
      if(__other_gr_cash != ""){
        __other_gr_cash = parseFloat(__other_gr_cash);
      }else{
        __other_gr_cash = 0;
      }

      
      let __total_adv = __gr_rate_total + __other_total_diesel_amt + __other_gr_cash;
      //console.log(extra,gr_diesel_amount)
      
      $(".other_gr_total_adv[index-id='"+index_id+"']").val(__total_adv);

      $(".other_gr_total_adv").each(function(){
        let __index_id = $(this).attr("index-id");
        let tt_avd = [];
        for(let j = __index_id; j >= 0; j--){
          if($(".other_gr_total_adv[index-id='"+j+"']").length > 0){
            let other_gr_total_adv = $(".other_gr_total_adv[index-id='"+j+"']").val();
            if(other_gr_total_adv != ""){
              other_gr_total_adv = parseFloat(other_gr_total_adv);
            }else{
              other_gr_total_adv = 0;
            }
            let gr_deducation = $(".gr_deducation[index-id='"+j+"']").val();
            if(gr_deducation != ""){
              gr_deducation = parseFloat(gr_deducation);
            }else{
              gr_deducation = 0;
            }
            let gr_net_payment = $(".gr_net_payment[index-id='"+j+"']").val();

            if(gr_net_payment != ""){
              gr_net_payment = parseFloat(gr_net_payment);
            }else{
              gr_net_payment = 0;
            }
            let sum_total = other_gr_total_adv + gr_deducation + gr_net_payment;
            // alert(other_gr_total_adv)
            // alert(gr_deducation)
            // alert(gr_net_payment)

            tt_avd.push(sum_total);
          }
          
        }

        let sum_tt_adv = tt_avd.reduce((a, b) => a + b, 0);
        
        let cal_balance = parseFloat($("#hul_amount").val()) - sum_tt_adv;

        $(".gr_balance_amt[index-id='"+index_id+"']").val(cal_balance);
        
      })

    }, 500));


    $(document).on("keyup",".gr_ton",delay(function(e){
      
      
      let gr_ton = $(this).val();
      
      if(gr_ton == undefined || gr_ton == ""){
        gr_ton = 0;
        //$(this).val(penality_price);
      }else{
        gr_ton = parseFloat(gr_ton);
      }

      let index_id = $(this).attr("index-id");
      
      let gr_rate = $(".gr_rate[index-id='"+index_id+"']").val();

      if(gr_rate != ""){
        gr_rate = parseFloat(gr_rate);
      }else{
        gr_rate = 0;
      }

      let gr_rate_into_gr_ton = gr_rate * gr_ton;


      $(".gr_rate_total[index-id='"+index_id+"']").val(gr_rate_into_gr_ton);

      
      //alert(index_id)
      let __gr_rate_total = $(".gr_rate_total[index-id='"+index_id+"']").val();
      if(__gr_rate_total != ""){
        __gr_rate_total = parseFloat(__gr_rate_total);
      }else{
        __gr_rate_total = 0;
      }

      let __other_total_diesel_amt = $(".other_total_diesel_amt[index-id='"+index_id+"']").val();
      if(__other_total_diesel_amt != ""){
        __other_total_diesel_amt = parseFloat(__other_total_diesel_amt);
      }else{
        __other_total_diesel_amt = 0;
      }

      let __other_gr_cash = $(".other_gr_cash[index-id='"+index_id+"']").val();
      if(__other_gr_cash != ""){
        __other_gr_cash = parseFloat(__other_gr_cash);
      }else{
        __other_gr_cash = 0;
      }

      
      let __total_adv = __gr_rate_total + __other_total_diesel_amt + __other_gr_cash;
      //console.log(extra,gr_diesel_amount)
      
      $(".other_gr_total_adv[index-id='"+index_id+"']").val(__total_adv);

      $(".other_gr_total_adv").each(function(){
        let __index_id = $(this).attr("index-id");
        let tt_avd = [];
        for(let j = __index_id; j >= 0; j--){
          if($(".other_gr_total_adv[index-id='"+j+"']").length > 0){
            let other_gr_total_adv = $(".other_gr_total_adv[index-id='"+j+"']").val();
            if(other_gr_total_adv != ""){
              other_gr_total_adv = parseFloat(other_gr_total_adv);
            }else{
              other_gr_total_adv = 0;
            }
            let gr_deducation = $(".gr_deducation[index-id='"+j+"']").val();
            if(gr_deducation != ""){
              gr_deducation = parseFloat(gr_deducation);
            }else{
              gr_deducation = 0;
            }
            let gr_net_payment = $(".gr_net_payment[index-id='"+j+"']").val();

            if(gr_net_payment != ""){
              gr_net_payment = parseFloat(gr_net_payment);
            }else{
              gr_net_payment = 0;
            }
            let sum_total = other_gr_total_adv + gr_deducation + gr_net_payment;
            tt_avd.push(sum_total);
          }
          
        }

        let sum_tt_adv = tt_avd.reduce((a, b) => a + b, 0);
        
        let cal_balance = parseFloat($("#hul_amount").val()) - sum_tt_adv;

        $(".gr_balance_amt[index-id='"+index_id+"']").val(cal_balance);
        
      })

    }, 500));


    $(document).on("keyup",".other_gr_diesel_lt",delay(function(e){
      
      
      let other_gr_diesel_lt = $(this).val();
      
      if(other_gr_diesel_lt == undefined || other_gr_diesel_lt == ""){
        other_gr_diesel_lt = 0;
        //$(this).val(penality_price);
      }else{
        other_gr_diesel_lt = parseFloat(other_gr_diesel_lt);
      }

      let index_id = $(this).attr("index-id");
      
      let other_gr_diesel_amt = $(".other_gr_diesel_amt[index-id='"+index_id+"']").val();

      if(other_gr_diesel_amt != ""){
        other_gr_diesel_amt = parseFloat(other_gr_diesel_amt);
      }else{
        other_gr_diesel_amt = 0;
      }

      let other_gr_diesel_lt_into_other_gr_diesel_amt = other_gr_diesel_lt * other_gr_diesel_amt;


      $(".other_total_diesel_amt[index-id='"+index_id+"']").val(other_gr_diesel_lt_into_other_gr_diesel_amt);

      
      //alert(index_id)
      let __gr_rate_total = $(".gr_rate_total[index-id='"+index_id+"']").val();
      if(__gr_rate_total != ""){
        __gr_rate_total = parseFloat(__gr_rate_total);
      }else{
        __gr_rate_total = 0;
      }

      let __other_total_diesel_amt = $(".other_total_diesel_amt[index-id='"+index_id+"']").val();
      if(__other_total_diesel_amt != ""){
        __other_total_diesel_amt = parseFloat(__other_total_diesel_amt);
      }else{
        __other_total_diesel_amt = 0;
      }

      let __other_gr_cash = $(".other_gr_cash[index-id='"+index_id+"']").val();
      if(__other_gr_cash != ""){
        __other_gr_cash = parseFloat(__other_gr_cash);
      }else{
        __other_gr_cash = 0;
      }

      
      let __total_adv = __gr_rate_total + __other_total_diesel_amt + __other_gr_cash;
      //console.log(extra,gr_diesel_amount)
      
      $(".other_gr_total_adv[index-id='"+index_id+"']").val(__total_adv);

      $(".other_gr_total_adv").each(function(){
        let __index_id = $(this).attr("index-id");
        let tt_avd = [];
        for(let j = __index_id; j >= 0; j--){
          if($(".other_gr_total_adv[index-id='"+j+"']").length > 0){
            let other_gr_total_adv = $(".other_gr_total_adv[index-id='"+j+"']").val();
            if(other_gr_total_adv != ""){
              other_gr_total_adv = parseFloat(other_gr_total_adv);
            }else{
              other_gr_total_adv = 0;
            }
            let gr_deducation = $(".gr_deducation[index-id='"+j+"']").val();
            if(gr_deducation != ""){
              gr_deducation = parseFloat(gr_deducation);
            }else{
              gr_deducation = 0;
            }
            let gr_net_payment = $(".gr_net_payment[index-id='"+j+"']").val();

            if(gr_net_payment != ""){
              gr_net_payment = parseFloat(gr_net_payment);
            }else{
              gr_net_payment = 0;
            }
            let sum_total = other_gr_total_adv + gr_deducation + gr_net_payment;
            tt_avd.push(sum_total);
          }
          
        }

        let sum_tt_adv = tt_avd.reduce((a, b) => a + b, 0);
        
        let cal_balance = parseFloat($("#hul_amount").val()) - sum_tt_adv;

        $(".gr_balance_amt[index-id='"+index_id+"']").val(cal_balance);
        
      })

    }, 500));


    $(document).on("keyup",".other_gr_diesel_amt",delay(function(e){
      
      
      let other_gr_diesel_amt = $(this).val();
      
      if(other_gr_diesel_amt == undefined || other_gr_diesel_amt == ""){
        other_gr_diesel_amt = 0;
        //$(this).val(penality_price);
      }else{
        other_gr_diesel_amt = parseFloat(other_gr_diesel_amt);
      }

      let index_id = $(this).attr("index-id");
      
      let other_gr_diesel_lt = $(".other_gr_diesel_lt[index-id='"+index_id+"']").val();

      if(other_gr_diesel_lt != ""){
        other_gr_diesel_lt = parseFloat(other_gr_diesel_lt);
      }else{
        other_gr_diesel_lt = 0;
      }

      let other_gr_diesel_lt_into_other_gr_diesel_amt = other_gr_diesel_lt * other_gr_diesel_amt;


      $(".other_total_diesel_amt[index-id='"+index_id+"']").val(other_gr_diesel_lt_into_other_gr_diesel_amt);

      
      //alert(index_id)
      let __gr_rate_total = $(".gr_rate_total[index-id='"+index_id+"']").val();
      if(__gr_rate_total != ""){
        __gr_rate_total = parseFloat(__gr_rate_total);
      }else{
        __gr_rate_total = 0;
      }

      let __other_total_diesel_amt = $(".other_total_diesel_amt[index-id='"+index_id+"']").val();
      if(__other_total_diesel_amt != ""){
        __other_total_diesel_amt = parseFloat(__other_total_diesel_amt);
      }else{
        __other_total_diesel_amt = 0;
      }

      let __other_gr_cash = $(".other_gr_cash[index-id='"+index_id+"']").val();
      if(__other_gr_cash != ""){
        __other_gr_cash = parseFloat(__other_gr_cash);
      }else{
        __other_gr_cash = 0;
      }

      
      let __total_adv = __gr_rate_total + __other_total_diesel_amt + __other_gr_cash;
      //console.log(extra,gr_diesel_amount)
      
      $(".other_gr_total_adv[index-id='"+index_id+"']").val(__total_adv);

      $(".other_gr_total_adv").each(function(){
        let __index_id = $(this).attr("index-id");
        let tt_avd = [];
        for(let j = __index_id; j >= 0; j--){
          if($(".other_gr_total_adv[index-id='"+j+"']").length > 0){
            let other_gr_total_adv = $(".other_gr_total_adv[index-id='"+j+"']").val();
            if(other_gr_total_adv != ""){
              other_gr_total_adv = parseFloat(other_gr_total_adv);
            }else{
              other_gr_total_adv = 0;
            }
            let gr_deducation = $(".gr_deducation[index-id='"+j+"']").val();
            if(gr_deducation != ""){
              gr_deducation = parseFloat(gr_deducation);
            }else{
              gr_deducation = 0;
            }
            let gr_net_payment = $(".gr_net_payment[index-id='"+j+"']").val();

            if(gr_net_payment != ""){
              gr_net_payment = parseFloat(gr_net_payment);
            }else{
              gr_net_payment = 0;
            }
            let sum_total = other_gr_total_adv + gr_deducation + gr_net_payment;
            tt_avd.push(sum_total);
          }
          
        }

        let sum_tt_adv = tt_avd.reduce((a, b) => a + b, 0);
        
        let cal_balance = parseFloat($("#hul_amount").val()) - sum_tt_adv;

        $(".gr_balance_amt[index-id='"+index_id+"']").val(cal_balance);
        
      })

    }, 500));


    $(document).on("keyup",".other_gr_cash",delay(function(e){
      
      
      let other_gr_cash = $(this).val();
      
      if(other_gr_cash == undefined || other_gr_cash == ""){
        other_gr_cash = 0;
        //$(this).val(penality_price);
      }else{
        other_gr_cash = parseFloat(other_gr_cash);
      }

      let index_id = $(this).attr("index-id");
    
      
      //alert(index_id)
      let __gr_rate_total = $(".gr_rate_total[index-id='"+index_id+"']").val();
      if(__gr_rate_total != ""){
        __gr_rate_total = parseFloat(__gr_rate_total);
      }else{
        __gr_rate_total = 0;
      }

      let __other_total_diesel_amt = $(".other_total_diesel_amt[index-id='"+index_id+"']").val();
      if(__other_total_diesel_amt != ""){
        __other_total_diesel_amt = parseFloat(__other_total_diesel_amt);
      }else{
        __other_total_diesel_amt = 0;
      }

      let __other_gr_cash = $(".other_gr_cash[index-id='"+index_id+"']").val();
      if(__other_gr_cash != ""){
        __other_gr_cash = parseFloat(__other_gr_cash);
      }else{
        __other_gr_cash = 0;
      }

      
      let __total_adv = __gr_rate_total + __other_total_diesel_amt + __other_gr_cash;
      //console.log(extra,gr_diesel_amount)
      
      $(".other_gr_total_adv[index-id='"+index_id+"']").val(__total_adv);

      $(".other_gr_total_adv").each(function(){
        let __index_id = $(this).attr("index-id");
        let tt_avd = [];
        for(let j = __index_id; j >= 0; j--){
          if($(".other_gr_total_adv[index-id='"+j+"']").length > 0){
            let other_gr_total_adv = $(".other_gr_total_adv[index-id='"+j+"']").val();
            if(other_gr_total_adv != ""){
              other_gr_total_adv = parseFloat(other_gr_total_adv);
            }else{
              other_gr_total_adv = 0;
            }
            let gr_deducation = $(".gr_deducation[index-id='"+j+"']").val();
            if(gr_deducation != ""){
              gr_deducation = parseFloat(gr_deducation);
            }else{
              gr_deducation = 0;
            }
            let gr_net_payment = $(".gr_net_payment[index-id='"+j+"']").val();

            if(gr_net_payment != ""){
              gr_net_payment = parseFloat(gr_net_payment);
            }else{
              gr_net_payment = 0;
            }
            let sum_total = other_gr_total_adv + gr_deducation + gr_net_payment;
            tt_avd.push(sum_total);
          }
          
        }

        let sum_tt_adv = tt_avd.reduce((a, b) => a + b, 0);
        
        let cal_balance = parseFloat($("#hul_amount").val()) - sum_tt_adv;

        $(".gr_balance_amt[index-id='"+index_id+"']").val(cal_balance);
        
      })

    }, 500));


    $(document).on("keyup",".gr_deducation",delay(function(e){
      
      
      let gr_deducation = $(this).val();
      
      if(gr_deducation == undefined || gr_deducation == ""){
        gr_deducation = 0;
        //$(this).val(penality_price);
      }else{
        gr_deducation = parseFloat(gr_deducation);
      }

      let index_id = $(this).attr("index-id");
    
      
      //alert(index_id)
      let __gr_rate_total = $(".gr_rate_total[index-id='"+index_id+"']").val();
      if(__gr_rate_total != ""){
        __gr_rate_total = parseFloat(__gr_rate_total);
      }else{
        __gr_rate_total = 0;
      }

      let __other_total_diesel_amt = $(".other_total_diesel_amt[index-id='"+index_id+"']").val();
      if(__other_total_diesel_amt != ""){
        __other_total_diesel_amt = parseFloat(__other_total_diesel_amt);
      }else{
        __other_total_diesel_amt = 0;
      }

      let __other_gr_cash = $(".other_gr_cash[index-id='"+index_id+"']").val();
      if(__other_gr_cash != ""){
        __other_gr_cash = parseFloat(__other_gr_cash);
      }else{
        __other_gr_cash = 0;
      }

      
      let __total_adv = __gr_rate_total + __other_total_diesel_amt + __other_gr_cash;
      //console.log(extra,gr_diesel_amount)
      
      $(".other_gr_total_adv[index-id='"+index_id+"']").val(__total_adv);

      $(".other_gr_total_adv").each(function(){
        let __index_id = $(this).attr("index-id");
        let tt_avd = [];
        for(let j = __index_id; j >= 0; j--){
          if($(".other_gr_total_adv[index-id='"+j+"']").length > 0){
            let other_gr_total_adv = $(".other_gr_total_adv[index-id='"+j+"']").val();
            if(other_gr_total_adv != ""){
              other_gr_total_adv = parseFloat(other_gr_total_adv);
            }else{
              other_gr_total_adv = 0;
            }
            let gr_deducation = $(".gr_deducation[index-id='"+j+"']").val();
            if(gr_deducation != ""){
              gr_deducation = parseFloat(gr_deducation);
            }else{
              gr_deducation = 0;
            }
            let gr_net_payment = $(".gr_net_payment[index-id='"+j+"']").val();

            if(gr_net_payment != ""){
              gr_net_payment = parseFloat(gr_net_payment);
            }else{
              gr_net_payment = 0;
            }
            let sum_total = other_gr_total_adv + gr_deducation + gr_net_payment;
            tt_avd.push(sum_total);
          }
          
        }

        let sum_tt_adv = tt_avd.reduce((a, b) => a + b, 0);
        
        let cal_balance = parseFloat($("#hul_amount").val()) - sum_tt_adv;

        $(".gr_balance_amt[index-id='"+index_id+"']").val(cal_balance);
        
      })

    }, 500));
    

    $(document).on("keyup",".gr_addition",delay(function(e){
      
      
      let gr_addition = $(this).val();
      
      if(gr_addition == undefined || gr_addition == ""){
        gr_addition = 0;
        //$(this).val(penality_price);
      }else{
        gr_addition = parseFloat(gr_addition);
      }

      let index_id = $(this).attr("index-id");
    
      
      //alert(index_id)
      let __gr_rate_total = $(".gr_rate_total[index-id='"+index_id+"']").val();
      if(__gr_rate_total != ""){
        __gr_rate_total = parseFloat(__gr_rate_total);
      }else{
        __gr_rate_total = 0;
      }

      let __other_total_diesel_amt = $(".other_total_diesel_amt[index-id='"+index_id+"']").val();
      if(__other_total_diesel_amt != ""){
        __other_total_diesel_amt = parseFloat(__other_total_diesel_amt);
      }else{
        __other_total_diesel_amt = 0;
      }

      let __other_gr_cash = $(".other_gr_cash[index-id='"+index_id+"']").val();
      if(__other_gr_cash != ""){
        __other_gr_cash = parseFloat(__other_gr_cash);
      }else{
        __other_gr_cash = 0;
      }

      
      let __total_adv = __gr_rate_total + __other_total_diesel_amt + __other_gr_cash;
      //console.log(extra,gr_diesel_amount)
      
      $(".other_gr_total_adv[index-id='"+index_id+"']").val(__total_adv);

      $(".other_gr_total_adv").each(function(){
        let __index_id = $(this).attr("index-id");
        let tt_avd = [];
        for(let j = __index_id; j >= 0; j--){
          if($(".other_gr_total_adv[index-id='"+j+"']").length > 0){
            let other_gr_total_adv = $(".other_gr_total_adv[index-id='"+j+"']").val();
            if(other_gr_total_adv != ""){
              other_gr_total_adv = parseFloat(other_gr_total_adv);
            }else{
              other_gr_total_adv = 0;
            }
            let gr_deducation = $(".gr_deducation[index-id='"+j+"']").val();
            if(gr_deducation != ""){
              gr_deducation = parseFloat(gr_deducation);
            }else{
              gr_deducation = 0;
            }
            let gr_net_payment = $(".gr_net_payment[index-id='"+j+"']").val();

            if(gr_net_payment != ""){
              gr_net_payment = parseFloat(gr_net_payment);
            }else{
              gr_net_payment = 0;
            }
            let sum_total = other_gr_total_adv + gr_deducation + gr_net_payment;
            tt_avd.push(sum_total);
          }
          
        }

        let sum_tt_adv = tt_avd.reduce((a, b) => a + b, 0);
        
        let cal_balance = parseFloat($("#hul_amount").val()) - sum_tt_adv;

        $(".gr_balance_amt[index-id='"+index_id+"']").val(cal_balance);
        
      })

    }, 500));
    
    $(document).on("keyup",".gr_net_payment",delay(function(e){
      
      
      let gr_net_payment = $(this).val();
      
      if(gr_net_payment == undefined || gr_net_payment == ""){
        gr_net_payment = 0;
        //$(this).val(penality_price);
      }else{
        gr_net_payment = parseFloat(gr_net_payment);
      }

      let index_id = $(this).attr("index-id");
    
      
      //alert(index_id)
      let __gr_rate_total = $(".gr_rate_total[index-id='"+index_id+"']").val();
      if(__gr_rate_total != ""){
        __gr_rate_total = parseFloat(__gr_rate_total);
      }else{
        __gr_rate_total = 0;
      }

      let __other_total_diesel_amt = $(".other_total_diesel_amt[index-id='"+index_id+"']").val();
      if(__other_total_diesel_amt != ""){
        __other_total_diesel_amt = parseFloat(__other_total_diesel_amt);
      }else{
        __other_total_diesel_amt = 0;
      }

      let __other_gr_cash = $(".other_gr_cash[index-id='"+index_id+"']").val();
      if(__other_gr_cash != ""){
        __other_gr_cash = parseFloat(__other_gr_cash);
      }else{
        __other_gr_cash = 0;
      }

      
      let __total_adv = __gr_rate_total + __other_total_diesel_amt + __other_gr_cash;
      //console.log(extra,gr_diesel_amount)
      
      $(".other_gr_total_adv[index-id='"+index_id+"']").val(__total_adv);

      $(".other_gr_total_adv").each(function(){
        let __index_id = $(this).attr("index-id");
        let tt_avd = [];
        for(let j = __index_id; j >= 0; j--){
          if($(".other_gr_total_adv[index-id='"+j+"']").length > 0){
            let other_gr_total_adv = $(".other_gr_total_adv[index-id='"+j+"']").val();
            if(other_gr_total_adv != ""){
              other_gr_total_adv = parseFloat(other_gr_total_adv);
            }else{
              other_gr_total_adv = 0;
            }
            let gr_deducation = $(".gr_deducation[index-id='"+j+"']").val();
            if(gr_deducation != ""){
              gr_deducation = parseFloat(gr_deducation);
            }else{
              gr_deducation = 0;
            }
            let gr_net_payment = $(".gr_net_payment[index-id='"+j+"']").val();

            if(gr_net_payment != ""){
              gr_net_payment = parseFloat(gr_net_payment);
            }else{
              gr_net_payment = 0;
            }
            let sum_total = other_gr_total_adv + gr_deducation + gr_net_payment;
            tt_avd.push(sum_total);
          }
          
        }

        let sum_tt_adv = tt_avd.reduce((a, b) => a + b, 0);
        
        let cal_balance = parseFloat($("#hul_amount").val()) - sum_tt_adv;

        $(".gr_balance_amt[index-id='"+index_id+"']").val(cal_balance);
        
      })

    }, 500));
    

  })
</script>
@endsection()