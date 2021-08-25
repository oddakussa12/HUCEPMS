@extends('layouts.app')

@section('content')
<div class="home">
    <div class="row">
        <div class="col-sm-8">
            <h4 class="text-gray-700 uppercase font-bold">{{$departement->name}}</h4>
        </div>
        <div class="col-sm-4 text-right">
            <a href="/home" class="btn btn-secondary btn-sm" style="width:80px;">Back</a>
        </div>
    </div>
    <div class="container-fluid" style="padding:0px;margin-top:30px;">
        <div class="card">
            <div class="card-header">
                <h6>Course Materials</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Resouce Name</th>
                        <th scope="col">Resouce</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $row = 0; ?>
                        @foreach ($resources as $resouce )
                        <?php $row++; ?>
                        <tr>
                            <td>{{$row}}</td>
                            <td>{{$resouce->name}}</td>
                            <td>{{$resouce->filename}}</td>
                            <td>edit, delete, update</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card" style="margin-top:30px;">
            <div class="card-header">
                <h6>Students</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Test One</th>
                        <th scope="col">Test Two</th>
                        <th scope="col">Assignment One</th>
                        <th scope="col">Assignment Two</th>
                        <th scope="col">Final Exam</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student )
                            <tr>
                                <td>1</td>
                                <td>{{$student->user->name}}</td>
                                <td scope="col">0</td>
                                <td scope="col">0</td>
                                <td scope="col">0</td>
                                <td scope="col">0</td>
                                <td scope="col">0</td>
                                <td>edit,Delete</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection