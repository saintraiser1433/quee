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
                <div class="typo text-white">0001</div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="card">
              <div class="card-body bg-primary">
                <div class="typo text-white">0002</div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="card">
              <div class="card-body bg-primary">
                <div class="typo text-white">0003</div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="card">
              <div class="card-body bg-primary">
                <div class="typo text-white">0004</div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="card">
              <div class="card-body bg-primary">
                <div class="typo text-white">0005</div>
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
                <h1><img src="../static/images/calendar.png"> Jan 01, 2023</h1>
                <h1><img src="../static/images/sun.png"> Sunday</h1>
                <h1><img src="../static/images/clock.png"> 12:34 PM</h1>
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


</body>

</html>
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