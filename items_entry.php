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
        <div class="container-fluid">
          <div class="row mb-2">

            <div class="col-sm-12">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Donation Form</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
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

              <form action="data_entry_mgm.php" method="post" enctype="multipart/form-data" style="  <?php
          if (isset($_GET['donor_exists'])) {
           echo " display:none"; } else{ echo "display:block" ; } ?>">
                <div class="row">
                  <div class="col-md-12 ">
                    <h2>Donation Form</h2>
                  </div>
                </div>
                <br>
                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Donor Name</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Name" name="donor_name" required>
                      </div>
                    </div>
                  </div>
                  <!-- /.form-group -->

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Donor Phone Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter phone number" name="donor_phone"
                          required>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Donor CNIC Pic</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-regular fa-id-card"></i></span>
                        </div>
                        <input type="file" class="form-control" name="cnic_pic" required>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Donor Father Name</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter father name" name="donor_fname"
                          required>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Donor ID Card Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-regular fa-id-card"></i></span>
                        </div>
                        <input type="text" data-inputmask="'mask': '99999-9999999-9'" class="form-control"
                          name="donor_cnic" placeholder="XXXXX-XXXXXXX-X" name="cnic" required>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Donor Address</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                        </div>
                        <textarea type="text" class="form-control" name="donor_address"
                          placeholder="Enter address here.." required></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="row">
                <div class="col-md-12">
                    <label><h4>Donation Type</h4></label><br>
                    <div class="row">
                      <div class="col-md-2">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary3" class="selection_checkboxes" onclick="form_visibility(1)" name="donation_type" value="cash">
                        <label for="checkboxPrimary3">
                          Cash
                        </label>
                      </div>
                      </div>
                      <div class="col-md-2">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary4" class="selection_checkboxes"  onclick="form_visibility(2)" name="donation_type" value="items">
                        <label for="checkboxPrimary4">
                          Items
                        </label>
                      </div>
                      </div>
                    </div>
                </div>
            </div> -->


                <div class="row">
                  <div class="col-md-12">
                    <label>
                      <h4>Donation Type</h4>
                    </label><br>
                    <div class="row">
                      <div class="col-md-2">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary3" class="selection_radio" name="donation_type"
                            value="cash" onclick="form_visibility(1)">
                          <label for="radioPrimary3">
                            Cash
                          </label>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary4" class="selection_radio" name="donation_type"
                            value="items" onclick="form_visibility(2)">
                          <label for="radioPrimary4">
                            Items
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <br>
                <div class="row" id="cash_form" style="display:none">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Cash Amount</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-money-bills"></i></span>
                        </div>
                        <input type="number" class="form-control cash_input" name="cash_amount"
                          placeholder="Enter Cash Amount">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row" id="items_form" style="display:none">


              
                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Item Name</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-layer-group"></i></span>
                        </div>
                        <input type="text" class="form-control item_inputs" name="item_name"
                          placeholder="Enter Item Name">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Item Quantity</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-layer-group"></i></span>
                        </div>
                        <input type="number" class="form-control item_inputs" name="item_quantity"
                          placeholder="Enter Item Quantity">
                      </div>
                    </div>
                  </div>
                  </div>
                </div>

                <br>


                <button class="btn btn-primary btn-block" name="add_donation" type="submit"
                  style="width:50%;margin:auto;">Add Donation</button>
                <br>
              </form>
              <center><a href="items_entry.php?donor_exists=true" name="add_donation" type="" style="margin:auto;  <?php
          if (isset($_GET['donor_exists'])) {
           echo " display:none"; } else{ echo "display:block" ; } ?>">Add to Existing Donor</a></center>


              <?php 
if (isset($_GET['donor_exists'])) {

   
  $selecting_donor  = mysqli_query($conn, "SELECT donations.*, donor_info.* FROM donations
                INNER JOIN donor_info ON donations.donor_id = donor_info.donor_id ");

    
  ?>
              <div class="row">
                <div class="col-md-9">
                  <h2>Donation Form</h2>
                </div>
                <div class="col-md-3">




                  <!-- Your form with the modified select element -->
                  <form action="items_entry.php?donor_exists=true" method="get">
                    <input type="hidden" name="donor_exists" value="true">
                    <span><label>Select Donor</label></span>
                    <select name="donor_id" class="form-control js-example-basic-single" onchange="this.form.submit()">
                      <option value="" class="form-control">__Select Donor Name__</option>
                      <?php
        $sel_exist_donor = mysqli_query($conn, "SELECT * FROM donor_info");
        while ($existing_donor_arr = mysqli_fetch_array($sel_exist_donor)) {
        ?>
                      <option value="<?php echo $existing_donor_arr['donor_id'] ?>">
                        <?php echo $existing_donor_arr['donor_name'] ?>&nbsp;(CNIC:<?php echo $existing_donor_arr['donor_cnic']?> )
                      </option>
                      <?php
        }
        ?>
                    </select>
                  </form>

                  <!-- Initialize Select2 -->



                </div>
              </div>
              <br>
              <form action="data_entry_mgm.php" method="post" enctype="multipart/form-data">
                <?php 
                if (isset($_GET['donor_id'])) {
                  $donor_id  = $_GET['donor_id'];

                $selecting_donor_details = mysqli_query($conn, "SELECT * FROM donor_info WHERE donor_id = '".$donor_id."'");
                $donor_data = mysqli_fetch_array($selecting_donor_details);
                }
                ?>

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Donor Name</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Name" name="donor_name" value="<?php 
                    if (isset($_GET['donor_id'])) {
                    echo $donor_data['donor_name'];
                    }
                    ?>" required>
                      </div>
                    </div>
                  </div>
                  <!-- /.form-group -->

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Donor Phone Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter phone number" name="donor_phone"
                          value="<?php 
if (isset($_GET['donor_id'])) {
  echo $donor_data['donor_phone'];
}
?>" required>
                      </div>
                    </div>
                  </div>

                  <!-- <div class="col-md-4">
                <div class="form-group">
                  <label>Donor CNIC Pic</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa-regular fa-id-card"></i></span>
                    </div>
                    <input type="file" class="form-control" name="cnic_pic" required>
                  </div>
                </div>
              </div> -->
                </div>

                <div class="row">
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Donor Father Name</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter father name" name="donor_fname"
                          value="<?php
                     if (isset($_GET['donor_id'])) {
                     echo $donor_data['donor_fname'];
                     }
                     ?>" required>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Donor ID Card Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-regular fa-id-card"></i></span>
                        </div>
                        <input type="text" data-inputmask="'mask': '99999-9999999-9'" class="form-control"
                          name="donor_cnic" value="<?php
                    if (isset($_GET['donor_id'])) {
                    echo $donor_data['donor_cnic'];
                    }
                     ?>" placeholder="XXXXX-XXXXXXX-X" name="cnic" required>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Donor Address</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                        </div>
                        <textarea type="text" class="form-control" name="donor_address"
                          placeholder="Enter address here.." required><?php 
                            if (isset($_GET['donor_id'])) {
                            echo $donor_data['donor_address'];
                            }
                            ?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="row">
                <div class="col-md-12">
                    <label><h4>Donation Type</h4></label><br>
                    <div class="row">
                      <div class="col-md-2">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary5" class="selection_checkboxes" onclick="exist_form_visibility(1)" name="donation_type" value="cash">
                        <label for="checkboxPrimary5">
                          Cash
                        </label>
                      </div>
                      </div>
                      <div class="col-md-2">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary6" class="selection_checkboxes"  onclick="exist_form_visibility(2)" name="donation_type" value="items">
                        <label for="checkboxPrimary6">
                          Items
                        </label>
                      </div>
                      </div>
                    </div>
                </div>
            </div> -->


                <div class="row">
                  <div class="col-md-12">
                    <label>
                      <h4>Donation Type</h4>
                    </label><br>
                    <div class="row">
                      <div class="col-md-2">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary5" class="selection_radio" name="donation_type"
                            value="cash" onclick="exist_form_visibility(1)">
                          <label for="radioPrimary5">
                            Cash
                          </label>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary6" class="selection_radio" name="donation_type"
                            value="items" onclick="exist_form_visibility(2)">
                          <label for="radioPrimary6">
                            Items
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <br>
                <div class="row" id="cash_form2" style="display:none">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Cash Amount</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-money-bills"></i></span>
                        </div>
                        <input type="number" class="form-control cash_input" name="cash_amount"
                          placeholder="Enter Cash Amount">
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row" id="items_form2" style="display:none">
                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Item Name</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-layer-group"></i></span>
                        </div>
                        <input type="text" class="form-control item_inputs" name="item_name"
                          placeholder="Enter Item Name">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Item Quantity</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-layer-group"></i></span>
                        </div>
                        <input type="number" class="form-control item_inputs" name="item_quantity"
                          placeholder="Enter Item Quantity">
                      </div>
                    </div>
                  </div>
                  </div>


                </div>
                <br>

                <?php
           if (isset($_GET['donor_id'])) {
                   
            $sel_don_id = mysqli_query($conn,"SELECT donation_id FROM donations WHERE donor_id = '".$donor_data['donor_id']."'");
            $donation_id = mysqli_fetch_array($sel_don_id);
            ?>
                <input type="hidden" name="donation_id" value="<?php echo $donation_id['donation_id']?>">
                <?php
          }
            ?>
                <input type="hidden" name="donor_id" value="<?php echo $donor_data['donor_id']?>">

                <button class="btn btn-primary btn-block" name="add_existing" type="submit"
                  style="width:50%;margin:auto;">Add Donation</button>

              </form><br>
              <?php
}
?>

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