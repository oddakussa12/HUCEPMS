<?php

namespace App\Http\Controllers;

use App\ProgramType;
use Illuminate\Http\Request;
use Validator;
class ProgramTypeController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = array(
            'ProgramType' => 'required',
        );
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'name' => $request->ProgramType,
        ); 
        ProgramType::create($form_data);
        return response()->json(['success'=> 'Program Type Added Successfully.']); 
    }

   
    public function show(ProgramType $programType)
    {
        //
    }

    public function edit(ProgramType $programType)
    {
        //
    }

    public function update(Request $request, ProgramType $programType)
    {
        $rules = array(
            'ProgramType' => 'required',
        );
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors' => $error->errors()->all()]);
        }
 
        $pt = ProgramType::find($request->progTypeid);
        $pt->name  = $request->ProgramType;
        $pt->save();

        return response()->json(['success'=> 'Program Type Updated Successfully.']);
    }

    public function destroy(ProgramType $programType)
    {
        //
    }
}
