<?php

namespace App\Http\Controllers;

use App\Collage;
use App\ProgramLevel;
use Validator;
use App\ProgramType;
use App\User;
use Illuminate\Support\Facades\DB;
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
        $registrars = DB::select('select * from model_has_roles where role_id = ?', [6]);
        // dd($registrars);
        foreach($registrars as $registrar){
            $registarUsers[] = User::where('id',$registrar->model_id)->first();
        }
        // dd($registarUsers);
        return view('admin.createCollage',compact('pls','pts','registarUsers'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'CollageName' => 'required',
            'ProgramType' => 'required',
            'ProgramLevel' => 'required',
            'registrar_id' => 'required'
        ]);
        
        $collage = new Collage();
        $collage->CollageName = $request->CollageName;
        $collage->programlevel_id = $request->ProgramLevel;
        $collage->programtype_id = $request->ProgramType;
        $collage->registrar_id = $request->registrar_id;
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
