<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;
use App\Models\TruckDriver;
use App\Models\Truck;
use Carbon\Carbon;
use App\Http\Controllers\CommonController;
class TruckController extends Controller
{
    public function index(Request $request)
    {
        $trucklist=Truck::where('status',1)->get();
        return view('admin.truck.index',compact('trucklist'));
    }
    public function create(Request $request)
    {
        $driverlist=TruckDriver::where('status',1)->get();
        return view('admin.truck.create',compact('driverlist')); 
    }
    public function store(Request $request)
    {
        print_r($request->all());
        $added_by = Auth::guard('admin')->user()->id;
        $commonClass = new CommonController;
        $truck = new Truck;
        $truck->trucktype=$request->trucktype;
        $truck->truck_no=$request->truck_no;
        if($request->trucktype==2)
        {
            if($request->hasFile('pan_card_doc'))
            {
                $pan_card_doc=$commonClass->imageupload($request->file('pan_card_doc'),'pan_card_doc');
                if($pan_card_doc=='fail')
                {
                    return response()->json(['status'=>false,'message' => 'Please select valid App image file with following extensions .jpg .jpeg .png','type' => 'string'], 400);
                }
                else{
                    $truck->pan_card_doc=$pan_card_doc;
                }
                
            }
            if($request->hasFile('affidavit_doc'))
            {
                $affidavit_doc=$commonClass->imageupload($request->file('affidavit_doc'),'affidavit_doc');
                if($affidavit_doc=='fail')
                {
                    return response()->json(['status'=>false,'message' => 'Please select valid App image file with following extensions .jpg .jpeg .png','type' => 'string'], 400);
                }
                else{
                    $truck->affidavit_doc=$affidavit_doc;
                }
                
            }
            
            $truck->owner_name=$request->owner_name;
            $truck->pan_card_no=$request->pan_card_no;
            $truck->bank_name=$request->bank_name;
            $truck->affidavit_no=$request->affidavit_no;
            $truck->account_no=$request->account_no;
            $truck->ifsc_no=$request->ifsc_no;
        }
        else
        {
            if($request->hasFile('register_doc'))
            {
                $register_doc=$commonClass->imageupload($request->file('register_doc'),'register_doc');
                if($register_doc=='fail')
                {
                    return response()->json(['status'=>false,'message' => 'Please select valid App image file with following extensions .jpg .jpeg .png','type' => 'string'], 400);
                }
                else{
                    $truck->register_doc=$register_doc;
                }
                
            }

            if($request->hasFile('national_permit_doc'))
            {
                $national_permit_doc=$commonClass->imageupload($request->file('national_permit_doc'),'national_permit_doc');
                if($national_permit_doc=='fail')
                {
                    return response()->json(['status'=>false,'message' => 'Please select valid App image file with following extensions .jpg .jpeg .png','type' => 'string'], 400);
                }
                else{
                    $truck->national_permit_doc=$national_permit_doc;
                }
                
            }
            if($request->hasFile('punjab_permit_doc'))
            {
                $punjab_permit_doc=$commonClass->imageupload($request->file('punjab_permit_doc'),'punjab_permit_doc');
                if($punjab_permit_doc=='fail')
                {
                    return response()->json(['status'=>false,'message' => 'Please select valid App image file with following extensions .jpg .jpeg .png','type' => 'string'], 400);
                }
                else{
                    $truck->punjab_permit_doc=$punjab_permit_doc;
                }
                
            }

            if($request->hasFile('insurance_doc'))
            {
                $insurance_doc=$commonClass->imageupload($request->file('insurance_doc'),'insurance_doc');
                if($insurance_doc=='fail')
                {
                    return response()->json(['status'=>false,'message' => 'Please select valid App image file with following extensions .jpg .jpeg .png','type' => 'string'], 400);
                }
                else{
                    $truck->insurance_doc=$insurance_doc;
                }
                
            }
            if($request->hasFile('polution_doc'))
            {
                $polution_doc=$commonClass->imageupload($request->file('polution_doc'),'polution_doc');
                if($polution_doc=='fail')
                {
                    return response()->json(['status'=>false,'message' => 'Please select valid App image file with following extensions .jpg .jpeg .png','type' => 'string'], 400);
                }
                else{
                    $truck->polution_doc=$polution_doc;
                }
                
            }

            $truck->driver_id=$request->driver_id;
            $truck->register_no=$request->register_no;
            $truck->register_exp_date=$request->register_exp_date;
            $truck->national_permit_no=$request->national_permit_no;
            $truck->national_permit_exp_date=$request->national_permit_exp_date;
            $truck->punjab_permit_no=$request->punjab_permit_no;

            $truck->punjab_exp_date=$request->punjab_exp_date;
            $truck->insurance_no=$request->insurance_no;
            $truck->insurance_exp_date=$request->insurance_exp_date;
            $truck->polution_no=$request->polution_no;
            $truck->polution_exp_date=$request->polution_exp_date;
            
        }
        $truck->added_date=Carbon::now()->format('Y-m-d');
        $truck->added_by=$added_by;
        if($truck->save())
        {
            return "success";
        }
        else{
            return "fail";
        }
        
    }
}
