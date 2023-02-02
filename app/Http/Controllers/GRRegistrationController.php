<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GRRegistrationController extends Controller
{
    public function index(Request $request)
    {
        
    }
    public function create(Request $request)
    {
        return view('admin.gr_registration.create');
    }
}
