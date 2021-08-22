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
                    <div class ="col-sm-6 text-right"><a class="btn btn-secondary btn-sm" style="width:80px;color:white;">Create</a></div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Collage Name</th>
                        <th scope="col">Program Type</th>
                        <th scope="col">Program Level</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Collage of Bussiness and Economics</td>
                        <td>Regular</td>
                        <td>Masters</td>
                        <td><a href="#" class="btn btn-success btn-sm" style="width:60px;">Edit</a><a style="margin-left:10px;" class="btn btn-danger btn-sm"href="#">Delete</a></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Collage of Environmental and Agricultural Science</td>
                        <td>Summer</td>
                        <td>Undergraduate Program</td>
                        <td><a href="#" class="btn btn-success btn-sm" style="width:60px;">Edit</a><a style="margin-left:10px;" class="btn btn-danger btn-sm"href="#">Delete</a></td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

</div>

@endsection