<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Parents;
use App\Student;
Use App\Departement;
use Illuminate\Support\Facades\DB;
use App\Teacher;
use App\Collage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        
        if ($user->hasRole('Admin')) {

            $parents = Parents::latest()->get();
            $teachers = Teacher::latest()->get();
            $students = Student::latest()->get();
            return view('home', compact('parents','teachers','students'));
        }
        elseif($user->hasRole('Registrar')) {
            $user = Auth::user();
            // dd($user);
            $collage = Collage::where('registrar_id',$user->id)->first();
            // dd($collage);
            // dd($collage->departements);
            return view('registrar.home',compact('collage'));
        }
        elseif($user->hasRole('DepHead')) {
            $auth_user = Auth::user()->id;
            // dd($user);
            $departement = Departement::where('head_user_id',$auth_user)->first();
            $Students = Student::where('departement_id',$departement->id)->get();
            // dd($Students);
            $subjects = $departement->subjects;
            
            return view('DepHead.home',compact('departement','Students','subjects'));
        }
         elseif ($user->hasRole('Teacher')) {
            $user = Auth::user();
            // dd($user);
            $teacher = Teacher::where('user_id',$user->id)->first();
            $teacherDepartements = DB::select('select * from departement_subject where teacher_id = ?', [$user->id]);
            return view('teacher.teacherHome',compact('teacher'));
        }
         elseif ($user->hasRole('Parent')) {
            
            $parents = Parents::with(['children'])->withCount('children')->findOrFail($user->parent->id); 

            return view('home', compact('parents'));

        } elseif ($user->hasRole('Student')) {
            
            $student = Student::with(['user','parent','class','attendances'])->findOrFail($user->student->id); 

            if($user->is_active == 0){
                return view('student.uploadRecipt');
            }else{
                return view('home', compact('student'));
            }
            

        } else {
            return 'NO ROLE ASSIGNED YET!';
        }
        
    }

    /**
     * PROFILE
     */
    public function profile() 
    {
        return view('profile.index');
    }

    public function profileEdit() 
    {
        return view('profile.edit');
    }

    public function profileUpdate(Request $request) 
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id()
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug(auth()->user()->name).'-'.auth()->id().'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = 'avatar.png';
        }

        $user = auth()->user();

        $user->update([
            'name'              => $request->name,
            'email'             => $request->email,
            'profile_picture'   => $profile
        ]);

        return redirect()->route('profile');
    }

    /**
     * CHANGE PASSWORD
     */
    public function changePasswordForm()
    {  
        return view('profile.changepassword');
    }

    public function changePassword(Request $request)
    {     
        if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {
            return back()->with([
                'msg_currentpassword' => 'Your current password does not matches with the password you provided! Please try again.'
            ]);
        }
        if(strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){
            return back()->with([
                'msg_currentpassword' => 'New Password cannot be same as your current password! Please choose a different password.'
            ]);
        }

        $this->validate($request, [
            'currentpassword' => 'required',
            'newpassword'     => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        $user->password = bcrypt($request->get('newpassword'));
        $user->save();

        Auth::logout();
        return redirect()->route('login');
    }
}
