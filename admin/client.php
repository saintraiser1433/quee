<?php
include '../drivers/connection.php';
if (!isset($_SESSION['auth_id'])) {
  header("Location:../index.php");
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
              <h2 class="page-title">List of Services</h2>
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
                <div class="d-flex align-items-center justify-content-end">

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
                      $sql = "SELECT
                      CONCAT(b.first_name,', ',b.last_name) as fname,
                      c.service_title,
                      b.date_application,
                      b.client_id
                      FROM
                      tickets a
                      INNER JOIN clients b ON a.ticket_id = b.ticket_id INNER JOIN services c ON c.services_id = a.service_id";
                      $rs = $conn->query($sql);
                      $i = 1;
                      foreach ($rs as $rows) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td class="text-capitalize"><?php echo $rows['fname'] ?></td>
                          <td><?php echo $rows['service_title'] ?></td>
                          <td><?php echo date('M-d-Y', strtotime($rows['date_application'])) ?></td>
                          <td>
                            <a href="#" class="badge bg-info detail">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                                <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" />
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

      $(document).on('click', '.detail', function(e) {

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        $.ajax({
          method: "POST",
          url: "../ajax/get-ticket-details.php",
          data: {
            clientId: data[5],
          },
          success: function(res) {
            let html = JSON.parse(res);
            $("#fnamexss").val(html.first_name);
            $("#lnamexss").val(html.last_name);
            $("#sexxs").val(html.sex);
            $("#agexss").val(html.age);
            $("#addressxs").val(html.address);
            $('#serviceavailxs').val(html.service_title)
            $("#type-clientxs").val(html.type_client_id);
            $('#datexs').val(html.dates)
            $('#modal-client-detail').modal('show');
          }
        });

      });


    });
  </script>
</body>

</html>