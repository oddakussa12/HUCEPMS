@extends('layouts.app')

@section('content')

<div class="home">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-gray-700 uppercase font-bold">Courses</h4>
        </div>
    </div>
    <div class="container-fluid" style="padding:0px;">
        <div class="card">
            <div class="card-header">
                <h4>My Courses</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Code</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Credit hrs.</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $row = 0; ?>
                      @foreach ($student->departement->subjects as $subject )
                      <?php $row++; ?>
                        <tr>
                          <th scope="row">{{$row}}</th>
                          <td>{{$subject->subject_code}}</td>
                          <td>{{$subject->name}}</td>
                          <td>{{$subject->credit_hr}}</td>
                          <td><a href="/course_details/{{$subject->id}}">View</a></td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
