<?php
include '../drivers/connection.php';
// if (!isset($_SESSION['ad_id'])) {
//   header("Location:index.php");
// }

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'static/nav/head.php' ?>

<body>
  <script src="./dist/js/demo-theme.min.js?1684106062"></script>
  <div class="page">
    <!-- Navbar -->
    <?php include 'static/nav/topbar.php' ?>
    <?php include 'static/nav/navbar.php' ?>
    <div class="page-wrapper">
      <!-- Page header -->
      <div class="page-header d-print-none">
        <div class="container-xl">
          <div class="row g-2 align-items-center">
            <div class="col">
              <h2 class="page-title">Inventory List</h2>
            </div>
          </div>
        </div>
      </div>
      <!-- Page body -->
      <div class="page-body">
        <div class="container-xl">
          <div class="card">
            <div class="card-body">
              <div id="listjs">
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-primary add">Add</button>
                  <div class="flex-shrink-0">
                    <input class="form-control listjs-search" id="search-input" placeholder="Search" style="max-width: 200px;" />
                  </div>
                </div>
                <br>
                <div id="pagination-container"></div>
                <div id="table-default" class="table-responsive">
                  <table class="table" id="tables">
                    <thead>
                      <tr>
                        <th>
                          <button class="table-sort" data-sort="sort-id">
                            Asset Code
                          </button>
                        </th>
                        <th>Img</th>
                        <th>
                          <button class="table-sort" data-sort="sort-name">
                            Asset Name
                          </button>
                        </th>

                        <th>
                          <button class="table-sort" data-sort="sort-gender">
                            Description
                          </button>
                        </th>
                        <th>
                          <button class="table-sort" data-sort="sort-dob">
                            Category
                          </button>
                        </th>
                        <th>
                          <button class="table-sort" data-sort="sort-contact">
                            Condition
                          </button>
                        </th>

                        <th>
                          <button class="table-sort" data-sort="sort-status">
                            Status
                          </button>
                        </th>
                        <th>
                          <button class="table-sort">
                            Action
                          </button>
                        </th>

                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <?php
                      $sql = "SELECT a.*,b.description as catdes FROM asset a,categories b where a.category_id=b.cat_id order by a.category_id";
                      $rs = $conn->query($sql);
                      foreach ($rs as $row) { ?>
                        <tr>
                          <td class="sort-id"><?php echo $row['asset_code'] ?></td>
                          <td><img src="<?php echo $row['photo']; ?>" class="rounded-circle" style="width:30px;height:30px;"></td>
                          <td class="sort-name text-capitalize"><?php echo $row['asset_name'] ?></td>
                          <td class="sort-gender"><?php echo $row['asset_description'] ?></td>
                          <td class="sort-dob text-capitalize"><?php echo $row['catdes'] ?></td>
                          <td class="sort-contact"><?php echo $row['asset_condition'] ?></td>
                          <td>
                            <?php
                            if ($row['status'] === '0') {
                              echo '<span class="badge bg-success">Available</span>';
                            } else {
                              echo '<span class="badge bg-red">Not Available</span>';
                            }

                            ?>
                          </td>

                          <td style="display:none"><?php echo $row['category_id'] ?></td>
                          <td>
                            <a href="#" class="badge bg-yellow edit">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                                <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" />
                              </svg>

                            </a> |
                            <a href="#" class="badge bg-red delete">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7h16" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                <path d="M10 12l4 4m0 -4l-4 4" />
                              </svg>
                            </a>
                          </td>

                        </tr>
                      <?php  } ?>

                    </tbody>
                  </table>
                  <br>
                  <div class="btn-toolbar">
                    <p class="mb-0" id="listjs-showing-items-label">Showing 0 items</p>
                    <ul class="pagination ms-auto mb-0"></ul>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include 'static/nav/footer.php'; ?>
    </div>
  </div>

  <!-- modals -->
  <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
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
                  <img id="ImgID" src="static/images/no-image.png" width="230px" height="230px" style="max-height:230px; max-width:230px; min-width:230px; min-height:230px; border:2px solid gray">
                </center><br>

                <input type="file" name="files[]" id="filer_input_single" class="form-control" onchange="readURL(this);" required />
                </center>

              </div>
              <div class="col-lg-8">
                <div class="mb-3">
                  <label class="form-label">Asset Code</label>
                  <input type="text" class="form-control" name="assetcode" id="assetcode" readonly>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label class="form-label">Item Name</label>
                      <input type="text" name="itemname" class="form-control" id="itemname" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label class="form-label">Description</label>
                      <input type="text" name="description" class="form-control" id="description" required>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label class="form-label">Category</label>
                      <select class="form-select text-capitalize" name="category" id="category" required>
                        <option value="" selected>-</option>
                        <?php
                        $sql = "SELECT * FROM categories order by cat_id asc";
                        $rs = $conn->query($sql);
                        foreach ($rs as $row) {
                        ?>
                          <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['description'] ?></option>
                        <?php } ?>


                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label class="form-label">Condition</label>
                      <select class="form-select" name="condition" id="condition" required>
                        <option value="" selected>-</option>
                        <option value="Good">Good</option>
                        <option value="Slightly Damage">Slightly Damage</option>
                        <option value="Damage">Damage</option>
                      </select>
                    </div>
                  </div>
                </div>

                <input type="hidden" name="type" id="type">
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


  <?php include 'static/nav/scripts.php' ?>



  <?php
  if (isset($_SESSION['response']) && $_SESSION['response'] != "") {

  ?>
    <script>
      swal({
        title: "<?php echo $_SESSION['response']; ?>",
        icon: "<?php echo $_SESSION['type']; ?>",
        button: "Exit!",
      })
    </script>
  <?php unset($_SESSION['response']);
  }
  ?>

  <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#ImgID').attr('src', e.target.result);

        };
        reader.readAsDataURL(input.files[0]);
      }
    }
    $(document).ready(function() {




      $(document).on('click', '.edit', function() {
        $('#modal-add').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();
        $('#assetcode').val(data[0]);
        $('#itemname').val(data[2]);
        $('#description').val(data[3]);
        $('#category').val(data[8]);
        $('#quantity').val(data[5]);
        $('#condition').val(data[6]);
        $('.modal-title').html('Update Assets');
        $('#type').val('1');
      });


      $(document).on('click', '.add', function() {
        $('#modal-add').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();
        $('.modal-title').html('Add Assets');
        $('#assetcode').val('<?php echo $trn ?>');
        $('#itemname').val('');
        $('#description').val('');
        $('#category').val('');
        $('#quantity').val('');
        $('#condition').val('');
        $('#type').val('0');


      });


      $(document).on('click', '#submit', function(e) {
        e.preventDefault();
        var fileInput = document.getElementById('filer_input_single');
        var formData = new FormData();
        formData.append('itemCode', $('#itemCode').val());
        formData.append('itemName', $('#itemName').val());
        formData.append('itemDescription', $('#itemDescription').val());
        formData.append('itemCategory', $('#itemCategory').val());
        formData.append('itemSize', $('#itemSize').val());
        formData.append('files', fileInput.files[0]);
        if (id === null) {
          formData.append('action', 'ADD');
        } else {
          formData.append('action', 'UPDATE');
        }
        swal({
            title: "Are you sure?",
            text: "You want to add this data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((isConfirm) => {
            if (isConfirm) {
              if (id === null) {
                $.ajax({
                  method: "POST",
                  url: "../ajax/service.php",
                  data: formData,
                  processData: false,
                  contentType: false,
                  cache: false,
                  success: function(html) {
                    swal("Success", {
                      icon: "success",
                    }).then((value) => {
                      location.reload();
                    });
                  }
                });
              } else {
                $.ajax({
                  method: "POST",
                  url: "../ajax/service.php",
                  data: formData,
                  processData: false,
                  contentType: false,
                  cache: false,
                  success: function(html) {
                    swal("Success", {
                      icon: "success",
                    }).then((value) => {
                      location.reload();
                    });
                  }
                });
              }
            }
          });
      });

      $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var currentRow = $(this).closest("tr");
        var col1 = currentRow.find("td:eq(6)").text();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method: "POST",
                url: "../ajax/service.php",
                data: {
                  serviceId: col1,
                },
                success: function(html) {
                  swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                  }).then((value) => {
                    location.reload();
                  });
                }

              });

            } else {
              swal("Your imaginary file is safe!");
            }
          });
      });
    });
  </script>
</body>

</html>