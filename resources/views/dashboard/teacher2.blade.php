<div class="container-fluid">
    @foreach ($teacher->subjects as $subject)
    <br />
        <div class="container card" style="padding:20px;">
            <div class="row">
                <div class="col-sm-8">
                    <h5 style="margin-left:20px;">{{$subject->name}}</h5>
                </div>
                <div class="col-sm-4 text-right">
                    <a href="#" class="btn btn-secondary btn-sm">Add Resouce</a>
                </div>
            </div>
            <div class="container row">
                @foreach ($subject->departements as $departement)
                    <div class="col-sm-4 card text-center" style="height:80px;margin-top:10px;">
                        <a href="teacher_departement/{{$departement->id}}/{{$subject->id}}">
                            <h5 style="margin-top:10px;">{{$departement->name}}</h5>
                            <h5> ({{count($departement->students)}} Students) </h5>
                        </a>
                    </div>
                @endforeach 
            </div>
        </div>
    @endforeach
</div>