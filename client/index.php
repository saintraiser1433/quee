<?php include '../drivers/connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include '../static/nav/head.php' ?>

<body>
  <div class="page">
    <!-- Navbar -->
    <?php include '../static/nav/topbar.php' ?>
    <div class="page-wrapper">
      <!-- Page header -->
      <!-- Page body -->
      <div class="page-body">
        <div class="container-xl">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-center">
                <h1>LOREM IPSUM COMPANY</h1>
              </div>
              <div class="row">
                <?php
                $sql = "SELECT * FROM services where status = 1";
                $rs = $conn->query($sql);
                foreach ($rs as $row) {
                ?>
                  <div class="col-lg-3 pb-2">

                    <div class="card card-link card-link-pop" onclick="service('<?php echo $row['services_id'] ?>','<?php echo $row['service_title'] ?>')" style="cursor:pointer; height:350px">
                      <div class="card-status-bottom bg-success"></div>
                      <!-- Photo -->
                      <div class="img-responsive img-responsive-16x9 card-img-top" style="background-image: url('../static/images/menu/<?php echo $row['image'] ?>');"></div>
                      <div class="card-body">
                        <span class="text-capitalize fw-bolder asname"><?php echo $row['service_title'] ?></span>
                        <p class="text-muted" align="justify"><?php $description = $row['service_description'];
                                                              if (strlen($description) > 50) {
                                                                $truncated = substr($description, 0, 200) . '...';
                                                                echo $truncated . substr($description, 200);
                                                              } else {
                                                                echo $description;
                                                              } ?></p>

                      </div>
                    </div>
                  </div>

                <?php } ?>

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



  <script>
    function service(id, title) {
      swal({
          title: "Are you sure?",
          text: "Adding Que's in this service: " + title,
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((isConfirm) => {
          if (isConfirm) {
            $.ajax({
              method: "POST",
              url: "../ajax/ticket.php",
              data: {
                service_id:id
              },
              success: function(html) {
                $('#modal-ticket').modal('show');
              }

            });


          } else {
            swal("Cancelled");
          }
        });
    }
  </script>
</body>

</html>
<style>
  .ticketFont {
    font-size: 48px;
    font-weight: bold;

  }
</style>