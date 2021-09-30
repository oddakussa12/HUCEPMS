@extends('layouts.app')

@section('content')

<div class="home">
        <div class="row">
            <div class ="col-sm-10">
                <h4 class="text-gray-700 uppercase font-bold">Edit Departement
                     {{-- ( <span class="badge badge-info">{{$collage->programType->name}}</span> ,
                     <span class="badge badge-info">{{$collage->programLevel->name}}</span>) --}}
                </h4>
            </div>
            <div class="col-sm-2 text-right">
                <a href="/departements" style="width:80px;" class="btn btn-secondary btn-sm">Back</a>
            </div>
        </div>
    <div class="container-fluid" style="padding:0px;margin-top:70px;max-width:600px;">
        <form method="post" action="/edit_dept/{{$dept->id}}">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class = "row">
                            <div class = "col-sm-4 text-right">
                                <label class="control-label">Departement name</label>
                            </div>
                            <div class = "col-sm-7">
                                <input type="input" name="DepartementName" class="form-control" value="{{$dept->name}}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class = "row">
                            <div class = "col-sm-4 text-right">
                                <label class="control-label">Select Program</label>
                            </div>
                            <div class = "col-sm-7">
                                <select class="form-control" name="CollageName">
                                    <option value={{$collage->id}}>{{$collage->CollageName}}</option>
                                    @foreach ($collages as $collage)
                                    <option value={{$collage->id}}>{{$collage->CollageName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class = "row">
                            <div class = "col-sm-4 text-right">
                                <label class="control-label">Assign Departement Head</label>
                            </div>
                            <div class = "col-sm-7">
                                <select class="form-control" name="DepartementHead_id">
                                    <option selected disabled>Please select</option>
                                    @foreach ($headUsers as $head)
                                    <option value={{$head->id}}>{{$head->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-sm-12" style="margin-top:30px;">
                    <h6>Please assign subjects for this departement</h6>
                    <br />
                    @foreach ($subjects as $subject )
                        <div>
                            <label class="form-check-label">
                            <input type="checkbox" name="subjects[]"  class="form-check-input" value={{$subject->id}}
                                {{$dept->hasAnySubject($subject->name)?'checked':''}}>
                                {{$subject->name}} <br />
                                @foreach ($subject->teachers as $teacher)
                                    <div class="form-check-inline" style="margin-left:20px; margin-top:20px;">
                                        <label class="radio-inline">
                                            <input type="radio" name="teacher_id{{$subject->id}}" value={{$teacher->user->id}}>
                                            {{$teacher->user->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </label>
                        </div>
                    @endforeach
                </div> --}}

                
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