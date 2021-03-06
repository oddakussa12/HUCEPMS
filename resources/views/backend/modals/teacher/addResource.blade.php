
<div class="modal fade" id="addResourceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="border-radius:0px;">
        <div class="modal-header" style="width:100%;border-radius:0px; background-color:rgb(98, 177, 241);margin-left:-1px;">
          <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Add Resource</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: white;" >&times;</span>
          </button>
        </div>
        <form method="POST" id="add_resource_form" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
              {{-- below span hold form validation messages --}}
              <span id="form_result_add_resource"></span>
              <input type="hidden" value="" name="subjectid" id="hiddenSubId" />
              <div class="form-group">
                  <label for="ResourceName" class="col-form-label text-primary">Resource Name:</label>
                  <input type="text" class="form-control border border-primary" name="ResourceName" id="ResourceName">
              </div>

              <div class="form-group">
                <label for="File" class="col-form-label text-primary">File</label>
                <input type="file" class="form-control border border-primary" name="File" id="File">
              </div>
          </div>
          <div class="modal-footer">
            <button data-dismiss="modal"class="btn btn-outline-danger btn-sm" style="width:80px;" >Close</button>
            <button type="submit" id="addResourceButton" class="btn btn-primary btn-sm" style="width:80px;"  value="Add Resource">
                      Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>