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
                      <tr>
                        <th scope="col">Test one (15%)</th>
                        <th scope="col">Test two (15%)</th>
                        <th scope="col">Assignment (20%)</th>
                        <th scope="col">Final Exam (50%)</th>
                        <th scope="col">Total (100%)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>12</td>
                        <td>14</td>
                        <td>18</td>
                        <td>42</td>
                        <td>86</td>
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
