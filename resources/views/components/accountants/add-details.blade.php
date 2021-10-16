  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header ">
                  <h5 class="modal-title " id="exampleModalLongTitle" style="font-weight: 500">Please Fill customer
                      details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('customers.store', $file->id) }}" enctype="multipart/form-data"
                      method="POST">
                      @csrf
                      @method('POST')

                      <div class="form-group">
                          <label for="name">Cusomer Names</label>
                          <input class="form-control" id="names" rows="3" name="names"
                              placeholder="Name of the customer " required>
                      </div>
                      <div class="form-group">
                          <label for="message">Purpose of the document</label>
                          <textarea name="fileo" id="" class="form-control" rows="3">
                          </textarea>
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
