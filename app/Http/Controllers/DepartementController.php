<?php

namespace App\Http\Controllers;

use App\Departement;
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
        foreach($heads as $head){
            $headUsers[] = User::where('id', $head->model_id)->first();
        }
        // dd($headUsers);
        // subjects in this collage
        $subjects = Subject::where('collage_id',$id)->get();
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
        foreach ($request->subjects as $subject){
            $departement->subjects()->attach($subject,['teacher_id' => $request->input('teacher_id'.$subject)]);
        }

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
        $subjects = Subject::where('collage_id',$collage->id)->get();
        // dd($subjects);
        return view('admin.editDepartement',compact('collages','dept','collage','subjects'));
    }

   
    public function update(Request $request, Departement $departement,$id)
    {
        $this->validate($request,[
            'DepartementName' => 'required',
            'CollageName' => 'required',
        ]);
    

        $departement = Departement::where('id',$id)->first();
        $departement->name = $request->DepartementName;
        $departement->collage_id = $request->CollageName;
        $departement->save();
        foreach ($request->subjects as $subject){
            $departement->subjects()->attach($subject,['teacher_id' => $request->input('teacher_id'.$subject)]);
            // $departement->subjects()->sync($subject,['teacher_id' => $request->input('teacher_id'.$subject)]);
        }
        
        $notificationn = array(
            'message' =>'Departement updated successfully',
            'alert-type' =>'success'
        );
        return redirect('/departements')->with($notificationn);
    }

    
    public function destroy(Departement $departement)
    {
        //
    }
}
