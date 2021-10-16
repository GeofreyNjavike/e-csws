  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header ">
                  <h5 class="modal-title " id="exampleModalLongTitle" style="font-weight: 500">Create File</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('files.store') }}" enctype="multipart/form-data" method="POST">
                      @csrf
                      @method('POST')
                      <div class="form-group">
                          <label for="document">Select file</label>
                          <input required type="file" class="form-control-file" id="document" name="filename">
                      </div>
                      <div class="form-group">
                          <label for="name">Document Name</label>
                          <input class="form-control" id="name" rows="3" name="name"
                              placeholder="Name of the document " required>
                      </div>
                      <div class="form-group">
                          <label for="message">Purpose of the document</label>
                          <select name="fileobjective" id="" class="form-control">
                              <option value="">--Select Purpose Of the Document--</option>
                              @foreach ($objectives as $object)
                                  <option value="{{ $object->fileobjective }}">{{ $object->fileobjective }}</option>
                              @endforeach
                          </select>
                      </div>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" value="submit">Share File</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
