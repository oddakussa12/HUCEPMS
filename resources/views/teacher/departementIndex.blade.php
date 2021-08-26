@extends('layouts.app')

@section('content')
@include('/backend/modals/teacher/editResource')
@include('/backend/modals/teacher/insertExamResult')

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
                        <th scope="col">Total</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Action</th>
                    </tr>
                    <tr>
                        <th colspan="2" ></th>
                        <th><a href="#" class="btn btn-success btn-sm insertBut">Insert</a></th>
                        <th>Insert</th>
                        <th>Insert</th>
                        <th>Insert</th>
                        <th>Insert</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student )
                            <tr>
                                <td>1</td>
                                <td>{{$student->user->name}}</td>
                                <td scope="col"></td>
                                <td scope="col">0</td>
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
@endsection