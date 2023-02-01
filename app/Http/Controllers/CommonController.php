<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Models\Truck;
class CommonController extends Controller
{
    public function imageupload($filename,$foldername)
    {
        $type = array(1 => 'jpg', 2 => 'jpeg', 3 => 'png');
     
            $extension = strtolower($filename->getClientOriginalExtension());
            if (in_array($extension,$type)) {
                $fileNameToStore = time() . '.' . $extension;
                if (!File::exists('assets/uploads/'.$foldername)) {
                    File::makeDirectory('assets/uploads/'.$foldername, 0777, true);
                }
                
                $licence_doc = $filename->move('assets/uploads/'.$foldername, $fileNameToStore);
                return $fileNameToStore;
               
            }else{
              return "fail";
            }
        
    }
    public function truck_no_search($truck_no=0)
    {
     
        if($truck_no == "0")
        {
            return "empty";
        }
        else{
            
            $truck_chk=Truck::where('truck_no',$truck_no)->first();
            if($truck_chk)
            {
                return "already";
            }
            else 
            {
                return "ok";
            }
        }
        
    }
}
