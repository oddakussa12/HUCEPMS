@extends('layouts.app')

@section('content')

<div class="home">
    @if ($gpa != null)
    <div class="row">
        <div class="col-sm-8">
            <h6 class="text-gray-700 uppercase font-bold">Grade report</h6>
        </div>
        <div class="col-sm-4 text-right">
            <a href="/student_courses" class="btn btn-secondary btn-sm" style="width:80px;">Back</a>
        </div>
    </div>
    @endif
    
        
    <div class="container-fluid" style="padding:0px;margin-top:30px;">
        @if ($gpa != null)
        <div class="card">
            <div class="card-header">
                <h6>Grade Report</h6>
            </div>
            <div class="card-body">
                <div class="text-right">
                    <p class = "text-success" style="text-decoration:underline;">Departement Name: <b>{{$departement->name}}</b></p>
                    <p class = "text-success" style="text-decoration:underline;">Student Name: <b>{{$student->user->name}}</b></p>
                </div>
                <table class="table table-hover">
                    <thead>
                      <tr scope="row">
                        <th scope="col">Subject Name</th>
                        <th scope="col" class="text-center">Credit Hour</th>
                        <th scope="col" class="text-center">Grade Result</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php 
                            $counte = 0;
                        // dd(sizeof($subjectGrades));
                        @endphp
                        @foreach ($subjects as $subject )
                          <tr scope="row">
                            <td scope="col">{{$subject->name}}</td>
                            <td scope="col" class="text-center">
                                <span class="badge badge-info">{{$subject->credit_hr}}</span>
                            </td>
                            @for($i = 0 ; $i < count($subjectGrades) ; $i++)
                                <td class="text-center">
                                    <span class="badge badge-info">{{$subjectGrades[$counte][0]->grade}}</span>
                                </td>
                                @break
                            @endfor
                            @php 
                                $counte = $counte +1;
                            @endphp
                          </tr>
                        @endforeach
                        <tr class="text-center">
                            <td></td>
                            <td colspan="1" class="text-success"><b>Comulative GPA</b></td>
                            <td colspan="1"><span class="badge badge-success"
                                 style="font-size:18px;width:50px;">{{$gpa->GPA}}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3 style="color:red;">Grade report is not released yet.</h3>
            </div>
        </div>
        @endif
        
    </div>
</div>

@endsection
