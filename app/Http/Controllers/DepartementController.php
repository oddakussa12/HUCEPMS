<?php

namespace App\Http\Controllers;

use App\Departement;
use Illuminate\Support\Facades\Auth;
use App\Collage;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartementController extends Controller
{
   
    public function index()
    {
        // $departements = Departement::all()->groupBy('collage_id');
        $collages = Collage::all();
        return view('admin.departementIndex',compact('collages'));
    }

    public function create($id)
    {
        $collages = Collage::all();
        $collage = Collage::where('id',$id)->first();
        // get all users with role departement_head
        $heads = DB::select('select * from model_has_roles where role_id = ?', [5]);
        if($heads != null){
            foreach($heads as $head){
                $headUsers[] = User::where('id', $head->model_id)->first();
            }
        }else{
            $headUsers = null;
        }
        

        // dd($headUsers);
        // subjects in this collage
        $subjects = Subject::all();
        return view('admin.createDepartement',compact('collages','collage','subjects','headUsers'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'DepartementName' => 'required',
            'CollageName' => 'required',
            'DepartementHead_id' => 'required',
        ]);
    

        $departement = new Departement();
        $departement->name = $request->DepartementName;
        $departement->collage_id = $request->CollageName;
        $departement->head_user_id = $request->DepartementHead_id;
        $departement->save();
        // foreach ($request->subjects as $subject){
        //     $departement->subjects()->attach($subject,['teacher_id' => $request->input('teacher_id'.$subject)]);
        // }

        $notificationn = array(
            'message' =>'Departement created successfully',
            'alert-type' =>'success'
        );
        return redirect('/departements')->with($notificationn);
    }

   
    public function show(Departement $departement)
    {
        //
    }

    public function edit(Departement $departement,$id)
    {
        $collages = Collage::all();
        $dept = Departement::where('id',$id)->first();
        $collage = $dept->collage;
        // $collage = Collage::where('id',$id)->first();
        // subjects in this collage
        $subjects = Subject::all();
        $heads = DB::select('select * from model_has_roles where role_id = ?', [5]);
        foreach($heads as $head){
            $headUsers[] = User::where('id', $head->model_id)->first();
        }
        // dd($subjects);
        return view('admin.editDepartement',compact('collages','dept','collage','subjects','headUsers'));
    }

   
    public function update(Request $request, Departement $departement,$id)
    {
        $this->validate($request,[
            'DepartementName' => 'required',
            'CollageName' => 'required',
            'DepartementHead_id' => 'required',
        ]);
    

        $departement = Departement::where('id',$id)->first();
        $departement->name = $request->DepartementName;
        $departement->collage_id = $request->CollageName;
        $departement->head_user_id = $request->DepartementHead_id;
        $departement->save();
        
        $notificationn = array(
            'message' =>'Departement updated successfully',
            'alert-type' =>'success'
        );
        return redirect('/departements')->with($notificationn);
    }

    
    public function destroy($id)
    {
        $departement = Departement::find($id);
        $departement->delete();
        return redirect()->back();
    }

    public function addSubjectToDepartement(){
       
        $subjects = Subject::all();
        $dept = Departement::where('head_user_id',Auth::user()->id)->first();
        return view('DepHead.addCourse',compact('subjects','dept'));
    }
    public function addSubjectToDepartementPost(Request $request){
        // dd($request);
        $departement = Departement::where('head_user_id',Auth::user()->id)->first();
        // dd($departement);
        $departement->subjects()->detach();
        
        foreach ($request->subjects as $subject){
            $departement->subjects()->attach($subject,['teacher_id' => $request->input('teacher_id'.$subject)]);
        }

        $notificationn = array(
            'message' =>'Courses added successfully to departement',
            'alert-type' =>'success'
        );
        return redirect('/home')->with($notificationn);
    }

    public function deleteCourseFromDept(Request $request){
        $departement = Departement::where('head_user_id',Auth::user()->id)->first();
        $subject = Subject::where('id',$request->subjectId)->first();
        // dd($subject);
        // dd($departement);
        $departement->subjects()->detach($subject);
        return redirect()->back();
    }

}
