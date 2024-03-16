<?php
include '../drivers/connection.php';


?>

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
              <div class="row">
                <div class="col-lg-3">
                  <div class="card">
                    <div class="card-body d-flex justify-content-evenly bg-azure text-white gap-2">
                      <image src="../static/icon/house.png"></image>
                      <span class="text-center">PREV DEPARTMENT AGRICULTURE</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="card">
                    <div class="card-body d-flex justify-content-evenly bg-azure text-white gap-2">
                      <image src="../static/icon/house.png"></image>
                      <span class="text-center">AGRICULTURE</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="card">
                    <div class="card-body text-center">
                      <h1>TESTING</h1>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="card">
                    <div class="card-body text-center">
                      <h1>TESTING</h1>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
      <?php include '../static/nav/footer.php'; ?>
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
        $('#modal-service').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();
        $('.modal-title').html('Insert Services');


      });

      $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var currentRow = $(this).closest("tr");
        var col1 = currentRow.find("td:eq(0)").text();
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
                url: "static/ajax/delete.php",
                data: {
                  myids: col1,
                  table: 'asset',
                  key: 'asset_code'
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