<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tone;

class GRRegistrationController extends Controller
{
    public function index(Request $request){

        if($request->isMethod('GET')){
            return view('admin.gr_registration.index');
        }

        if($request->isMethod('POST')){

        }
        
    }

    public function store(Request $request){
        if($request->isMethod('GET')){
            return view('admin.gr_registration.create');
        }

        if($request->isMethod('POST')){

        }


    }

    public function hulTone(Request $request){
        return view('admin.gr_registration.hultone_listing');

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
            return redirect(route('admin.gr-register.hulTone'));

        }


    }

    public function checkExistsHulTone(Request $request){
        $hul_tone = $request->hul_tone;
        $find_hul_tone = Tone::whereHulTone($hul_tone)->first();
        if($find_hul_tone){
            return 1;
        }else{
            return 0;
        }
    }

    public function editHulTone(Request $request){
        if($request->isMethod('GET')){
            return view('admin.gr_registration.edit_hultone');
        }

        if($request->isMethod('POST')){

        }


    }
}
