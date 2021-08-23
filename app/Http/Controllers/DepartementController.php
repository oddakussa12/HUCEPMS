<?php

namespace App\Http\Controllers;

use App\Departement;
use App\Collage;
use Illuminate\Http\Request;

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
        return view('admin.createDepartement',compact('collages','collage'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'DepartementName' => 'required',
            'CollageName' => 'required',
        ]);

        $departement = new Departement();
        $departement->name = $request->DepartementName;
        $departement->collage_id = $request->CollageName;
        $departement->save();
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

    public function edit(Departement $departement)
    {
        //
    }

   
    public function update(Request $request, Departement $departement)
    {
        //
    }

    
    public function destroy(Departement $departement)
    {
        //
    }
}
