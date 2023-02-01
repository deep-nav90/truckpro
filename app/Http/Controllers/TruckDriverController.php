<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;
use App\Models\TruckDriver;
use Carbon\Carbon;
use App\Http\Controllers\CommonController;
class TruckDriverController extends Controller
{
    public function index(Request $request)
    {
        $truckdata=TruckDriver::orderBy('id','DESC')->get();
        return view('admin.driver.index',compact('truckdata'));
    }
    public function store(Request $request)
    {
        // return $request->all();
        $added_by = Auth::guard('admin')->user()->id;
        $commonClass = new CommonController;
        $driver = new TruckDriver;
        if($request->hasFile('licence_doc'))
        {
            $licence_doc=$commonClass->imageupload($request->file('licence_doc'),'licence_doc');
            if($licence_doc=='fail')
            {
                return response()->json(['status'=>false,'message' => 'Please select valid App image file with following extensions .jpg .jpeg .png','type' => 'string'], 400);
            }
            else{
                $driver->licence_doc=$licence_doc;
            }
            
        }
        if($request->hasFile('aadhar_card_doc'))
        {
            
            $aadhar_card_doc=$commonClass->imageupload($request->file('aadhar_card_doc'),'aadhar_card');
            if($aadhar_card_doc=='fail')
            {
                return response()->json(['status'=>false,'message' => 'Please select valid App image file with following extensions .jpg .jpeg .png','type' => 'string'], 400);
            }
            else{
                $driver->aadhar_card_doc=$aadhar_card_doc;
            }
            
        }

        $driver->driver_name=$request->driver_name;
        $driver->driver_email=$request->driver_email;
        $driver->driver_phone=$request->driver_phone;
        $driver->driver_alter_phone=$request->driver_alter_phone;
        $driver->driving_licence=$request->driving_licence;
        $driver->licence_exp_date=$request->licence_exp_date;
        $driver->aadhar_card=$request->aadhar_card;
        $driver->driver_address=$request->driver_address;
        $driver->added_date=Carbon::now()->format('Y-m-d');
        $driver->added_by=$added_by;
        if($driver->save())
        {
            return "success";
        }
        else{
            return "fail";
        }
    }
    public function destroy(Request $request)
    {
        $del = TruckDriver::find($request->id);
        if ($del) {
            $del->delete();
        }
        return response()->json(['data' => ['message' => 'Driver deleted successfully.','status'=>'success']], 200);
    }
    public function updateStatus(Request $request, $id = 0)
    {
        // print_r($request->id);

        // print_r($id);
        // die();
        $status = $request->status;
        if($request->multisel==0)
        {
            $type = TruckDriver::where('id', $id)->update(['status' => $status]);
        }
        else{
            $type = TruckDriver::whereIn('id', $request->id )->update(['status' => $status]);
        }



        if ($type) {
            return response()->json(['status' => true, 'message' => 'Status updated successfully'], 200);
        } else {
            return response()->json(['status' => false, 'message' => 'something went wrong'], 401);
        }
    }

    public function show(Request $request, $id = 0)
    {
       
        $truckdata=TruckDriver::whereId($id)->first();
        return view('admin.driver.show',compact('truckdata'));
    }

    public function edit(Request $request, $id = 0)
    {
        
        $truckdata=TruckDriver::whereId($id)->first();
        return view('admin.driver.edit',compact('truckdata'));
    }
}
