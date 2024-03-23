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
                                  <img id="ImgID" src="../static/images/menu/no-image.png" width="180px" height="180px" style="max-height:180px; max-width:180px; min-width:180px; min-height:180px; border:2px solid gray">
                              </center><br>
                              <center>
                                  <button type="button" class="btn btn-primary" id="upload">Upload</button>
                                  <input type="file" name="files[]" id="filer_input_single" class="form-control d-none" onchange="readURL(this);" required />
                              </center>
                          </div>
                          <div class="col-lg-8">
                              <div class="mb-3">
                                  <label class="form-label">Service Title</label>
                                  <input type="text" name="description" class="form-control" id="servicetitle" required>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Service Description</label>
                                  <textarea class="form-control" id="servicedescription" rows="5"></textarea>
                              </div>
                              <div class="mb-3 my-switch">
                                  <label class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="servicestatus">
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
                      <button type="submit" class="btn btn-primary ms-auto" id="submitservice" name="submit">
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
                                  <input type="text" name="description" class="form-control" id="clientdescription" required>
                              </div>
                              <div class="mb-3 my-switch">
                                  <label class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="clientstatus">
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
                      <button type="submit" class="btn btn-primary ms-auto" name="submit" id="submitypeclient">
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


  <!-- modal for user service -->
  <div class="modal modal-blur fade" id="modal-user-service" tabindex="-1" role="dialog" aria-hidden="true">
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
                                  <input type="text" name="description" class="form-control" id="clientdescription" required>
                              </div>
                              <div class="mb-3 my-switch">
                                  <label class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="clientstatus">
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
                      <button type="submit" class="btn btn-primary ms-auto" name="submit" id="submitypeclient">
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


  <!-- modal for user -->
  <div class="modal modal-blur fade" id="modal-user" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Basic Information</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">First Name</label>
                                  <input type="text" name="fname" class="form-control" id="fname" required>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Last Name</label>
                                  <input type="text" name="lname" class="form-control" id="lname" required>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Username</label>
                                  <input type="text" name="username" class="form-control" id="username" required>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Password</label>
                                  <input type="text" name="password" class="form-control" id="password" required>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Counter</label>
                                  <select id="counter" class="form-select" id="counter" required>
                                      <option selected></option>
                                      <option value='1'>1</option>
                                      <option value='2'>2</option>
                                      <option value='3'>3</option>
                                      <option value='4'>4</option>
                                      <option value='5'>5</option>
                                  </select>

                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <div class="form-label">Assigned Services</div>
                                  <select type="text" class="form-select" id="assignService" value="" placeholder="Select Services" multiple>

                                  </select>
                              </div>
                          </div>

                      </div>
                  </div>
                  <div class="modal-footer">
                      <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                          Cancel
                      </a>
                      <button type="submit" class="btn btn-primary ms-auto" name="submit" id="submituser">
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


  <!-- modal for client information -->
  <div class="modal modal-blur fade" id="modal-client" data-bs-backdrop='static' data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title ticket-number-title">Ticket No#: </h5>
              </div>
              <form action="" method="post">
                  <div class="modal-body">
                      <div class="row">

                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">First Name</label>
                                  <input type="text" name="fname" class="form-control" id="fnamex" required>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Last Name</label>
                                  <input type="text" name="lname" class="form-control" id="lnamex" required>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Sex</label>
                                  <select id="sex" class="form-select" required>
                                      <option selected></option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                  </select>

                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Age</label>
                                  <input type="number" name="age" class="form-control" id="age" required>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Address</label>
                                  <input type="text" name="address" class="form-control" id="address" required>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Service Availed</label>
                                  <input type="text" name="serviceavail" class="form-control" id="serviceavail" readonly>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Type of Client</label>
                                  <select id="type-client" class="form-select text-capitalize" required>
                                      <option selected></option>
                                      <?php
                                        $sql = "SELECT * FROM type_clients where status = 1";
                                        $rs = $conn->query($sql);
                                        foreach ($rs as $row) { ?>
                                          <option value='<?php echo $row['type_client_id'] ?>'><?php echo $row['client_description'] ?></option>
                                      <?php } ?>
                                  </select>

                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Date of Application</label>
                                  <input type="text" name="date" class="form-control" id="date" value="<?php echo date('M-d-y'); ?>" readonly>
                              </div>
                          </div>

                      </div>
                  </div>
                  <div class="modal-footer">
                      <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                          Cancel
                      </a>
                      <button type="button" class="btn btn-primary ms-auto" name="submit" id="submitDetails">
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


  <!-- modal for get ticket -->
  <div class="modal modal-blur fade" id="modal-ticket" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Ticket Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                      <div class="d-flex flex-column align-items-center">
                          <h1 class="text-center">YOUR TICKET NUMBER</h1>
                          <div class="ticketFont">

                          </div>
                          <div>
                              <button type="button" class="btn btn-success print">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-right">
                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                      <path d="M7 7l5 5l-5 5" />
                                      <path d="M13 7l5 5l-5 5" />
                                  </svg>
                                  PRINT</button>
                          </div>

                      </div>
                  </div>

              </form>
          </div>
      </div>
  </div>


  <!-- modal for client details -->
  <div class="modal modal-blur fade" id="modal-client-detail" data-bs-backdrop='static' data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"> Client Details </h5>
              </div>
              <form action="" method="post">
                  <div class="modal-body">
                      <div class="row">

                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">First Name</label>
                                  <input type="text" name="fname" class="form-control" id="fnamexss" readonly>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Last Name</label>
                                  <input type="text" name="lname" class="form-control" id="lnamexss" readonly>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Sex</label>
                                  <select id="sexxs" class="form-select" readonly>
                                      <option selected></option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                  </select>

                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Age</label>
                                  <input type="number" name="age" class="form-control" id="agexss" readonly>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Address</label>
                                  <input type="text" name="address" class="form-control" id="addressxs" readonly>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Service Availed</label>
                                  <input type="text" name="serviceavail" class="form-control" id="serviceavailxs" readonly>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Type of Client</label>
                                  <select id="type-clientxs" class="form-select text-capitalize" disabled>
                                      <option selected></option>
                                      <?php
                                        $sql = "SELECT * FROM type_clients where status = 1";
                                        $rs = $conn->query($sql);
                                        foreach ($rs as $row) { ?>
                                          <option value='<?php echo $row['type_client_id'] ?>'><?php echo $row['client_description'] ?></option>
                                      <?php } ?>
                                  </select>

                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <label class="form-label">Date of Application</label>
                                  <input type="text" name="datexs" class="form-control" id="datexs"  readonly>
                              </div>
                          </div>

                      </div>
                  </div>
                  <div class="modal-footer">
                      <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                          Cancel
                      </a>
                      
                  </div>
              </form>
          </div>
      </div>
  </div>