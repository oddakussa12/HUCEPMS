<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collage;
use App\Departement;

class NonAuthController extends Controller
{
    public function index(){
        return view('nonAuth.index');
    }
    public function getApplicationForm(){
        $collages = Collage::all();
        $departements = Departement::all();
        return view('nonAuth.applicationForm',compact('collages','departements'));
    }
}
