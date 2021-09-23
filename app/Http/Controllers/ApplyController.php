<?php

namespace App\Http\Controllers;

use App\Apply;
use App\Student;
use App\User;
use App\Mail\StudentApply;
use App\Mail\ApplicationApproved;
use Illuminate\Support\Facades\Hash;
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
       
        // if($request->hasfile('resume'))
        // {
        //     $file = $request->resume;
        //     $extension = $file->getClientOriginalName();
        //     $filename = time() . '.' . $extension;
        //     $file->move(public_path().'/images/', $filename);
        //     $apply->resume = $filename;
        //  }

         if($request->file('resume')) 
        {
            $file = $request->file('resume');
            $filename = time() . '.' . $request->file('resume')->extension();
            $filePath = public_path() . '/files/uploads/';
            $file->move($filePath, $filename);
            $apply->resume = $filename;
        }
        $apply->save();


        $myEmail = $request->email;
   
        $details = [
            'title' => 'Application email from Haromaya University.com',
            'url' => 'http://localhost:8000',
            'user' => $request->first_name . " " . $request->middle_name
        ];
  
        Mail::to($myEmail)->send(new StudentApply($details));
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

    public function approveApplicant($id){
        $applicant = Apply::where('id',$id)->first();
        // dd($applicant);
        
        $user = User::create([
            'name'              => $applicant->first_name." ".$applicant->middle_name,
            'email'             => $applicant->email,
            'password'          => Hash::make("1234")
        ]);

        // if ($request->hasFile('profile_picture')) {
        //     $profile = Str::slug($user->name).'-'.$user->id.'.'.$request->profile_picture->getClientOriginalExtension();
        //     $request->profile_picture->move(public_path('images/profile'), $profile);
        // } else {
        $profile = 'avatar.png';
        // }
        $user->update([
            'profile_picture' => $profile
        ]);

        $user->student()->create([
            'departement_id'          => $applicant->departement_id,
            'gender'            => $applicant->gender,
            'phone'             => $applicant->phone_number,
        ]);
        $user->assignRole('Student');
        

        // $myEmail = $request->email;
   
        $details = [
            'title' => 'Congratulations!. Your application to haromaya university has been approved',
            'url' => 'http://localhost:8000',
            'user' => $applicant->first_name . " " . $applicant->middle_name,
            'email' =>$applicant->email,
        ];
  
        Mail::to($applicant->email)->send(new ApplicationApproved($details));
        $applicant->delete();
        return redirect('/viewApplicants');
    }
    public function declineApplicant(){

    }
    public function downloadApplicationForm($name){
        return response()->download(public_path().'/files/uploads/'.$name);
    }
}
