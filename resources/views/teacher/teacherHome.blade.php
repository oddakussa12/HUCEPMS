@extends('layouts.app')

@section('content')
@include('/backend/modals/teacher/addResource')
@include('/backend/modals/teacher/createAssesement')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h4>DASHBOARD</h4>
            </div>
        </div>
        @foreach ($teacher->subjects as $subject)
        <br />
            <div class="container card" style="padding:20px;">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>{{$subject->name}}</h5>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="#" data-subjectid={{$subject->id}} class="btn btn-success btn-sm addresourcebut">Add Resouce</a>
                        <a href="#" data-subjectid={{$subject->id}} class="btn btn-warning btn-sm createassesement">Create Assesement</a>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        @foreach ($subject->departements as $departement)
                            <div class="col-sm-4 text-center" style="min-height:80px;margin-top:20px;">
                                <div class="card" style="background-color:rgb(59, 134, 204);">
                                    <a style="color:white;" href="teacher_departement/{{$departement->id}}/{{$subject->id}}">
                                        <h5 style="margin-top:10px;">{{$departement->name}}</h5>
                                        <h6> ({{count($departement->students)}} Students) </h6>
                                    </a>
                                </div>
                            </div>
                        @endforeach 
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection


@section('script')
{{-- script to add resource --}}
<script>
    // show modal
    $('.addresourcebut').click(function(){
        $('#addResourceModal').modal('show');
        // get the subject id
        var subid = $(this).data("subjectid");
        // set the value of subject id to the hidden filed in add resource modals
        $('#hiddenSubId').val(subid);
    });
    // implementation submit button cliced from modal
    $('#add_resource_form').on('submit', function(event){
        event.preventDefault();
        if($('#addResourceButton').val() == 'Add Resource'){
            $.ajax({
                url:"{{ route('addresource') }}",
                method:"POST",
                data: new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                dataType:'json',
                beforeSend: function()
                {   
                    $('#addResourceButton').html('<i class="fa fa-circle-o-notch fa-spin"></i>');                            
                },
                success:function(data){
                    var html = '';
                    if(data.errors){
                        html = '<div class="alert alert-danger alert-block">';
                        for(var count = 0; count<data.errors.length; count++){
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                        $('#addResourceButton').html('Submit');
                    }
                    if(data.success){
                        html = '<div class = "alert alert-success alert-block">'
                        + data.success + '<button type="button" class="close" data-dismiss="alert">x</button</div>';
                        // empty form field values  
                        $('#add_resource_form')[0].reset();
                        $('#addResourceButton').html('Submit');
  
                    }
                    // render error or success message in html variable to span element with id value form_result
                    $('#form_result_add_resource').html(html);
                }
            })
        }
    });
</script>

{{-- script to create Assesement --}}
<script>
    // show modal
    $('.createassesement').click(function(){
        $('#createAssesementModal').modal('show');
        // get the subject id
        var subid = $(this).data("subjectid");
        // set the value of subject id to the hidden filed in add resource modals
        $('#hiddennSubId').val(subid);
    });
    // implementation submit button cliced from modal
    $('#create_assesement_form').on('submit', function(event){
        event.preventDefault();
        if($('#createAssesementButton').val() == 'Create Assesement'){
            $.ajax({
                url:"{{ route('createassesement') }}",
                method:"POST",
                data: new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                dataType:'json',
                beforeSend: function()
                {   
                    $('#createAssesementButton').html('<i class="fa fa-circle-o-notch fa-spin"></i>');                            
                },
                success:function(data){
                    var html = '';
                    if(data.errors){
                        html = '<div class="alert alert-danger alert-block">';
                        for(var count = 0; count<data.errors.length; count++){
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                        $('#createAssesementButton').html('Submit');
                    }
                    if(data.success){
                        html = '<div class = "alert alert-success alert-block">'
                        + data.success + '<button type="button" class="close" data-dismiss="alert">x</button</div>';
                        // empty form field values  
                        $('#create_assesement_form')[0].reset();
                        $('#createAssesementButton').html('Submit');
  
                    }
                    // render error or success message in html variable to span element with id value form_result
                    $('#form_result_create_assesement').html(html);
                }
            })
        }
    });
</script>

@endsection