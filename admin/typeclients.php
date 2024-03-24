<?php
include '../drivers/connection.php';
if (!isset($_SESSION['auth_id'])) {
  header("Location:../index.php");
}

if (isset($_GET['stat']) && isset($_GET['stat']) != '') {
  $stat = $_GET['stat'];
  $theid = $_GET['tci'];
  $sql = "UPDATE type_clients SET status = $stat where type_client_id=$theid";
  $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../static/nav/head.php' ?>

<body>
  <script src="../dist/js/demo-theme.min.js?1684106062"></script>
  <div class="page">
    <!-- Navbar -->
    <?php include '../static/nav/topbar.php' ?>
    <?php include '../static/nav/navbar.php' ?>
    <div class="page-wrapper">
      <!-- Page header -->
      <div class="page-header d-print-none">
        <div class="container-xl">
          <div class="row g-2 align-items-center">
            <div class="col">
              <h2 class="page-title">Clients Type</h2>
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
                            #
                          </button>
                        </th>
                        <th>
                          <button class="table-sort" data-sort="sort-name">
                            Client Description
                          </button>
                        </th>
                        <th>
                          <button class="table-sort" data-sort="sort-dob">
                            Status
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
                      $sql = "SELECT * FROM type_clients";
                      $rs = $conn->query($sql);
                      $i = 1;
                      foreach ($rs as $rows) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $rows['client_description'] ?></td>
                          <td>
                            <?php
                            if ($rows['status'] == 1) {
                              echo " <a href='?stat=0&tci=" . $rows['type_client_id'] . "'><span class='badge badge-sm bg-green text-white text-uppercase ms-auto'>Active</span></a>";
                            } else if ($rows['status'] == 0) {
                              echo " <a href='?stat=1&tci=" . $rows['type_client_id'] . "'><span class='badge badge-sm bg-red text-white text-uppercase ms-auto'>Inactive</span></a>";
                            }
                            ?>
                          </td>
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
                          <td class="d-none"><?php echo $rows['client_id'] ?></td>
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
    $(document).ready(function() {
      let id = null;

     
      $(document).on('click', '.edit', function() {
        $('#modal-typeclients').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();
        id = data[4];

        $.ajax({
          method: "GET",
          url: "../ajax/typeclients.php",
          data: {
            clientId: id,
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
            $('#clientdescription').val(html.client_description);
            $('#clientstatus').prop('checked', stat);
          }
        });
        $('.modal-title').html('Update Type Client');
      });


      $(document).on('click', '.add', function() {
        $('#modal-typeclients').modal('show');
        $('.modal-title').html('Insert Type Client');
        id = null;
        $('.my-switch').css('display', 'none');
      });

      $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var currentRow = $(this).closest("tr");
        var col1 = currentRow.find("td:eq(4)").text();
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
                url: "../ajax/typeclients.php",
                data: {
                  clientId: col1,
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


      $(document).on('click', '#submitypeclient', function(e) {
        e.preventDefault();
        var formData = new FormData();
        let text = null;
        let action = null;
        var status = $('#clientstatus').prop('checked');
        if (status) {
          checkStatus = 1;
        } else {
          checkStatus = 0;
        }
        let clientdescription = $('#clientdescription').val();

        if (id === null) {
          action = "ADD";
          text = "You want to add this type client?";

        } else {
          action = "UPDATE";
          text = "You want to update this type client?";
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
                  url: "../ajax/typeclients.php",
                  data: {
                    clientId: id,
                    clientdescription: clientdescription,
                    action: action
                  },
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
                  url: "../ajax/typeclients.php",
                  data: {
                    clientId: id,
                    clientdescription: clientdescription,
                    clientstatus: checkStatus,
                    action: action
                  },
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