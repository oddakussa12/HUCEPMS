@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class = "row">
        <div class="col-sm-6">
            <h4>Grade report</h4>
        </div>
        <div class = "col-sm-6 text-right">
            <a class="btn btn-secondary btn-sm" style="width:80px;"
             href="/teacher_departement/{{$departement->id}}/{{$subject->id}}">Back</a>
        </div>
    </div>    
    <div class="card" style="margin-top:30px;max-width:500px;left:20%;">
        <div class="card-header">
            <h5>{{$departement->name}} / {{$subject->name}}</h5>
        </div>
        <div class = "card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Grade Result</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student )
                        <?php $counter = 0; ?>
                        <tr>
                            <td>{{$student->user->name}}</td>
                            @foreach($grades as $grade)
                                <td>{{$grade[$counter]->grade}}</td>
                                <?php break; ?>
                            @endforeach
                        </tr>
                        <?php $counter++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@section('script')

@endsection