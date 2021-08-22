<?php

namespace App\Http\Controllers;

use App\Collage;
use Illuminate\Http\Request;

class CollageController extends Controller
{
    
    public function index()
    {
        return view('admin.collageIndex');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

   
    public function show(Collage $collage)
    {
        //
    }

    public function edit(Collage $collage)
    {
        //
    }

    
    public function update(Request $request, Collage $collage)
    {
        //
    }

   
    public function destroy(Collage $collage)
    {
        //
    }
}
