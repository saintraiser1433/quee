<?php
include '../drivers/connection.php';
if (!isset($_SESSION['ad_id'])) {
  header("Location:index.php");
}
$date = date('Y');
$sql = "SELECT COUNT(*) AS cnt,MONTHNAME(date_borrow) as borrow from return_asset where YEAR(date_borrow)='$date'";
$rs = $conn->query($sql);
$resultArray = array();

foreach ($rs as $row) {
  $resultArray[] = $row;
}


// Extracting the required data from the array
$cntData = array_column($resultArray, 'cnt');
$monthData = array_column($resultArray, 'borrow');


?>
<!DOCTYPE html>
<html lang="en">
<?php include '../static/nav/head.php'?>

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
              <!-- Page pre-title -->
              <div class="page-pretitle">Overview</div>
              <h2 class="page-title">Dashboard</h2>
            </div>
            <!-- Page title actions -->
          </div>
        </div>
      </div>
      <!-- Page body -->
      <div class="page-body">
        <div class="container-xl">
          <div class="row row-deck row-cards">
            <div class="col-12">
              <div class="row row-cards">
                <div class="col-sm-6 col-lg-3">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M10 16v5" />
                              <path d="M14 16v5" />
                              <path d="M9 9h6l-1 7h-4z" />
                              <path d="M5 11c1.333 -1.333 2.667 -2 4 -2" />
                              <path d="M19 11c-1.333 -1.333 -2.667 -2 -4 -2" />
                              <path d="M12 4m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            </svg>
                          </span>
                        </div>
                        <div class="col">
                          <div class="font-weight-bold">
                            <?php
                            $sql = "SELECT COUNT(*) as cnt FROM students";
                            $rs = $conn->query($sql);
                            $row = $rs->fetch_assoc();
                            echo $row['cnt'];
                            ?>
                          </div>
                          <div class="text-muted">Students</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                              <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                              <path d="M17 17h-11v-14h-2" />
                              <path d="M6 5l14 1l-1 7h-13" />
                            </svg>
                          </span>
                        </div>
                        <div class="col">
                          <div class="font-weight-bold">
                            <?php
                            $sql = "SELECT COUNT(*) as cnt FROM asset";
                            $rs = $conn->query($sql);
                            $row = $rs->fetch_assoc();
                            echo $row['cnt'];
                            ?>
                          </div>
                          <div class="text-muted">Assets</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M4 4h6v6h-6z" />
                              <path d="M14 4h6v6h-6z" />
                              <path d="M4 14h6v6h-6z" />
                              <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            </svg>
                          </span>
                        </div>
                        <div class="col">
                          <div class="font-weight-medium"> <?php
                                                            $sql = "SELECT COUNT(*) as cnt FROM categories";
                                                            $rs = $conn->query($sql);
                                                            $row = $rs->fetch_assoc();
                                                            echo $row['cnt'];
                                                            ?></div>
                          <div class="text-muted">Category</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                  <div class="card card-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M8 19h-3a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v11a1 1 0 0 1 -1 1" />
                              <path d="M11 16m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                            </svg>
                          </span>
                        </div>
                        <div class="col">
                          <div class="font-weight-medium"><?php
                                                          $sql = "SELECT COUNT(*) as cnt FROM borrow group by student_id";
                                                          $rs = $conn->query($sql);
                                                          $row = $rs->fetch_assoc();
                                                          echo $row['cnt'];
                                                          ?>
                          </div>
                          <div class="text-muted">Borrower</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Return Items Per Month</h3>
                  <div id="chart-mentions" class="chart-lg"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include '../static/nav/footer.php' ?>
    </div>
  </div>

  <!-- Libs JS -->
  <script src="../dist/libs/apexcharts/dist/apexcharts.min.js?1684106062" defer></script>

  <!-- Tabler Core -->
  <script src="../dist/js/tabler.min.js?1684106062" defer></script>
  <script src="../dist/js/demo.min.js?1684106062" defer></script>

  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
      var cntData = <?php echo json_encode($cntData); ?>;
      var monthData = <?php echo json_encode($monthData); ?>;
      window.ApexCharts &&
        new ApexCharts(document.getElementById("chart-mentions"), {
          chart: {
            type: "bar",
            fontFamily: "inherit",
            height: 240,
            parentHeightOffset: 0,
            toolbar: {
              show: false,
            },
            animations: {
              enabled: false,
            },
            stacked: true,
          },
          plotOptions: {
            bar: {
              columnWidth: "50%",
            },
          },
          dataLabels: {
            enabled: false,
          },
          fill: {
            opacity: 1,
          },
          series: [{
              name: "Returned",
              data: cntData,
            },

          ],
          tooltip: {
            theme: "dark",
          },
          grid: {
            padding: {
              top: -20,
              right: 0,
              left: -4,
              bottom: -4,
            },
            strokeDashArray: 4,
            xaxis: {
              lines: {
                show: true,
              },
            },
          },
          xaxis: {
            labels: {
              padding: 0,
            },
            tooltip: {
              enabled: false,
            },
            axisBorder: {
              show: false,
            },
            type: "month",
          },
          yaxis: {
            labels: {
              padding: 4,
            },
          },
          labels: monthData,
          colors: [
            tabler.getColor("green", 0.8),
            tabler.getColor("red"),

          ],
          legend: {
            show: true,
          },
        }).render();
    });
    // @formatter:on
  </script>

</body>

</html>