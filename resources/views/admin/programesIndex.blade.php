@extends('layouts.app')

@section('content')

@include('/backend/modals/admin/addProgramLevel')
@include('/backend/modals/admin/editProgramLevel')
@include('/backend/modals/admin/addProgramType')
@include('/backend/modals/admin/editProgramType')



<div class="home">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-gray-700 uppercase font-bold">Study Program Levels and Program Types</h4>
        </div>
    </div>
    <div class="container-fluid" style="padding:0px;">
        <div class="row">
            <div class = "col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6"><h5>Program Level</h5></div>
                            <div class="col-sm-6 text-right"><a href="#" id="addProgramLevelBut" class="btn btn-secondary btn-sm"
                                style="width:80px;">Create</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Program Level</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $row = 0 ?>
                              @foreach($pls as $pl)
                              <?php $row++; ?>
                                <tr>
                                  <th scope="row">{{$row}}</th>
                                  <td style="display: none;">{{$pl->id}}</td>
                                  <td>{{$pl->name}}</td>
                                  <td><a href="#" class="btn btn-success btn-sm editpl" style="width:60px;">Edit</a>
                                      <a style="margin-left:10px;" class="btn btn-danger btn-sm"href="#">Delete</a></td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class = "col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6"><h5>Program Type</h5></div>
                            <div class="col-sm-6 text-right"><a href="#" class="btn btn-secondary btn-sm"
                                id="addProgramTypeBut" style="width:80px;">Create</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Program Type</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $row = 0 ?>
                              @foreach($pts as $pt)
                              <?php $row++; ?>
                                <tr>
                                  <th scope="row">{{$row}}</th>
                                  <td style="display: none;">{{$pt->id}}</td>
                                  <td>{{$pt->name}}</td>
                                  <td><a href="#" class="btn btn-success btn-sm editpt" style="width:60px;">Edit</a>
                                      <a style="margin-left:10px;" class="btn btn-danger btn-sm"href="#">Delete</a></td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection

@section('script')
{{-- script to add program level --}}
<script>
  // show modal
  $('#addProgramLevelBut').click(function(){
      $('#addProgramLevelModal').modal('show');
  });
  // implementation submit button cliced from modal
  $('#add_program_level_form').on('submit', function(event){
      event.preventDefault();
      if($('#addPlButton').val() == 'Add Program Level'){
          $.ajax({
              url:"{{ route('addprogramlevel') }}",
              method:"POST",
              data: new FormData(this),
              contentType:false,
              cache:false,
              processData:false,
              dataType:'json',
              beforeSend: function()
              {   
                  $('#addPlButton').html('<i class="fa fa-circle-o-notch fa-spin"></i>');                            
              },
              success:function(data){
                  var html = '';
                  if(data.errors){
                      html = '<div class="alert alert-danger alert-block">';
                      for(var count = 0; count<data.errors.length; count++){
                          html += '<p>' + data.errors[count] + '</p>';
                      }
                      html += '</div>';
                      $('#addPlButton').html('Submit');
                  }
                  if(data.success){
                      html = '<div class = "alert alert-success alert-block">'
                      + data.success + '<button type="button" class="close" data-dismiss="alert">x</button</div>';
                      // empty form field values  
                      $('#add_program_level_form')[0].reset();
                      $('#addPlButton').html('Submit');

                  }
                  // render error or success message in html variable to span element with id value form_result
                  $('#form_result_add_program_level').html(html);
              }
          })
      }
  });
</script>
{{-- script to edit program level --}}
<script>
      //
      $('.editpl').click(function(e){
        e.preventDefault();
        $('#editProgramLevelModal').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        // console.log(data);

        $('#progLevelid').val(data[0]);
        $('#editprogramlevel').val(data[1]);
    });
    // implementation when edit brand button is clicked from addBrandModal
    $('#edit_pl_form').on('submit', function(event){
        event.preventDefault();
        if($('#updatePlButton').val() == 'Edit Program Level'){
            $.ajax({
                url:"{{ route('editProgramLevel') }}",
                method:"POST",
                data: new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                dataType:'json',
                beforeSend: function()
                {   
                    $('#updatePlButton').html('<i class="fa fa-circle-o-notch fa-spin"></i>');                            
                },
                success:function(data){
                    var html = '';
                    if(data.errors){
                        html = '<div class="alert alert-danger alert-block">';
                        for(var count = 0; count<data.errors.length; count++){
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                        $('#updatePlButton').html('Submit');
                    }
                    if(data.success){
                        html = '<div class = "alert alert-success alert-block">'
                        + data.success + '<button type="button" class="close" data-dismiss="alert">x</button</div>';
                        // empty form field values  
                        $('#edit_pl_form')[0].reset();
                        $('#updatePlButton').html('Submit');

                    }
                    // render error or success message in html variable to span element with id value form_result
                    $('#form_result_edit_program_level').html(html);
                }
            })
        }
    });
</script>
{{-- script to add program type --}}
<script>
  // show modal
  $('#addProgramTypeBut').click(function(){
      $('#addProgramTypeModal').modal('show');
  });
  // implementation submit button cliced from modal
  $('#add_program_type_form').on('submit', function(event){
      event.preventDefault();
      if($('#addPTButton').val() == 'Add Program Type'){
          $.ajax({
              url:"{{ route('addprogramtype') }}",
              method:"POST",
              data: new FormData(this),
              contentType:false,
              cache:false,
              processData:false,
              dataType:'json',
              beforeSend: function()
              {   
                  $('#addPTButton').html('<i class="fa fa-circle-o-notch fa-spin"></i>');                            
              },
              success:function(data){
                  var html = '';
                  if(data.errors){
                      html = '<div class="alert alert-danger alert-block">';
                      for(var count = 0; count<data.errors.length; count++){
                          html += '<p>' + data.errors[count] + '</p>';
                      }
                      html += '</div>';
                      $('#addPTButton').html('Submit');
                  }
                  if(data.success){
                      html = '<div class = "alert alert-success alert-block">'
                      + data.success + '<button type="button" class="close" data-dismiss="alert">x</button</div>';
                      // empty form field values  
                      $('#add_program_type_form')[0].reset();
                      $('#addPTButton').html('Submit');

                  }
                  // render error or success message in html variable to span element with id value form_result
                  $('#form_result_add_program_type').html(html);
              }
          })
      }
  });
</script>

{{-- script to edit program type --}}
<script>
  //
  $('.editpt').click(function(e){
    e.preventDefault();
    $('#editProgramTypeModal').modal('show');

    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
        return $(this).text();
    }).get();
    // console.log(data);

    $('#progTypeid').val(data[0]);
    $('#editprogramtype').val(data[1]);
});
// implementation when edit brand button is clicked from addBrandModal
$('#edit_pt_form').on('submit', function(event){
    event.preventDefault();
    if($('#updatePTButton').val() == 'Edit Program Type'){
        $.ajax({
            url:"{{ route('editProgramType') }}",
            method:"POST",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            dataType:'json',
            beforeSend: function()
            {   
                $('#updatePTButton').html('<i class="fa fa-circle-o-notch fa-spin"></i>');                            
            },
            success:function(data){
                var html = '';
                if(data.errors){
                    html = '<div class="alert alert-danger alert-block">';
                    for(var count = 0; count<data.errors.length; count++){
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#updatePTButton').html('Submit');
                }
                if(data.success){
                    html = '<div class = "alert alert-success alert-block">'
                    + data.success + '<button type="button" class="close" data-dismiss="alert">x</button</div>';
                    // empty form field values  
                    $('#edit_pt_form')[0].reset();
                    $('#updatePTButton').html('Submit');

                }
                // render error or success message in html variable to span element with id value form_result
                $('#form_result_edit_program_type').html(html);
            }
        })
    }
});
</script>
@endsection