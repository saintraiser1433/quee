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
      <!-- Page body -->
      <div class="page-body">
        <div class="container-xl">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-teal">
                    <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                      <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                    </svg>
                  </div>
                </div>
                <div class="card-status-bottom bg-success"></div>
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center">
                    <h1 class="text-center">NOW SERVING</h1>
                    <div class="ticketFont">#1001</div>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-success next">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-right">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 7l5 5l-5 5" />
                        <path d="M13 7l5 5l-5 5" />
                      </svg>
                      Next</button>
                    <button type="button" class="btn btn-secondary add">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-speakerphone">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M18 8a3 3 0 0 1 0 6" />
                        <path d="M10 8v11a1 1 0 0 1 -1 1h-1a1 1 0 0 1 -1 -1v-5" />
                        <path d="M12 8h0l4.524 -3.77a.9 .9 0 0 1 1.476 .692v12.156a.9 .9 0 0 1 -1.476 .692l-4.524 -3.77h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h8" />
                      </svg>
                      Notify</button>

                    <button type="button" class="btn btn-info cancel">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-details">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M11.999 3l.001 17" />
                        <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" />
                      </svg>
                      Details</button>
                  </div>


                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h1>My Pending Que's</h1>
                </div>
                <div class="card-status-bottom bg-success"></div>
                <div class="card-body flex-column align-items-center">
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
                                Ticket #
                              </button>
                            </th>


                          </tr>
                        </thead>
                        <tbody class="table-tbody">
                          <tr>
                            <td>1</td>
                            <td>1002</td>
                          </tr>

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
        </div>
      </div>
      <?php include '../static/nav/footer.php'; ?>
      <?php include '../static/components/modal.php'; ?>
    </div>
  </div>




  <?php include '../static/nav/scripts.php' ?>





</body>

</html>

<script>
  $(document).ready(function() {
    $('.next').on('click', function() {
      $('#modal-client').modal('show')
    });
  });
</script>

<style>
  .ticketFont {
    font-size: 48px;
    font-weight: bold;

  }
</style>