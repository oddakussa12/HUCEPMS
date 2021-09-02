
<div class="modal fade" id="updateExamResultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="border-radius:0px;height:630px;">
        <div class="modal-header" style="width:100%;border-radius:0px; background-color:rgb(98, 177, 241);margin-left:-1px;">
          <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Update Exam Result</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: white;" >&times;</span>
          </button>
        </div>
        <form method="POST" id="update_exam_result_form">
          @csrf
          <div class="modal-body" style="overflow: auto;height:500px;">
              {{-- below span hold form validation messages --}}
              <span id="form_result_update_result"></span>
              <input type="hidden" name="examId" id="updatehidenExamId" value='' />
    
                @foreach ($students as $student )
                    <div class="form-group">
                        <div class = "row text-right">
                            <div class="col-sm-6">
                                <label>{{$student->user->name}}</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="hidden" name="stud_id[]" value={{$student->id}} />
                                @foreach ($student->exams->where('subject_id',$subject->id) as $subjectExam)
                                    {{-- belows $subject->id should be $exam->id --}}
                                    @if ($subjectExam->id == $subject->id )
                                        <input type="number" style="width:80px;" class="form-control input-sm"
                                        value={{$subjectExam->pivot->mark}} name="ExamResult[]" id="ExamResult">
                                        @else
                                        <?php continue; ?>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
          </div>
          <div class="modal-footer">
            <button data-dismiss="modal"class="btn btn-outline-danger btn-sm" style="width:80px;" >Close</button>
            <button type="submit" id="UpdateResult" class="btn btn-primary btn-sm" style="width:80px;"  value="Update Result">
                      Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>