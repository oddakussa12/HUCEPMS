@extends('layouts.app')

@section('content')

<div class="home">
    <div class="row">
        <div class="col-sm-8">
            <h6 class="text-gray-700 uppercase font-bold">{{$subject->name}}</h6>
        </div>
        <div class="col-sm-4 text-right">
            <a href="/student_courses" class="btn btn-secondary btn-sm" style="width:80px;">Back</a>
        </div>
    </div>
        
    <div class="container-fluid" style="padding:0px;margin-top:30px;">
        <div class="card">
            <div class="card-header">
                <h6>Assesement Result</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                      <tr class="text-center">
                        <th scope="col">Test one</th>
                        <th scope="col">Test two</th>
                        <th scope="col">Assignment one</th>
                        <th scope="col">Assignment two</th>
                        <th scope="col">Final Exam</th>
                        <th scope="col">Total (100%)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        @isset($assesement)
                        <td><span class="badge badge-success">{{$assesement->testOne}}</span></td>
                        <td><span class="badge badge-success">14</span></td>
                        <td><span class="badge badge-success">18</span></td>
                        <td><span class="badge badge-success">14</span></td>
                        <td><span class="badge badge-success">42</span></td>
                        <td><span class="badge badge-success">86</span></td>
                        @endisset
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card" style="margin-top:50px;">
            <div class="card-header">
                <h6>Course Materials</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Document Name</th>
                        <th scope="col">File</th>
                        <th scope="col">Uploaded Date</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $row = 0 ; ?>
                      @foreach ($resources as $resource )
                      <?php $row++ ; ?>
                        <tr>
                          <th scope="row">{{$row}}</th>
                          <td>{{$resource->name}}</td>
                          <td>{{$resource->filename}}</td>
                          <td>{{$resource->created_at}}</td>
                          <td><a href="/get/{{$resource->filename}}/{{$resource->name}}" class="btn btn-success btn-sm">Download</a></td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    

</div>

@endsection
