@extends('layouts.app')

@section('content')

<div class="home">
        <div class="row">
            <div class ="col-sm-6">
                <h4 class="text-gray-700 uppercase font-bold">Create Departement
                     ( <span class="badge badge-info">{{$collage->programType->name}}</span> ,
                     <span class="badge badge-info">{{$collage->programLevel->name}}</span>)</h4>
            </div>
            <div class="col-sm-6 text-right">
                <a href="/departements" style="width:80px;" class="btn btn-secondary btn-sm">Back</a>
            </div>
        </div>
    <div class="container-fluid" style="padding:0px;margin-top:70px;max-width:600px;">
        <form method="post" action="/create_dept">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class = "row">
                            <div class = "col-sm-4 text-right">
                                <label class="control-label">Departement name</label>
                            </div>
                            <div class = "col-sm-7">
                                <input type="input" name="DepartementName" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class = "row">
                            <div class = "col-sm-4 text-right">
                                <label class="control-label">Select Collage</label>
                            </div>
                            <div class = "col-sm-7">
                                <select class="form-control" name="CollageName">
                                    <option value={{$collage->id}}>{{$collage->CollageName}}</option>
                                    {{-- @foreach ($collages as $collage)
                                    <option value={{$collage->id}}>{{$collage->CollageName}}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12">
                    <div class="row" style="margin-top:30px;">
                        <div class="col-sm-4 text-right"></div>
                        <div class="col-sm-7 text-left">
                            <button type="submit"  class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
    

</div>

@endsection