<?php

namespace App\Http\Controllers;

use App\Collage;
use App\ProgramLevel;
use Validator;
use App\ProgramType;
use Illuminate\Http\Request;

class CollageController extends Controller
{
    
    public function index()
    {
        $collages = Collage::all();
        return view('admin.collageIndex',compact('collages'));
    }

    public function create()
    {
        $pls = ProgramLevel::all();
        $pts = ProgramType::all();
        return view('admin.createCollage',compact('pls','pts'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'CollageName' => 'required',
            'ProgramType' => 'required',
            'ProgramLevel' => 'required',
        ]);
        
        $collage = new Collage();
        $collage->CollageName = $request->CollageName;
        $collage->programlevel_id = $request->ProgramLevel;
        $collage->programtype_id = $request->ProgramType;
        $collage->save();
        $notificationn = array(
            'message' =>'Collage created successfully',
            'alert-type' =>'success'
        );
        return redirect('/collages')->with($notificationn);
    }

   
    public function show(Collage $collage)
    {
        //
    }

    public function edit(Collage $collage ,$id)
    {
        $collage = Collage::where('id',$id)->first();
        $pls = ProgramLevel::all();
        $pts = ProgramType::all();
        return view('admin.editCollage',compact('collage','pls','pts'));
    }

    
    public function update(Request $request, Collage $collage, $id)
    {
        $this->validate($request,[
            'CollageName' => 'required',
            'ProgramType' => 'required',
            'ProgramLevel' => 'required',
        ]);
        
        $collage = Collage::where('id',$id)->first();
        $collage->CollageName = $request->CollageName;
        $collage->programtype_id = $request->ProgramType;
        $collage->programlevel_id = $request->ProgramLevel;
        $collage->Save();
        $notificationn = array(
            'message' =>'Collage updated successfully',
            'alert-type' =>'success'
        );
        return redirect('/collages')->with($notificationn);
    }

   
    public function destroy(Collage $collage)
    {
        //
    }
}
