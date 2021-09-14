<?php

namespace App\Http\Controllers;

use App\Apply;
use Illuminate\Http\Request;

class ApplyController extends Controller
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
        $request->validate([
            'first_name'              => 'required|string|max:255',
            'last_name'              => 'required|string|max:255',
            'middle_name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users',
            // 'departement_id'          => 'required|numeric',
            'gender'            => 'required|string',
            'resume'            => 'required',
            'phone_number'             => 'required',
        ]);
        
        $apply = new Apply();
        $apply->first_name = $request->first_name;
        $apply->last_name = $request->last_name;
        $apply->middle_name = $request->middle_name;
        $apply->phone_number = $request->phone_number;
        $apply->email = $request->email;
        $apply->gender = $request->gender;
        if ($request->hasFile('resume')) {
            $apply->resume = $request->resume;
        }
        $apply->save();
    }

    public function show(Apply $apply)
    {
        //
    }

    public function edit(Apply $apply)
    {
        //
    }

    
    public function update(Request $request, Apply $apply)
    {
        //
    }

    public function destroy(Apply $apply)
    {
        //
    }
}
