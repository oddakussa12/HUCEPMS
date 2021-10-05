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
                <h6>Student Receipts</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                      <tr scope="row">
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Collage</th>
                        <th>Receipt</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($recipets as $recipet)
                        @php
                            $count++;
                        @endphp
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$recipet->user->name}}</td>
                                <td>{{$recipet->user->email}}</td>
                                <td>{{$collage->CollageName}}</td>
                                <td>{{$recipet->file_name}}</td>
                                <td>
                                    <a href="downloadReceipt/{{$recipet->file_name}}" class="btn btn-primary btn-sm">Download</a>
                                    <a href="approveReceipt/{{$recipet->id}}" class="btn btn-success btn-sm">Approve</a>
                                    <a href="rejectReceipt/{{$recipet->id}}" class="btn btn-danger btn-sm">Reject</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
