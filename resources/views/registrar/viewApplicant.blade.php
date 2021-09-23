@extends('layouts.app')

@section('content')

<div class="home">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-gray-700 uppercase font-bold">Registar of  {{$collage->CollageName}}</h4>
        </div>
    </div>
    <div class="container-fluid" style="padding:0px;">
        <div class="card">
            <div class="card-header">
                <h4>Applicant Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <h5>First Name</h5>
                        <h5>Middle Name</h5>
                        <h5>Last Name</h5>
                        <h5>Email Address</h5>
                        <h5>Gender</h5>
                        <h5>Collage</h5>
                        <h5>Departement</h5>
                    </div>
                    <div class="col-sm-4">
                        <h5>{{$applicant->first_name}}</h5>
                        <h5>{{$applicant->middle_name}}</h5>
                        <h5>{{$applicant->last_name}}</h5>
                        <h5>{{$applicant->email}}</h5>
                        <h5>{{$applicant->gender}}</h5>
                        <h5>{{$applicant->collage->CollageName}}</h5>
                        <h5>{{$applicant->departement->name}}</h5>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12" style="margin-top:30%;">
                                
                                <a href="/downloadApplicationLetter/{{$applicant->resume}}">Download application letter</a>
                            </div>
                        </div>
                        <div class="row" style="margin-top:5%;">
                            
                            <div class="col-sm-6 text-left">
                                <a href="/declineApplicant/{{$applicant->id}}" class="btn btn-danger btn-sm" style="width:45%;">Decline</a>
                                <a href="/approveApplicant/{{$applicant->id}}" class="btn btn-success btn-sm" style="width:45%;">Approve</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
