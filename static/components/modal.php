  <!-- modal for service -->
  <div class="modal modal-blur fade" id="modal-service" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Basic Information</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-lg-4">
                              <center>
                                  <img id="ImgID" src="static/images/no-image.png" width="180px" height="180px" style="max-height:180px; max-width:180px; min-width:180px; min-height:180px; border:2px solid gray">
                              </center><br>
                              <center>
                                  <button class="btn btn-primary" id="upload">Upload</button>
                                  <input type="file" name="files[]" id="filer_input_single" class="form-control d-none" onchange="readURL(this);" required />
                              </center>

                          </div>
                          <div class="col-lg-8">
                              <div class="mb-3">
                                  <label class="form-label">Service Title</label>
                                  <input type="text" name="description" class="form-control" id="description" required>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Service Description</label>
                                  <textarea class="form-control" rows="5"></textarea>
                              </div>
                              <div class="mb-3 my-switch">
                                  <label class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="departmentStatus">
                                      <span class="form-check-label">Active Status</span>
                                  </label>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                          Cancel
                      </a>
                      <button type="submit" class="btn btn-primary ms-auto" name="submit">
                          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M12 5l0 14" />
                              <path d="M5 12l14 0" />
                          </svg>
                          Save
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div>


    <!-- modal for type of clients -->
    <div class="modal modal-blur fade" id="modal-typeclients" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Basic Information</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="mb-3">
                                  <label class="form-label">Description</label>
                                  <input type="text" name="description" class="form-control" id="description" required>
                              </div>
                              <div class="mb-3 my-switch">
                                  <label class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="departmentStatus">
                                      <span class="form-check-label">Active Status</span>
                                  </label>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                          Cancel
                      </a>
                      <button type="submit" class="btn btn-primary ms-auto" name="submit">
                          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M12 5l0 14" />
                              <path d="M5 12l14 0" />
                          </svg>
                          Save
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div>