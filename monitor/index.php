<?php
include '../drivers/connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<?php include '../static/nav/head.php' ?>

<body class="theme-color">
  <div class="card theme-color mx-auto my-auto">
    <div class="card-body theme-color">
      <div class="row">
        <div class="col-lg-2">
          <div class="mb-3 text-center">
            <h1 class="text-secondary">TICKET NO#</h1>
          </div>
          <div class="mb-3">
            <div class="card">
              <div class="card-body bg-primary">
                <div class="typo text-white" id="personnel1"></div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="card">
              <div class="card-body bg-primary">
                <div class="typo text-white" id="personnel2">B002</div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="card">
              <div class="card-body bg-primary">
                <div class="typo text-white" id="personnel3">C003</div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="card">
              <div class="card-body bg-primary">
                <div class="typo text-white" id="personnel4">D004</div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="card">
              <div class="card-body bg-primary">
                <div class="typo text-white" id="personnel5">E005</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="mb-3 text-center">
            <h1 class="text-secondary">PERSONNEL</h1>
          </div>
          <div class="mb-3">
            <div class="card">
              <div class="card-body bg-pink">
                <div class="typo text-white">1</div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="card">
              <div class="card-body  bg-pink">
                <div class="typo text-white">2</div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="card">
              <div class="card-body  bg-pink">
                <div class="typo text-white">3</div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="card">
              <div class="card-body  bg-pink">
                <div class="typo text-white">4</div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="card">
              <div class="card-body  bg-pink">
                <div class="typo text-white">5</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 cols">
          <div class="row">
            <div class="col-lg-12">
              <div class="mb-3 d-flex justify-content-center align-items-center gap-5 text-secondary">
                <h1><img src="../static/images/calendar.png">  <?php echo date("M d, Y"); ?></h1>
                <h1><img src="../static/images/sun.png">  <?php echo date('l') ?></h1>
                <h1><img src="../static/images/clock.png"> <span id="current-time"></span></h1>
              </div>
              <div>
                <video controls loop>
                  <source src="../static/video/video1.mp4" type="video/mp4">
                </video>
              </div>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <div class="card h-75">
            <div class="card-body bg-success">
              <marquee direction="right">
                <div class="marquee-text text-white">Developed by Stephen Lumantaaaaaaaaaaaaaaaa</div>
              </marquee>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php include '../static/nav/scripts.php' ?>
</body>

</html>
<script>
  function updateTime() {
    const now = new Date();
    const hours = now.getHours();
    const minutes = now.getMinutes();
    const seconds = now.getSeconds();
    const ampm = hours >= 12 ? 'PM' : 'AM';

    const formattedHours = hours % 12 || 12; // Convert to 12-hour format
    const formattedTime = `${formattedHours}:${minutes < 10 ? '0' + minutes : minutes}:${seconds < 10 ? '0' + seconds : seconds} ${ampm}`;

    $('#current-time').html(formattedTime)
  }







  updateTime();

  setInterval(updateTime, 1000);
</script>
<style>
  .typo {
    font-weight: bold;
    font-size: 50px;
    text-align: center;
  }

  .header-text-util {
    font-weight: bold;
    font-size: 24px;
  }

  .marquee-text {
    font-weight: bolder;
  }

  video {
    border: 5px solid gray;
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: relative;
  }

  .theme-color {
    background-color: #F4F3F2;
  }
</style>

<script>
  $(document).ready(function() {
    function getQuest() {
      $.ajax({
        method: "POST",
        url: "../ajax/monitorques.php",
        dataType: 'json',
        success: function(res) {
          let cnt1 = res.cnt1 ?? 'XXXX';
          let cnt2 = res.cnt2 ?? 'XXXX';
          let cnt3 = res.cnt3 ?? 'XXXX';
          let cnt4 = res.cnt4 ?? 'XXXX';
          let cnt5 = res.cnt5 ?? 'XXXX';
          if (res.length == 0) {
            $('#personnel1').html('A000');
            $('#personnel2').html('B000');
            $('#personnel3').html('C000');
            $('#personnel4').html('D000');
            $('#personnel5').html('E000');
          } else {
            $('#personnel1').html(cnt1);
            $('#personnel2').html(cnt2);
            $('#personnel3').html(cnt3);
            $('#personnel4').html(cnt4);
            $('#personnel5').html(cnt5);
          }

        }

      });
    }

    setInterval(getQuest, 500);
  });
</script>