@extends('layouts.app')

@section('content')

<div class="home">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-gray-700 uppercase font-bold">Registar of  {{$collage->CollageName}}</h4>
        </div>
    </div>
    <div class="container-fluid" style="padding:0px;">
        <div class = "row" >
            @foreach ($collage->departements as $departement )
                <div class = "col-sm-6">
                    <div class="card bg-light mb-3" style="max-width: 100%;">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="/viewDepartement/{{$departement->id}}" style="text-decoration:none;">
                                    <span class="badge badge-secondary">{{$departement->name}}</span>
                                    </a>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a href="/calculateDepartementGPA/{{$departement->id}}" class="btn btn-secondary btn-sm">Generate GPA</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="/viewDepartement/{{$departement->id}}" style="text-decoration:none;">
                                <div class = "row">
                                    <div class="col-sm-6">
                                        <div class="card border-secondary mb-3" style="max-width: 100%">
                                            <div class="card-header"><span class="badge badge-secondary">Students</span></div>
                                            <div class="card-body text-secondary text-center">
                                            <h1 class="card-title">{{count($departement->students)}}</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card border-secondary mb-3" style="max-width: 100%">
                                            <div class="card-header"><span class="badge badge-secondary">Subjects</span></div>
                                            <div class="card-body text-secondary text-center ">
                                            <h1 class="card-title">{{count($departement->subjects)}}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
