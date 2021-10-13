<?php

namespace App\Http\Controllers;

use App\GPA;
use Illuminate\Http\Request;
use App\User;
use App\Teacher;
use App\Subject;
use App\Departement;
use App\Student;
use App\Resource;
use App\Exam;
use Validator;
use File;
use App\Grad;
use Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GPAController extends Controller
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
        //
    }

    
    public function show(GPA $gPA)
    {
        //
    }

    public function edit(GPA $gPA)
    {
        //
    }

    
    public function update(Request $request, GPA $gPA)
    {
        //
    }

    public function destroy(GPA $gPA)
    {
        //
    }
    public function departementGPA($id){
        $departement = Departement::find($id);
        // dd($departement);
        $students = $departement->students;
        // dd($students);
        $subjects = $departement->subjects;
        // dd($subjects);
        foreach($students as $student){
            // $gpa = GPA::where('student_id',$student->id)->first();
            $totalSubjectsAverage = 0;
            $totalCreditHr = 0;
            $gpa = GPA::firstOrNew(['student_id' => $student->id]);
            
            foreach($subjects as $subject){
                // dd($subject->credit_hr);
                $studentSubjectGrade = Grad::select('grade')->where('subject_id',$subject->id)->where('student_id',$student->id)->first();
                // dd($studentSubjectGrade->grade);
                $subjectCrHr = $subject->credit_hr;
                $totalCreditHr = $totalCreditHr + $subjectCrHr;
                // dd($subjectCrHr);
                if($studentSubjectGrade->grade == "B"){
                    $subjectCount = 3*$subjectCrHr;
                    $totalSubjectsAverage = $totalSubjectsAverage + $subjectCount;
                    // dd($subjectCount);
                }if($studentSubjectGrade->grade === "C"){
                    $subjectCount = 2*$subjectCrHr;
                    $totalSubjectsAverage = $totalSubjectsAverage + $subjectCount;
                    // dd($subjectCount);
                }if($studentSubjectGrade->grade == "D"){
                    $subjectCount = 1*$subjectCrHr;
                    $totalSubjectsAverage = $totalSubjectsAverage + $subjectCount;
                    // dd($subjectCount);
                }if($studentSubjectGrade->grade === "A"){
                    $subjectCount = 4*$subjectCrHr;
                    $totalSubjectsAverage = $totalSubjectsAverage + $subjectCount;
                    // dd($subjectCount);
                }

            }//end subjects loop
            $semisterGPA = $totalSubjectsAverage/$totalCreditHr;
            $gpa->GPA = $semisterGPA;
            // dd($semisterGPA);
            $gpa->save();
            
        }//end students subject   
        return redirect('/home');
    }
}
