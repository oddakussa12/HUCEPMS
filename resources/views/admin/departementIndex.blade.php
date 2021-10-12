@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h4 class="text-gray-700 uppercase font-bold">Departements</h4>
    </div>
</div>
<div class="container-fluid" style="padding:0px;">
    @if ($collages->isEmpty())
        <div class="row">
            <div class="col-sm-12 text-center">
                <h5>To create departement, You have to create programs first.</h5>
            </div>
        </div>
    @endif
    @foreach($collages as $collage)
    <div class="card" style="margin-top:30px;">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10">
                    <h6>{{$collage->CollageName}}
                        {{-- ( <span class="badge badge-info">{{$collage->programType->name}}</span>, --}}
                        {{-- <span class="badge badge-info">{{$collage->programLevel->name}}</span>  ) --}}
                    </h6>
                </div>
                <div class="col-sm-2 text-right"><a class="btn btn-secondary btn-sm" href="create_departement/{{$collage->id}}">Add Departement</a></div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Departement Name</th>
                    <th scope="col">Courses in number</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $row = 0; ?>
                    @foreach ($collage->departements as $dept)
                    <?php $row++ ?>
                    <tr>
                        <th>{{$row}}</th>
                        <td>{{$dept->name}}</td>
                        <td>{{count($dept->subjects)}}</td>
                        <td>
                            <div class="row">
                                <div class="col-sm-6 text-right">
                                    <a href="edit_departement/{{$dept->id}}" class="btn btn-success btn-sm" style="width:60px;">Edit</a>
                                </div>
                                <div class="col-sm-6">
                                    <form action="/deleteDepartement/{{$dept->id}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button style="margin-left:10px;" class="btn btn-danger btn-sm"
                                        type="submit">Delete
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
</div>

@endsection