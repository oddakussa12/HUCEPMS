@extends('layouts.app')

@section('content')

<div class="home">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-gray-700 uppercase font-bold">Departement of {{$departement->name}}</h4>
        </div>
    </div>
    <div class="container-fluid" style="padding:0px;">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Courses</h4>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="/addCourse" class = "btn btn-primary btn-sm">Add course</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                      <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Course Code</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Teacher</th>
                        <th scope="col">Credit hrs.</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($subjects as $subject )
                            <tr class="text-center">
                                <td>{{$count}}</td>
                                <td>{{$subject->subject_code}}</td>
                                <td>{{$subject->name}}</td>
                                @foreach ($departement->deptSubjectTeacher($subject->id,$departement->id) as $as )
                                <td>{{$as->name}}</td>
                                @endforeach
                                
                                <td>{{$subject->credit_hr}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-6 text-right">
                                            <a href="/editSubjectInDepart/{{$subject->id}}" class="btn btn-success btn-sm">Edit</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <form action="deleteCourse" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <input type="hidden" name="subjectId" value={{$subject->id}} />
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $count++;
                            @endphp
                        @endforeach
                     <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card" style="margin-top:30px;">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Students</h4>
                    </div>
                    {{-- <div class="col-sm-6 text-right">
                        <a href="#" class = "btn btn-primary btn-sm">Create Student</a>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                      <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Student name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Phone number</th>
                        <th scope="col">Email Address</th>
                        <th>GPA</th>
                        {{-- <th scope="col">Actions</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($Students as $student )
                            <tr class="text-center">
                                <td>{{$count}}</td>
                                <td>{{$student->user->name}}</td>
                                <td>{{$student->gender}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->user->email}}</td>
                                @if ($student->gpa != null)
                                    <td>
                                        <span class="badge badge-info">{{$student->gpa->GPA}}</span>
                                    </td>
                                    @else
                                    <td>NULL</td>
                                @endif
                                {{-- <td><button class="btn btn-success btn-sm">Edit</button></td> --}}
                            </tr>
                            @php
                                $count++;
                            @endphp
                        @endforeach
                     <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
