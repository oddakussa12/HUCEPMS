
<div class="modal fade" id="addProgramTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="border-radius:0px;">
        <div class="modal-header" style="width:100%;border-radius:0px; background-color:rgb(98, 177, 241);margin-left:-1px;">
          <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Add Program Type</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: white;" >&times;</span>
          </button>
        </div>
        <form method="POST" id="add_program_type_form">
          @csrf
          <div class="modal-body">
              {{-- below span hold form validation messages --}}
              <span id="form_result_add_program_type"></span>
              <div class="form-group">
                  <label for="ProgramLevel" class="col-form-label text-primary">Program Type Name:</label>
                  <input type="text" class="form-control border border-primary" name="ProgramType" id="ProgramType">
                </div>
          </div>
          <div class="modal-footer">
            <button data-dismiss="modal"class="btn btn-outline-danger btn-sm" style="width:80px;" >Close</button>
            <button type="submit" id="addPTButton" class="btn btn-primary btn-sm" style="width:80px;"  value="Add Program Type">
                      Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>