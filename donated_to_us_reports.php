<?php
include("config/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nadir Welfare Foundation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

</head>

<body>






  <div class="wrapper">

    <?php
include('body/header.php');
?>
    <!-- Navbar -->

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="row">
          <div class="col-md-12">
            <?php
        include('body/msgs.php');
        ?>
          </div>
        </div>

      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
            <!-- <div class="card-header">
            <h3 class="card-title">Select2 (Default Theme)</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div> -->





            <!-- /.card-header -->
            <div class="card-body">





              <div class="row">
                <div class="col-md-12">
                  <h2>Donated To Us Reports</h2>
                </div>
              </div>
              <br>


              <form action="donated_to_us_report.php"  method="post">

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="select">Select Donation Type:</label>
                    <select name="donation_type" id="" class="form-control">
                      <option value="">--- Donation Type ---</option>
                      <option value="All">All donations</option>
                      <option value="cash">Cash Donated To Us</option>
                      <option value="items">Items Donated To Us</option>
                    </select>
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="text"> From (Date)</label>
                      <input type="date" class="form-control" name="from_date" value="<?php echo date('Y-m-d'); ?>" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="text"> To (Date)</label>
                      <input type="date" name="to_date" class="form-control" value="" />
                    </div>
                  </div>
                </div>
              </div>


              <div class="row">
              <div class="col-md-4">
                  <input type="submit" name="get_report" class="btn btn-primary btn-block" value="Get Report">
                </div>
              </div>


              </form>

              <!-- /.row -->
            </div>
            <!-- /.card-body -->

          </div>

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

  </div>











  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script src="https://kit.fontawesome.com/20db2967c4.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script>

    // var current_date = document.getElementById('current_date');
    // const addDate = new date("00/23/2131");

    // current_date.value.innerHTML  =  



    var input1 = document.querySelectorAll('.js-date')[0];
    var input2 = document.querySelectorAll('.js-date')[1];

    var dateInputMask = function dateInputMask(elm) {
      elm.addEventListener('keypress', function (e) {
        if (e.keyCode < 47 || e.keyCode > 57) {
          e.preventDefault();
        }

        var len = elm.value.length;

        // If we're at a particular place, let the user type the slash
        // i.e., 12/12/1212
        if (len !== 1 || len !== 3) {
          if (e.keyCode == 47) {
            e.preventDefault();
          }
        }

        // If they don't add the slash, do it for them...
        if (len === 2) {
          elm.value += '/';
        }

        // If they don't add the slash, do it for them...
        if (len === 5) {
          elm.value += '/';
        }
      });
    };

    dateInputMask(input1);
    dateInputMask(input2);




    $(document).ready(function () {
      $(":input").inputmask();
      // Add other initialization code here if needed
    });


    // document.getElementById("cash_form").style.display = "none";
    // Get all checkboxes with the specified class
    const checkboxes = document.querySelectorAll('.selection_checkboxes');

    // Add click event listener to each checkbox
    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('click', function () {
        // Uncheck all checkboxes
        checkboxes.forEach(cb => {
          if (cb !== checkbox) {
            cb.checked = false;
          }
        });
      });
    });

    function form_visibility(checked_checkbox) {

      var forms = document.querySelectorAll('.selection_radio');

      if (checked_checkbox === 1) {
        if (document.getElementById("items_form").style.display === "block") {
          document.getElementById("items_form").style.display = "none";
        }
        document.getElementById("cash_form").style.display = "block";


      }
      else if (checked_checkbox === 2) {

        if (document.getElementById("cash_form").style.display === "block") {
          document.getElementById("cash_form").style.display = "none";
        }
        document.getElementById("items_form").style.display = "block";


      }


    }
    function exist_form_visibility(checked_checkbox) {
      var forms = document.querySelectorAll('.selection_radio');

      if (checked_checkbox === 1) {
        if (document.getElementById("items_form2").style.display === "block") {
          document.getElementById("items_form2").style.display = "none";
        }
        document.getElementById("cash_form2").style.display = "block";


      }
      else if (checked_checkbox === 2) {
        if (document.getElementById("cash_form2").style.display === "block") {
          document.getElementById("cash_form2").style.display = "none";
        }
        document.getElementById("items_form2").style.display = "block";


      }

    }
  </script>

  <script>
    $(document).ready(function () {
      $('.js-example-basic-single').select2();
    });
  </script>
</body>

</html>