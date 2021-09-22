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
                <h6>Applicants</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                      <tr scope="row">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Collage</th>
                        <th>Departement</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($applicants as $applicant)
                        @php
                            $count++;
                        @endphp
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$applicant->first_name}}</td>
                                <td>{{$applicant->middle_name}}</td>
                                <td>{{$applicant->email}}</td>
                                <td>{{$applicant->phone_number}}</td>
                                <td>{{$applicant->gender}}</td>
                                <td>{{$applicant->collage->CollageName}}</td>
                                <td>{{$applicant->departement->name}}</td>
                                <td><a href="showApplicant/{{$applicant->id}}" class="btn btn-success btn-sm">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
