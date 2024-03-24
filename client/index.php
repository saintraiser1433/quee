<?php include '../drivers/connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include '../static/nav/head.php' ?>

<body>
  <div class="page">
    <!-- Navbar -->
    <div class="page-wrapper">
      <!-- Page header -->
      <!-- Page body -->
      <div class="page-body my-auto">
        <div class="container-xl">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-center mb-5 align-items-center gap-2">
                <img src="../static/images/logo/<?php echo $companyLogox ?>">
                <h1 class="text-uppercase"><?php echo $companyNamex ?></h1>

              </div>
              <hr>
              <h1 class="text-center text-primary"><U>Select Services</U></h1>
              <div class="row">
                <?php
                $sql = "SELECT
                        b.*,
                        c.counter
                        FROM
                            assign_service a
                        INNER JOIN services b ON
                            a.service_id = b.services_id
                        INNER JOIN personnels c ON a.user_id = c.user_id
                        WHERE b.status = 1";
                $rs = $conn->query($sql);
                foreach ($rs as $row) {
                ?>
                  <div class="col-lg-3 pb-2">

                    <div class="card card-link card-link-pop" onclick="service('<?php echo $row['services_id'] ?>','<?php echo $row['service_title'] ?>','<?php echo $row['counter'] ?>')" style="cursor:pointer; height:350px">
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
    let servicetitle = "";
    let ticketNo = "";

    function service(id, title, counter) {
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
                service_id: id,
                counter: counter
              },
              success: function(html) {
                servicetitle = title;
                ticketNo = html;
                $('#modal-ticket').modal('show');
                $('.ticketFont').html('#' + html);
              }

            });


          } else {
            swal("Cancelled");
          }
        });
    }


    $(document).ready(function() {

      $(document).on('click', '.print', function() {
        $.ajax({
          url: "../ajax/generate-ticket.php",
          method: "POST",
          data: {
            servicetitle: servicetitle,
            ticketNo: ticketNo,
          },
          success: function(html) {
            setInterval(function() {
              window.location.href = '../static/report/output/ticket.pdf';
            }, 1000);
          }
        })
      });




    });
  </script>


</body>

</html>
<style>
  .ticketFont {
    font-size: 40px;
    font-weight: bold;
    border-bottom: 1px solid gray;
    margin-bottom: 10px;

  }
</style>