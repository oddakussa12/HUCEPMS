@extends('layouts.app')

@section('content')

<div class="home">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-gray-700 uppercase font-bold">Collages</h4>
        </div>
    </div>
    <div class="container-fluid" style="padding:0px;">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class = "col-sm-6"><h5>Collages</h5></div>
                    <div class ="col-sm-6 text-right">
                      <a href="/create_collage" class="btn btn-secondary btn-sm" style="width:80px;">Create</a></div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Collage Name</th>
                        {{-- <th scope="col">Program Type</th>
                        <th scope="col">Program Level</th> --}}
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $row = 0 ?>
                      @foreach ($collages as $collage)
                      <?php $row++; ?>
                      <tr>
                        <th>{{$row}}</th>
                        <td>{{$collage->CollageName}}</td>
                        {{-- <td>{{$collage->programType->name}}</td>
                        <td>{{$collage->programLevel->name}}</td> --}}
                        <td><a href="/collage/edit/{{$collage->id}}" class="btn btn-success btn-sm" style="width:60px;">Edit</a><a style="margin-left:10px;" class="btn btn-danger btn-sm"href="#">Delete</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

</div>

@endsection