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
              <h2 class="page-title">Assigned Services</h2>
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
                          <button class="table-sort" data-sort="sort-id">
                            Service Title
                          </button>
                        </th>
                        <th>
                          <button class="table-sort" data-sort="sort-id">
                            Service Description
                          </button>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">

                      <?php
                      $sql = "SELECT b.service_title,b.service_description FROM assign_service a INNER JOIN services b ON a.service_id=b.services_id where a.user_id=2";
                      $rs = $conn->query($sql);
                      $i = 1;
                      foreach ($rs as $rows) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $rows['service_title'] ?></td>
                          <td><?php echo $rows['service_description'] ?></td>

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