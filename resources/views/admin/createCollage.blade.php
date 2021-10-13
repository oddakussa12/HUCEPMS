@extends('layouts.app')

@section('content')

<div class="home">
    @if ($registarUsers != null)
        <div class="row">
            <div class ="col-sm-6">
                <h4 class="text-gray-700 uppercase font-bold">Create study program</h4>
            </div>
            <div class="col-sm-6 text-right">
                <a href="/collages" style="width:80px;" class="btn btn-secondary btn-sm">Back</a>
            </div>
        </div>
       
        <div class="container-fluid" style="padding:0px;margin-top:70px;max-width:600px;">
            <form method="post" action="/create_collage">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class = "row">
                                <div class = "col-sm-4 text-right">
                                    <label class="control-label">Program name</label>
                                </div>
                                <div class = "col-sm-7">
                                    <input type="input" name="CollageName" class="form-control" placeholder="Program name..." />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class = "row">
                                <div class = "col-sm-4 text-right">
                                    <label class="control-label">Assign Registrar</label>
                                </div>
                                <div class = "col-sm-7">
                                    <select class="form-control" name="registrar_id">
                                        <option>-- Please select --</option>
                                        @if ($registarUsers != null)
                                            @foreach ($registarUsers as $registarUser)
                                                <option value={{$registarUser->id}}>{{$registarUser->name}}</option>
                                            @endforeach
                                            @else
                                            <option disabled >Please create registrar user account first</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-sm-12">
                        <div class="form-group">
                            <div class = "row">
                                <div class = "col-sm-4 text-right">
                                    <label class="control-label">Choose program Type</label>
                                </div>
                                <div class = "col-sm-7">
                                    <select class="form-control" name="ProgramType">
                                        <option>-- Please select --</option>
                                        @foreach ($pts as $pt)
                                        <option value={{$pt->id}}>{{$pt->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-sm-12">
                        <div class="form-group">
                            <div class = "row">
                                <div class = "col-sm-4 text-right">
                                    <label class="control-label">Choose program Level</label>
                                </div>
                                <div class = "col-sm-7">
                                    <select class="form-control" name="ProgramLevel">
                                        <option>-- Please select --</option>
                                        @foreach ($pls as $pl)
                                        <option value={{$pl->id}}>{{$pl->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
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
            @else
            <div class="row">
                <div class ="col-sm-12 text-center" style="margin-top:50px;">
                    <h5 style="color:red">No registrar user found. Please create registrar user first</h5>
                </div>
            </div>
        @endif
  
    

</div>

@endsection