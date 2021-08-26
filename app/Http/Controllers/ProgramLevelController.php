<?php

namespace App\Http\Controllers;

use App\ProgramLevel;
use App\ProgramType;

use Illuminate\Http\Request;
use Validator;

class ProgramLevelController extends Controller
{
   
    public function index()
    {
        // return program levels and program types
        $pls = ProgramLevel::all();
        $pts = ProgramType::all();
        return view('admin.programesIndex',compact('pls','pts'));
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = array(
            'ProgramLevel' => 'required',
        );
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'name' => $request->ProgramLevel,
        ); 
        ProgramLevel::create($form_data);
        

        return response()->json(['success'=> 'Program Level Added Successfully.']); 
    }

    public function show(ProgramLevel $programLevel)
    {
        //
    }

    public function edit(ProgramLevel $programLevel)
    {
        //
    }

    
    public function update(Request $request, ProgramLevel $programLevel)
    {
        $rules = array(
            'ProgramLevel' => 'required',
        );
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors' => $error->errors()->all()]);
        }
 
        $pl = ProgramLevel::find($request->progLevelid);
        $pl->name  = $request->ProgramLevel;
        $pl->save();

        return response()->json(['success'=> 'Program Level Updated Successfully.']);
    }

    public function destroy(ProgramLevel $programLevel)
    {
        //
    }
}
