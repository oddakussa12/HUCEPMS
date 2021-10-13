<?php

namespace App\Http\Controllers;

use App\User;
use App\Grade;
use Auth;
use App\GPA;
use App\Parents;
use App\Collage;
use App\Student;
use App\Grad;
use App\Departement;
use App\Assesement;
use App\Subject;
use App\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
   
    public function index()
    {
        $students = Student::with('class')->latest()->paginate(10);

        return view('backend.students.index', compact('students'));
    }

   
    public function create()
    {
        $classes = Grade::latest()->get();
        $departements = Departement::latest()->get();
        $parents = Parents::with('user')->latest()->get();
        
        return view('backend.students.create', compact('classes','parents','departements'));
    }
    public function createStudentByRegistrar(){
        $user = Auth::user()->id;
        $program = Collage::where('registrar_id',$user)->first();
        $departements = $program->departements;
        // dd($departements);
        return view('backend.students.create', compact('departements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users',
            'password'          => 'required|string|min:8',
            // 'parent_id'         => 'required|numeric',
            // 'class_id'          => 'required|numeric',
            'departement_id'          => 'required|numeric',
            
            // 'roll_number'       => [
            //     'required',
            //     'numeric',
            //     Rule::unique('students')->where(function ($query) use ($request) {
            //         return $query->where('class_id', $request->class_id);
            //     })
            // ],
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            // 'dateofbirth'       => 'required|date',
            // 'current_address'   => 'required|string|max:255',
            // 'permanent_address' => 'required|string|max:255'
        ]);

        $user = User::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => Hash::make($request->password)
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

        $user->student()->create([
            // 'parent_id'         => $request->parent_id,
            // 'class_id'          => $request->class_id,
            'departement_id'          => $request->departement_id,
            // 'roll_number'       => $request->roll_number,
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            // 'dateofbirth'       => $request->dateofbirth,
            // 'current_address'   => $request->current_address,
            // 'permanent_address' => $request->permanent_address
        ]);

        $user->assignRole('Student');

        return redirect()->route('student.index');
    }

    public function show(Student $student)
    {
        $class = Grade::with('subjects')->where('id', $student->class_id)->first();
        
        return view('backend.students.show', compact('class','student'));
    }

  
    public function edit(Student $student)
    {
        $departements = Departement::latest()->get();
        $classes = Grade::latest()->get();
        $parents = Parents::with('user')->latest()->get();

        return view('backend.students.edit', compact('classes','parents','student','departements'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email,'.$student->user_id,
            // 'parent_id'         => 'required|numeric',
            'departement_id'          => 'required|numeric',
            // 'roll_number'       => [
            //     'required',
            //     'numeric',
            //     Rule::unique('students')->ignore($student->id)->where(function ($query) use ($request) {
            //         return $query->where('class_id', $request->class_id);
            //     })
            // ],
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            // 'dateofbirth'       => 'required|date',
            // 'current_address'   => 'required|string|max:255',
            // 'permanent_address' => 'required|string|max:255'
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($student->user->name).'-'.$student->user->id.'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = $student->user->profile_picture;
        }

        $student->user()->update([
            'name'              => $request->name,
            'email'             => $request->email,
            'profile_picture'   => $profile
        ]);

        $student->update([
            // 'parent_id'         => $request->parent_id,
            'departement_id'          => $request->departement_id,
            // 'roll_number'       => $request->roll_number,
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            // 'dateofbirth'       => $request->dateofbirth,
            // 'current_address'   => $request->current_address,
            // 'permanent_address' => $request->permanent_address
        ]);

        return redirect()->route('student.index');
    }

    public function destroy(Student $student)
    {
        $user = User::findOrFail($student->user_id);
        $user->student()->delete();
        $user->removeRole('Student');

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


    // return student course page for student
    public function getStudentCourses(){
        // dd(Auth::user()->id);
        $student = Student::where('user_id',Auth::user()->id)->first();
        // dd($student->departement);
        return view('student.courses',compact('student'));
    }
    // return each course page for student

    public function getCourse($id){
        // dd($id);
        $resources = Resource::where('subject_id',$id)->get();
        $subject = Subject::where('id',$id)->first();
        // dd($resources);
        $user_id = Auth::user()->id;
        $student = Student::where('user_id',$user_id)->first();
        $subjectExams = $student->exams->where('subject_id',$id);
        // dd($subjectExams);
        // foreach($subjectExams as $subjectExam){
        //     dd($subjectExam->pivot->mark);
        // }
        
        return view('student.coursePage',compact('resources','subjectExams','subject',));
    }

    public function gradeReport(){
        $user = Auth::user()->id;
        // dd($user);
        $student = Student::where('user_id',$user)->first();
        // dd($student);
        $departement = $student->departement;
        $subjects = $departement->subjects;
        // dd($subjects);
        $subjectGrades = array();
        foreach($subjects as $subject){
            $subjectGrades[] =  Grad::where('subject_id',$subject->id)->where('student_id',$student->id)->get();
        }
        // dd($subjectGrades);
        $gpa = GPA::where('student_id',$student->id)->first();
        // dd($gpa);
        if($gpa != null){
            // dd("not null");
        }
    
        return view('student.gradeReport',compact('student','departement','subjects','gpa','subjectGrades'));
    }

}
