<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Tone;
use App\Models\ClaimPenaltyRecord;
use App\Models\Truck;

class GRRegistrationController extends Controller
{
    public function index(Request $request){

        if($request->isMethod('GET')){
            
            return view('admin.gr_registration.index');
        }

        if($request->isMethod('POST')){

        }
        
    }

    public function findHultoneAccordingToQuantity(Request $request){
        $quantity = $request->quantity;
        $find_hul_tone_according_to_quantity = Tone::where('maximum_quantity', '>=', $quantity)->orderBy('maximum_quantity','asc')->first();
        return $find_hul_tone_according_to_quantity;
    }

    public function store(Request $request){
        if($request->isMethod('GET')){
            $claim_price = 100;
            $penalty_price = 100;

            $find_claim_penalty_record = ClaimPenaltyRecord::first();

            if(!empty($find_claim_penalty_record)){
                $claim_price = $find_claim_penalty_record->claim_price_per_day;
                $penalty_price = $find_claim_penalty_record->penalty_price_per_day;
            }
            $days_upto = [];
            for($j=1; $j<=100; $j++){
                $days_upto[] = $j;
            }

           $trucks = Truck::select("id","truck_no","truck_type")->whereDeletedAt(null)->get();

            return view('admin.gr_registration.create',compact('days_upto','claim_price','penalty_price','trucks'));
        }

        if($request->isMethod('POST')){

        }


    }

    public function hulTone(Request $request){
        if($request->isMethod('GET')){
            return view('admin.gr_registration.hultone_listing');
        }

        if($request->isMethod('POST')){
            $column = "id";
            $asc_desc = $request->get("order")[0]['dir'];
         
            if($asc_desc == "asc"){
                $asc_desc = "desc";
            }else{
                $asc_desc = "asc";
            }

            $order = $request->get("order")[0]['column'];
            if($order == 1){
                $column = "id";
            }elseif($order == 2){
                $column = "tone_serial_number";
            }elseif($order == 3){
                $column = "hul_tone";
            }elseif ($order == 4) {
                $column = "price";
            }

            //return $request->publish_status;

            $data = Tone::orderBy($column,$asc_desc);
            $total = $data->get()->count();

            $search = "";
            if(!empty($request->get("search")["value"])){
                $search = $request->get("search")["value"];
            }
            $filter = $total;


            if($search){
                $data  = $data->where(function($query) use($search){
                            $query->orWhere('tone_serial_number', 'Like', '%'. $search . '%');
                            $query->orWhere('hul_tone', 'Like', '%' . $search . '%');
                            $query->orWhere('price', 'Like', '%' . $search . '%');
                        });

                $filter = $data->get()->count();
                                
            }

            $data = $data->offset($request->start);
            $data = $data->take($request->length);
            $data = $data->get();


            $start_from = $request->start;
            if($start_from == 0){
                $start_from  = 1;
            }
            if($start_from % 10 == 0){
                $start_from = $start_from + 1;
            }


            foreach ($data as $k => $row) {

                $editUrl = route('admin.gr-register.editHulTone') . "/" . $row->id;

                $btn ="";
                $btn .= '<a href="'.$editUrl.'" class="px-2 mr-2"> 
                        <button class="btn btn-primary"><i class="fa fa-edit" ></i></button></a>
                        <button class="btn btn-danger delbtn" data-id="'.$row->id.'" type="button" ><i class="fa fa-trash" ></i></button>';

                $row->action = $btn;
                
                $row->DT_RowIndex = $start_from++;

                    
                    
            }


            $return_data = [
                    "data" => $data,
                    "draw" => (int)$request->draw,
                    "recordsTotal" => $total,
                    "recordsFiltered" => $filter,
                    "input" => $request->all()
            ];
            return response()->json($return_data);
        }
        

    }

    public function storeHulTone(Request $request){
        if($request->isMethod('GET')){
            return view('admin.gr_registration.create_hultone');
        }

        if($request->isMethod('POST')){

            $data = $request->all();

            $data['maximum_quantity'] = $data['hul_tone'] * 1000;

            $save_hul_tone = new Tone();
            $save_hul_tone->fill($data);
            $save_hul_tone->save();
            Session::flash('success',"Hul Tone saved successfully.");
            return redirect(route('admin.gr-register.hulTone'));

        }


    }

    public function checkExistsHulTone(Request $request){
        $hul_tone = (double)$request->hul_tone;
        $id = $request->id;

        if(empty($id)){
            $find_hul_tone = Tone::whereHulTone($hul_tone)->first();
        }else{
            $find_hul_tone = Tone::whereHulTone($hul_tone)->where('id','!=',$id)->first();
        }
        
        if($find_hul_tone){
            return 1;
        }else{
            return 0;
        }
    }

    public function checkToneSerialNumber(Request $request){
        $tone_serial_number = $request->tone_serial_number;
        $id = $request->id;
        if(empty($id)){
            $find_tone_serial_number = Tone::whereToneSerialNumber($tone_serial_number)->first();
        }else{
            $find_tone_serial_number = Tone::whereToneSerialNumber($tone_serial_number)->where('id','!=',$id)->first();
        }
        
        if($find_tone_serial_number){
            return 1;
        }else{
            return 0;
        }
    }

    public function editHulTone(Request $request){
        if($request->isMethod('GET')){
            $hul_tone_id = $request->id;
            $find_hul_tone = Tone::find($hul_tone_id);
            return view('admin.gr_registration.edit_hultone',compact('find_hul_tone'));
        }

        if($request->isMethod('POST')){
            $hul_tone_id = $request->id;
            $data = $request->all();

            $data['maximum_quantity'] = $data['hul_tone'] * 1000;

            $find_hul_tone = Tone::find($hul_tone_id);
            $find_hul_tone->fill($data);
            $find_hul_tone->save();
            Session::flash('success',"Hul Tone edited successfully.");
            return redirect(route('admin.gr-register.hulTone'));


        }


    }

    public function deleteHulTone(Request $request){
        $id = $request->id;
        Tone::whereId($id)->delete();
        return "success";
    }


    //Claim

    public function claimPenalty(Request $request){
        if($request->isMethod('GET')){
            $find_claim_penalty_record = ClaimPenaltyRecord::first();
            return view('admin.gr_registration.claim_penalty',compact('find_claim_penalty_record'));
        }

        if($request->isMethod('POST')){
            $data = $request->all();

            $find_claim_penalty_record = ClaimPenaltyRecord::first();
            if(empty($find_claim_penalty_record)){
                $claim_penalty_record = new ClaimPenaltyRecord();
            }else{
                $claim_penalty_record = $find_claim_penalty_record;
            }
            
            $claim_penalty_record->fill($data);
            $claim_penalty_record->save();
            Session::flash('success',"Claim/Penalty record saved successfully.");
            return redirect(route('admin.gr-register.claimPenalty'));
        }
    }
}
