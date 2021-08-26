<?php

namespace App\Http\Controllers;

use App\User;
use App\Teacher;
use App\Subject;
use App\Departement;
use App\Student;
use App\Resource;
use App\Assesement;
use Validator;
use File;
use Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function index()
    {   
        // this is used by the admin
        $teachers = Teacher::with('user')->latest()->paginate(10);
        return view('backend.teachers.index', compact('teachers'));
    }   
    public function create()
    {
        return view('backend.teachers.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users',
            'password'          => 'required|string|min:8',
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            // 'dateofbirth'       => 'required|date',
            'current_address'   => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255'
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);
        
        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($user->name).'-'.$user->id.'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = 'avatar.png';
        }
        $user->update([
            'profile_picture' => $profile
        ]);

        $user->teacher()->create([
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            // 'dateofbirth'       => $request->dateofbirth,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);

        $user->assignRole('Teacher');

        return redirect()->route('teacher.index');
    }

    public function show(Teacher $teacher)
    {
        //
    }

    
    public function edit(Teacher $teacher)
    {
        $teacher = Teacher::with('user')->findOrFail($teacher->id);

        return view('backend.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email,'.$teacher->user_id,
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            'dateofbirth'       => 'required|date',
            'current_address'   => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255'
        ]);

        $user = User::findOrFail($teacher->user_id);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($user->name).'-'.$user->id.'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = $user->profile_picture;
        }

        $user->update([
            'name'              => $request->name,
            'email'             => $request->email,
            'profile_picture'   => $profile
        ]);

        $user->teacher()->update([
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            'dateofbirth'       => $request->dateofbirth,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);

        return redirect()->route('teacher.index');
    }

    public function destroy(Teacher $teacher)
    {
        $user = User::findOrFail($teacher->user_id);

        $user->teacher()->delete();
        
        $user->removeRole('Teacher');

        if ($user->delete()) {
            if($user->profile_picture != 'avatar.png') {
                $image_path = public_path() . '/images/profile/' . $user->profile_picture;
                if (is_file($image_path) && file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }

        return back();
    }

    public function viewDepartement($dept,$sub){
        // dd($sub);
        $departement = Departement::where('id',$dept)->first();
        $students = Student::where('departement_id',$dept)->get();
        $subject = Subject::where('id',$sub)->first();
        $resources = Resource::where('subject_id',$sub)->get();
        $user = Auth::user();
        $teacher = Teacher::where('user_id',$user->id)->first();
        return view('teacher.departementIndex',compact('departement','students','resources','subject'));
    }
    public function addResource(Request $request){
        // dd($request);
        $rules = array(
            'subjectid' => 'required',
            'ResourceName' => 'required',
            'File' => 'required'
        );
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $resource = new Resource();
        $resource->subject_id = $request->subjectid;
        $resource->name = $request->ResourceName;
        $resource->teacher_id = Auth::user()->id;//this is not the actual teacher id
        if($request->file('File')) 
        {
            $file = $request->file('File');
            $filename = time() . '.' . $request->file('File')->extension();
            $filePath = public_path() . '/files/uploads/';
            $file->move($filePath, $filename);
            $resource->filename = $filename;
        }
        $resource->save();

        return response()->json(['success'=> 'Resource Added Successfully.']); 
    }
    public function updateResource(Request $request){
        $rules = array(
            'ResourceName' => 'required',
            'File' => 'required'
        );
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $resource = Resource::where('id',$request->resoid)->first();
        $resource->name = $request->ResourceName;
        if($request->file('File')) 
        {
            $file = $request->file('File');
            $filename = time() . '.' . $request->file('File')->extension();
            $filePath = public_path() . '/files/uploads/';
            $file->move($filePath, $filename);
            $resource->filename = $filename;
        }
        $resource->save();
        return response()->json(['success'=> 'Resource Updated Successfully.']); 
    }    
    public function getFile($filename,$name){
        return response()->download(public_path().'/files/uploads/'.$filename,$name.'-'.$filename);
    }
    public function bulkInsertExamResult(Request $request){
        // Log::info($request->stud_id);
        $size = sizeOf($request->stud_id);
        for($i=0 ; $i<$size ; $i++) {
            $assesement = new Assesement();
            $assesement->subject_id = $request->subjectid;
            $assesement->student_id = $request->stud_id[$i];
            $assesement->testOne = $request->ExamResult[$i];
            $assesement->save();
        }
        return response()->json(['success'=> 'Exam result recorded successfully.']); 
    }


}
