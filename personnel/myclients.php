<?php
include '../drivers/connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<?php include '../static/nav/head.php' ?>

<body>
  <script src="../dist/js/demo-theme.min.js?1684106062"></script>
  <div class="page">
    <!-- Navbar -->
    <?php include '../static/nav/topbar.php' ?>
    <?php include '../static/nav/navbar-personnel.php' ?>
    <div class="page-wrapper">
      <!-- Page header -->
      <div class="page-header d-print-none">
        <div class="container-xl">
          <div class="row g-2 align-items-center">
            <div class="col">
              <h2 class="page-title">My Clients</h2>
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
                <div id="pagination-container"></div>
                <div id="table-default" class="table-responsive">
                  <table class="table" id="tables">
                    <thead>
                      <tr>
                        <th>
                          <button class="table-sort" data-sort="sort-id">
                            #
                          </button>
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          <button class="table-sort" data-sort="sort-name">
                            Service Avail
                          </button>
                        </th>
                        <th>
                          <button class="table-sort" data-sort="sort-name">
                            Date Issued
                          </button>
                        </th>
                        <th>
                          <button class="table-sort">
                            Action
                          </button>
                        </th>
                        <th class="d-none"></th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">

                      <?php
                      $sql = "SELECT * FROM services";
                      $rs = $conn->query($sql);
                      $i = 1;
                      foreach ($rs as $rows) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $rows['service_title'] ?></td>
                          <td><?php echo $rows['service_description'] ?></td>
                          <td></td>
                          <td>
                            <a href="#" class="badge bg-yellow edit">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                                <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" />
                              </svg>

                            </a>
                          </td>
                        </tr>
                      <?php } ?>

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
      <?php include '../static/nav/footer.php'; ?>
      <?php include '../static/components/modal.php'; ?>
    </div>
  </div>




  <?php include '../static/nav/scripts.php' ?>



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
      let id = null;
      $(document).on('click', '#upload', function() {
        $('#filer_input_single').click();
      });

      $(document).on('click', '.edit', function() {
        $('#modal-service').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();
        id = data[6];

        $.ajax({
          method: "GET",
          url: "../ajax/service.php",
          data: {
            action: 'sds',
            serviceId: id,
          },
          dataType: 'json',
          success: function(res) {
            const html = res[0];
            if (html.status == 1) {
              stat = 'checked'
            } else {
              stat = ''
            }
            $('.my-switch').css('display', 'block');
            $('#ImgID').attr('src', '../static/images/menu/' + html.image);
            $('#servicetitle').val(html.service_title);
            $('#servicedescription').val(html.service_description);
            $('#servicestatus').prop('checked', stat);
          }

        });
        $('.modal-title').html('Update Service');
      });


      $(document).on('click', '.add', function() {
        $('#modal-service').modal('show');
        $('.modal-title').html('Insert Services');
        id = null;
        $('.my-switch').css('display', 'none');
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
                  action: 'DELETE'
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


      $(document).on('click', '#submitservice', function(e) {
        e.preventDefault();
        var fileInput = document.getElementById('filer_input_single');
        var formData = new FormData();
        let text = null;
        var status = $('#servicestatus').prop('checked');
        if (status) {
          checkStatus = 1;
        } else {
          checkStatus = 0;
        }
        formData.append('serviceId', id);
        formData.append('servicetitle', $('#servicetitle').val());
        formData.append('servicedescription', $('#servicedescription').val());
        formData.append('servicestatus', checkStatus);
        formData.append('files', fileInput.files[0]);
        if (id === null) {
          formData.append('action', 'ADD');
          text = "You want to add this service?";

        } else {
          formData.append('action', 'UPDATE');
          text = "You want to update this service?";
        }
        swal({
            title: "Are you sure?",
            text: text,
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
    });
  </script>
</body>

</html>