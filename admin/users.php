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
              <h2 class="page-title">List of Users</h2>
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
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-primary add">Add</button>
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
                          <button class="table-sort" data-sort="sort-name">
                            Name
                          </button>
                        </th>
                        <th>
                          <button class="table-sort" data-sort="sort-dob">
                            Counter Assigned
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
                              CONCAT(last_name, ' ', first_name) AS fname,
                              counter,
                              user_id
                          FROM
                              personnels
                          ORDER BY
                              counter ASC";
                      $rs = $conn->query($sql);
                      $i = 1;
                      foreach ($rs as $rows) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $rows['fname'] ?></td>
                          <td>
                            <?php echo $rows['counter'] ?>
                          </td>
                          <td>
                            <a href="#" class="badge bg-yellow edit">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                                <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" />
                              </svg>

                            </a> |
                            <a href="#" class="badge bg-red delete">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7h16" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                <path d="M10 12l4 4m0 -4l-4 4" />
                              </svg>
                            </a>
                          </td>
                          <td class="d-none"><?php echo $rows['user_id'] ?></td>
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
      var assignServiceSelect;
      let id = null;
      var el;
      var assignServiceSelect = window.TomSelect && (new TomSelect(el = document.getElementById('assignService'), {
        copyClassesToDropdown: false,
        controlInput: '<input>',

        render: {
          item: function(data, escape) {
            if (data.customProperties) {
              return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
            }
            return '<div>' + escape(data.text) + '</div>';
          },
          option: function(data, escape) {
            if (data.customProperties) {
              return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
            }
            return '<div>' + escape(data.text) + '</div>';
          },
        },
      }));

      function getServices(services, tomSelect) {
        tomSelect.clearOptions();

        if (Array.isArray(services)) {
          const options = services.map(service => ({
            value: service.services_id,
            text: service.service_title
          }));
          tomSelect.addOptions(options);
        } else {
          console.log('Services is not an array:', services);
        }
      }




      $(document).on('click', '.edit', function() {
        $('#modal-user').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();
        $('.modal-title').html('Update Type Client');
        id = data[4];

        $.ajax({
          method: "GET",
          url: "../ajax/users.php",
          data: {
            userId: id
          },
          dataType: 'json',
          success: function(res) {
            if (res.length > 0) {
              const userObj = res[0];
              $('#fname').val(userObj.first_name);
              $('#lname').val(userObj.last_name);
              $('#username').val(userObj.username);
              $('#password').val(userObj.password);
              $('#counter').val(userObj.counter);
              $.ajax({
                method: "GET",
                url: "../ajax/service.php",
                data: {
                  userId: id,
                  action: 'EDIT'
                },
                success: function(html) {
                  getServices(JSON.parse(html), assignServiceSelect)
                  assignServiceSelect.setValue(userObj.services_ids);
                }

              });


            }
          }
        });
      });


      $(document).on('click', '.add', function() {
        $('#modal-user').modal('show');
        $('.modal-title').html('Insert User & Services');
        id = null;
        $('#fname').val(null);
        $('#lname').val(null);
        $('#username').val(null);
        $('#password').val(null);
        $('#counter').val(1);
        assignServiceSelect.setValue([]);
        $.ajax({
          method: "GET",
          url: "../ajax/service.php",
          data: {
            action: 'ADD'
          },
          success: function(html) {
            getServices(JSON.parse(html), assignServiceSelect)
          }

        });
      });

      $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var currentRow = $(this).closest("tr");
        var col1 = currentRow.find("td:eq(4)").text();
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
                url: "../ajax/users.php",
                data: {
                  userId: col1,
                  action: 'DELETE'
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


      $(document).on('click', '#submituser', function(e) {
        e.preventDefault();
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var uname = $('#username').val();
        var pass = $('#password').val();
        var counter = $('#counter').val();
        var service = $('#assignService').val();

        if (id === null) {
          action = "ADD";
          text = "You want to add this user?";

        } else {
          action = "UPDATE";
          text = "You want to update this user?";
        }
        swal({
            title: "Are you sure?",
            text: text,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((isConfirm) => {
            if (isConfirm) {
              if (id === null) {
                $.ajax({
                  method: "POST",
                  url: "../ajax/users.php",
                  data: {
                    fname: fname,
                    lname: lname,
                    uname: uname,
                    pass: pass,
                    counter: counter,
                    service: service,
                    action: 'ADD'
                  },
                  success: function(html) {
                    swal("Success", {
                      icon: "success",
                    }).then((value) => {
                      location.reload();
                    });
                  }
                });
              } else {
                $.ajax({
                  method: "POST",
                  url: "../ajax/users.php",
                  data: {
                    fname: fname,
                    lname: lname,
                    uname: uname,
                    pass: pass,
                    counter: counter,
                    service: service,
                    userId: id,
                    action: 'UPDATE'
                  },
                  success: function(html) {
                    swal("Success", {
                      icon: "success",
                    }).then((value) => {
                      location.reload();
                    });
                  }
                });
              }
            }
          });
      });
    });
  </script>
</body>

</html>