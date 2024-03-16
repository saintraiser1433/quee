<?php
include 'drivers/connection.php';

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $sql = "SELECT * FROM auth where username='$username' and password='$password'";
  $rs = $conn->query($sql);
  $row = $rs->fetch_assoc();
  if ($rs->num_rows > 0) {
    $_SESSION['ad_id'] = $row['id'];
    header("Location:admin/dashboard.php");
  } else {
    $_SESSION['response'] = "Incorrect Credentials";
    $_SESSION['type'] = "error";
  }
}


?>
<!doctype html>

<html lang="en">
<?php include 'static/nav/head.php' ?>

<body class=" d-flex flex-column">
  <script src="./dist/js/demo-theme.min.js?1684106062"></script>
  <div class="page page-center">
    <div class="container container-tight py-4">
      <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
      </div>
      <div class="card card-md">
        <div class="card-body">
          <h2 class="h2 text-center mb-4">Login to your account</h2>
          <form action="" method="post" autocomplete="off" novalidate>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" name="username" placeholder="Your Username" autocomplete="off">
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password

              </label>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control" name="password" placeholder="Your password" autocomplete="off">
                <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                      <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                    </svg>
                  </a>
                </span>
              </div>
            </div>
            <div class="mb-2">
              <label class="form-check">
                <input type="checkbox" class="form-check-input" />
                <span class="form-check-label">Remember me on this device</span>
              </label>
            </div>
            <div class="form-footer">
              <button type="submit" name="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
          </form>
        </div>

      </div>

    </div>
  </div>
  <!-- Libs JS -->
  <!-- Tabler Core -->


  <?php include 'static/nav/scripts.php' ?>

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
</body>

</html>