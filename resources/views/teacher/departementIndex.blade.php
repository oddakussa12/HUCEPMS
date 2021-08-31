@extends('layouts.app')

@section('content')
@include('/backend/modals/teacher/editResource')
@include('/backend/modals/teacher/insertExamResult')
@include('/backend/modals/teacher/updateExamResult')

<div class="home">
    <div class="row">
        <div class="col-sm-8">
            <h4 class="text-gray-700 uppercase">Departement of {{$departement->name}}</h4>
        </div>
        <div class="col-sm-4 text-right">
            <a href="/home" class="btn btn-secondary btn-sm" style="width:80px;">Back</a>
        </div>
    </div>
    <div class="container-fluid" style="padding:0px;margin-top:30px;">
        <div class="card">
            <div class="card-header">
                <h6><span class="badge badge-warning">{{$subject->name}}</span> - Course Materials</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Resouce Name</th>
                        <th scope="col">Resouce</th>
                        <th>File Size</th>
                        <th>Uploaded On</th>
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
                            <td>102KB</td>
                            <td>{{$resouce->updated_at}}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm editresourcebut" data-resoid={{$resouce->id}} >Update</a>
                                <a href="/get/{{$resouce->filename}}/{{$resouce->name}}" class="btn btn-success btn-sm">Dwonload</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class = "card" style="margin-top:30px;">
            <div class="card-header">
                <h6>Students</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            @foreach ($subject->exams as $exam )
                                <th>{{$exam->name}} <br />
                                    <a href="#" class="btn btn-success btn-sm insertBut" data-examid={{$exam->id}}
                                        style="margin-top:10px;" >Record
                                    </a>
                                    <a href="#" class="btn btn-success btn-sm updateBut" data-updateexamid={{$exam->id}}
                                        style="margin-top:10px;" >Update</a>
                                    </a>
                                </th>
                            @endforeach
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student )
                            <tr>
                                <td>{{$student->user->name}}</td>
                                <?php $total = 0; ?>
                                @foreach ($student->exams->where('subject_id',$subject->id) as $subjectExam )
                                    <td>{{$subjectExam->pivot->mark}}</td>
                                    <?php $total = $total + $subjectExam->pivot->mark; ?>
                                @endforeach
                                <td>{{$total}}</td>
                                <td><a href="#" class="btn btn-primary btn-sm" >Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
{{-- script to edit resource --}}
<script>
    // show modal
    $('.editresourcebut').click(function(){
        $('#editResourceModal').modal('show');
        // get resource id
        var resourceId = $(this).data("resoid");
        // set the value of resource id to the hidden filed in edit resource modals
        $('#resourceid').val(resourceId);

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#ResourceName').val(data[1]);
        $('#File').val(data[2]);
    });
    // implementation submit button cliced from modal
    $('#edit_resource_form').on('submit', function(event){
        event.preventDefault();
        if($('#editResourceButton').val() == 'Edit Resource'){
            $.ajax({
                url:"{{ route('update_resource') }}",
                method:"POST",
                data: new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                dataType:'json',
                beforeSend: function()
                {   
                    $('#editResourceButton').html('<i class="fa fa-circle-o-notch fa-spin"></i>');                            
                },
                success:function(data){
                    var html = '';
                    if(data.errors){
                        html = '<div class="alert alert-danger alert-block">';
                        for(var count = 0; count<data.errors.length; count++){
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                        $('#editResourceButton').html('Update');
                    }
                    if(data.success){
                        html = '<div class = "alert alert-success alert-block">'
                        + data.success + '<button type="button" class="close" data-dismiss="alert">x</button</div>';
                        // empty form field values  
                        $('#edit_resource_form')[0].reset();
                        $('#editResourceButton').html('Update');
  
                    }
                    // render error or success message in html variable to span element with id value form_result
                    $('#form_result_edit_resource').html(html);
                }
            })
        }
    });
</script>
{{-- script to insert exam result --}}
<script>
    // show modal
    $('.insertBut').click(function(){
        $('#insertExamResultModal').modal('show');
        // set the exam id
        var examId = $(this).data("examid");
        $('#hidenExamId').val(examId);
    });
    // implementation submit button cliced from modal
    $('#insert_exam_result_form').on('submit', function(event){
        event.preventDefault();
        if($('#InsertResult').val() == 'Insert Result'){
            $.ajax({
                url:"{{ route('insert_result') }}",
                method:"POST",
                data: new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                dataType:'json',
                beforeSend: function()
                {   
                    $('#InsertResult').html('<i class="fa fa-circle-o-notch fa-spin"></i>');                            
                },
                success:function(data){
                    var html = '';
                    if(data.errors){
                        html = '<div class="alert alert-danger alert-block">';
                        for(var count = 0; count<data.errors.length; count++){
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                        $('#InsertResult').html('Submit');
                    }
                    if(data.success){
                        html = '<div class = "alert alert-success alert-block">'
                        + data.success + '<button type="button" class="close" data-dismiss="alert">x</button</div>';
                        // empty form field values  
                        $('#insert_exam_result_form')[0].reset();
                        $('#InsertResult').html('Submit');
  
                    }
                    // render error or success message in html variable to span element with id value form_result
                    $('#form_result_insert_result').html(html);
                }
            })
        }
    });
</script>

{{-- script to update exam result --}}
<script>
    // show modal
    $('.updateBut').click(function(){
        $('#updateExamResultModal').modal('show');
        // set the exam id
        var updateexamId = $(this).data("updateexamid");
        $('#updatehidenExamId').val(updateexamId);
    });
    // implementation submit button cliced from modal
    $('#update_exam_result_form').on('submit', function(event){
        event.preventDefault();
        if($('#UpdateResult').val() == 'Update Result'){
            $.ajax({
                url:"{{ route('update_result') }}",
                method:"POST",
                data: new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                dataType:'json',
                beforeSend: function()
                {   
                    $('#UpdateResult').html('<i class="fa fa-circle-o-notch fa-spin"></i>');                            
                },
                success:function(data){
                    var html = '';
                    if(data.errors){
                        html = '<div class="alert alert-danger alert-block">';
                        for(var count = 0; count<data.errors.length; count++){
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                        $('#UpdateResult').html('Submit');
                    }
                    if(data.success){
                        html = '<div class = "alert alert-success alert-block">'
                        + data.success + '<button type="button" class="close" data-dismiss="alert">x</button</div>';
                        // empty form field values  
                        $('#update_exam_result_form')[0].reset();
                        $('#UpdateResult').html('Submit');
  
                    }
                    // render error or success message in html variable to span element with id value form_result
                    $('#form_result_update_result').html(html);
                }
            })
        }
    });
</script>
@endsection