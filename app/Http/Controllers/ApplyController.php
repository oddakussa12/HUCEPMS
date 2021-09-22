<?php

namespace App\Http\Controllers;

use App\Apply;
use App\Mail\StudentApply;
use Mail;
use Illuminate\Support\Facades\Auth;
use App\Collage;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    
    public function index()
    {
        // return all the applicants
        $user = Auth::user();
        // dd($user->id);
        $collage = Collage::where('registrar_id',$user->id)->first();
        // dd($collage);
        $applicants = Apply::where('collage_id',$collage->id)->get();
        // OR
        $applicants = $collage->applicants;
        // dd($applicants);
        return view('registrar.applicants',compact('applicants','collage'));
    }

    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'first_name'              => 'required|string|max:255',
            'last_name'              => 'required|string|max:255',
            'middle_name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users',
            // 'departement_id'          => 'required|numeric',
            'gender'            => 'required|string',
            'resume'            => 'required',
            'phone_number'             => 'required|string|min:10',
            'collage_id' => 'required',
            'departement_id' => 'required',
        ]);
        
        $apply = new Apply();
        $apply->first_name = $request->first_name;
        $apply->last_name = $request->last_name;
        $apply->middle_name = $request->middle_name;
        $apply->phone_number = $request->phone_number;
        $apply->email = $request->email;
        $apply->gender = $request->gender;
        $apply->collage_id = $request->collage_id;
        $apply->departement_id = $request->departement_id;
        if ($request->hasFile('resume')) {
            $apply->resume = $request->resume;
        }
        $apply->save();


        $myEmail = $request->email;
   
        $details = [
            'title' => 'Application email from Haromaya University.com',
            'url' => 'http://localhost:8000',
            'user' => $request->first_name . " " . $request->middle_name
        ];
  
        Mail::to($myEmail)->send(new StudentApply($details));
   
        // dd("Mail Send Successfully");
        return back()->with('success','You have applied successfully, Please check your email.');
    }

    public function show(Apply $apply,$id)
    {
        $applicant = Apply::where('id',$id)->first();
        $collage = $applicant->collage;

        return view('registrar.viewApplicant',compact('applicant','collage'));
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
