<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Teacher;
use App\Collage;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class SubjectController extends Controller
{
    
    public function index()
    {
        // $subjects = Subject::with('teacher')->latest()->paginate(10);
        $subjects = Subject::all();
        
        return view('backend.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $teachers = Teacher::latest()->get();
        $collages = Collage::all();

        return view('backend.subjects.create', compact('teachers','collages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255|unique:subjects',
            'subject_code'  => 'required|numeric|unique:subjects',
            // 'teacher_id'    => 'required|numeric',
            'collage_id'    => 'required',
            'description'   => 'required|string|max:255',
            'credit_hr'     => 'required|numeric'
        ]);

        // Subject::create([
        //     'name'          => $request->name,
        //     'slug'          => Str::slug($request->name),
        //     'subject_code'  => $request->subject_code,
        //     'collage_id'  => $request->collage_id,
        //     // 'teacher_id'    => $request->teacher_id,
        //     'description'   => $request->description
        // ]);
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->slug = Str::slug($request->name);
        $subject->subject_code = $request->subject_code;
        $subject->collage_id = $request->collage_id;
        $subject->description = $request->description;
        $subject->credit_hr = $request->credit_hr;

        $subject->save();
        $subject->teachers()->attach($request->teacher_id);


        // $subject = new Subject();
        // $subject->teachers()->sync()

        return redirect()->route('subject.index');
    }

    
    public function show(Subject $subject)
    {
    }

   
    public function edit(Subject $subject)
    {
        $teachers = Teacher::latest()->get();

        return view('backend.subjects.edit', compact('subject','teachers'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name'          => 'required|string|max:255|unique:subjects,name,'.$subject->id,
            'subject_code'  => 'required|numeric',
            'teacher_id'    => 'required|numeric',
            'description'   => 'required|string|max:255'
        ]);

        $subject->update([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'subject_code'  => $request->subject_code,
            'teacher_id'    => $request->teacher_id,
            'description'   => $request->description
        ]);

        return redirect()->route('subject.index');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return back();
    }
}
