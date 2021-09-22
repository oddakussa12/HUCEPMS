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
                    <div class="col-sm-6">
                        <h5>First Name</h5>
                        <h5>Middle Name</h5>
                        <h5>Last Name</h5>
                        <h5>Email Address</h5>
                        <h5>Gender</h5>
                        <h5>Collage</h5>
                        <h5>Departement</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
