<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NonAuthController extends Controller
{
    public function index(){
        return view('nonAuth.index');
    }
    public function getApplicationForm(){
        return view('nonAuth.applicationForm');
    }
}
