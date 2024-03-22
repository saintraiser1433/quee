<?php
include '../drivers/connection.php';
if (!isset($_SESSION['user_id'])) {
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


</body>

</html>