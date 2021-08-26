
<div class="modal fade" id="insertExamResultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="border-radius:0px;height:630px;">
        <div class="modal-header" style="width:100%;border-radius:0px; background-color:rgb(98, 177, 241);margin-left:-1px;">
          <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Insert Exam Result</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: white;" >&times;</span>
          </button>
        </div>
        <form method="POST" id="insert_exam_result_form">
          @csrf
          <div class="modal-body" style="overflow: auto;height:500px;">
              {{-- below span hold form validation messages --}}
              <span id="form_result_insert_result"></span>
              <input type="hidden" name="subjectid" value={{$subject->id}} />
              {{-- <div > --}}
                @foreach ($students as $student )
                    <div class="form-group">
                        <div class = "row">
                            <div class="col-sm-6">
                                <label>{{$student->user->name}}</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="hidden" name="stud_id[]" value={{$student->id}} />
                                <input type="text" class="form-control" name="ExamResult[]" id="ExamResult">
                            </div>
                        </div>
                    </div>
                @endforeach
              {{-- </div> --}}
          </div>
          <div class="modal-footer">
            <button data-dismiss="modal"class="btn btn-outline-danger btn-sm" style="width:80px;" >Close</button>
            <button type="submit" id="InsertResult" class="btn btn-primary btn-sm" style="width:80px;"  value="Insert Result">
                      Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>