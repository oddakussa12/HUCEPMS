@include('/backend/modals/teacher/addResource')
<div class="container-fluid">
    @foreach ($teacher->subjects as $subject)
    <br />
        <div class="container card" style="padding:20px;">
            <div class="row">
                <div class="col-sm-8">
                    <h5 style="margin-left:20px;">{{$subject->name}}</h5>
                </div>
                <div class="col-sm-4 text-right">
                    <a href="#" id="add_resourceBut" class="btn btn-secondary btn-sm">Add Resouce</a>
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

{{-- script to add resource --}}
<script>
    // show modal
    $('#add_resourceBut').click(function(){
        $('#addResourceModal').modal('show');
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