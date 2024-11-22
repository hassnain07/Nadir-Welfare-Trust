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


<script defer>
function exist_form_visibility(checked_checkbox) {
  console.log(document.getElementById("donate_cash2"));

  // Get the elements by ID
  var cashForm = document.getElementById("cash_form2");
  var donateCash = document.getElementById("donate_cash2");
  var itemsForm = document.getElementById("items_form2");
  var donateItem = document.getElementById("donate_item2");

  // Check if elements are found before accessing their styles
  if (checked_checkbox == 1) {
    if (itemsForm && itemsForm.style && itemsForm.style.display === "block") {
      itemsForm.style.display = "none";
      donateItem.style.display = "none";
    }
    if (cashForm && cashForm.style) {
      cashForm.style.display = "block";
      donateCash.style.display = "block";
    }
  } else if (checked_checkbox == 2) {
    if (cashForm && cashForm.style && cashForm.style.display === "block") {
      cashForm.style.display = "none";
      donateCash.style.display = "none";
    }
    if (itemsForm && itemsForm.style) {
      itemsForm.style.display = "block";
      donateItem.style.display = "block";
    }
  }
}

</script>



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

              <form action="donate_items_mgm.php" method="post" enctype="multipart/form-data" style="  <?php
          if (isset($_GET['Recipient_exists'])) {
           echo " display:none"; } else{ echo "display:block"; } ?>">
                <div class="row">
                  <div class="col-md-12 ">
                    <h2>Donation Form</h2>
                  </div>
                </div>
                <br>
                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Recipient Name</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Name" name="recipient_name" required>
                      </div>
                    </div>
                  </div>
                  <!-- /.form-group -->

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Recipient Phone Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter phone number" name="recipient_phone"
                          required>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Recipient CNIC Pic</label>
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
                      <label>Recipient Father Name</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter father name" name="recipient_fname"
                          required>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Recipient ID Card Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-regular fa-id-card"></i></span>
                        </div>
                        <input type="text" data-inputmask="'mask': '99999-9999999-9'" class="form-control"
                          name="recipient_cnic" placeholder="XXXXX-XXXXXXX-X" name="cnic" required>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Recipient Address</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                        </div>
                        <textarea type="text" class="form-control" name="recipient_address"
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
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label>Cash Amount</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-money-bills"></i></span>
                        </div>
                        <input type="number" class="form-control cash_input" id="cash_amount" name="cash_amount"
                          placeholder="Enter Cash Amount">
                      </div>
                    </div>
                  </div>
                  <?php
                $sel_cash = mysqli_query($conn,"SELECT * FROM cash_donations");
                $cash_arr = mysqli_fetch_array($sel_cash);
                
                ?>

                  <div class="col-md-3 col-sm-6">
                    <div class="info-box">
                      <span class="info-box-icon bg-primary"><i class="fa-solid fa-money-bills"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Available Cash</span>
                        <span class="info-box-number" id="available_amount">
                          <?php 
                                    
                                    if (isset($cash_arr['donation_cash'])) {
                                        echo intval($cash_arr['donation_cash'])- intval($cash_arr['donated_cash']);
                                    }
                                    else {
                                        echo "No cash available";
                                    }
                                    
                                    ?>
                        </span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                  </div>
                  <!-- /.info-box -->

                </div>

                <div class="row" id="items_form" style="display:none">
                  <div class="row">
                    <div class="col-md-6">




                      <div class="form-group">
                        <label>Select Item to donate</label>
                        <div class="input-group">
                          <select name="selected_item" id="itemSelect" class="form-control" onchange="showQuantity()">
                            <option value="">__Select Items__</option>

                            <?php
    $sel_items = mysqli_query($conn,"SELECT * FROM item_donations WHERE status = 1");
    
    while ($items_arr = mysqli_fetch_array($sel_items)) {

    $sel_item_donations  = mysqli_query($conn,'SELECT * FROM donations WHERE donation_id = "'.$items_arr['donation_id'].'"');
    $donation_items_arr  = mysqli_fetch_array($sel_item_donations);
    ?>
                            <option value="<?php echo $items_arr['id']?>"
                              data-quantity="<?php echo $items_arr['item_qty'] - $items_arr['donated_qty']?>">
                              <?php echo ucfirst($donation_items_arr['item_name'])?> (
                              <?php echo $items_arr['item_qty'] - $items_arr['donated_qty']?> Units Available)
                            </option>
                            <?php
    }
    ?>
                          </select>
                          <input type="hidden" name="available_quantity" id="selectedQuantity">
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
                          <input type="number" class="form-control cash_input" id="sel_quantity"
                            name="selected_quantity" placeholder="Enter Items Qunatity">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <br>


                <button class="btn btn-primary btn-block" name="add_donated_by_us" type="submit" id="donate_item"
                  onclick="return check_item_qty()" style="width:50%;margin:auto;display:none">Donate Item</button>
                <button class="btn btn-primary btn-block" name="add_donated_by_us" type="submit" id="donate_cash"
                  onclick="return check_amount()" style="width:50%;margin:auto;display:none">Donate Cash</button>
                <br>
              </form>
              <center><a href="donate_items.php?Recipient_exists=true" name="add_donation" type="" style="margin:auto;  <?php
          if (isset($_GET['Recipient_exists'])) {
           echo " display:none"; } else{ echo "display:block" ; } ?>">Donate to Existing Recipient</a></center>


              <?php 
if (isset($_GET['Recipient_exists'])) {
    

   
    $selecting_Recipient = mysqli_query($conn, "SELECT recipient_info.*, donated_items.*
    FROM recipient_info
    INNER JOIN donated_items ON recipient_info.recipient_id = donated_items.recipient_id");


    
  ?>
              <div class="row">
                <div class="col-md-9">
                  <h2>Donation Form</h2>
                </div>
                <div class="col-md-3">




                  <!-- Your form with the modified select element -->
                  <form action="donate_items.php?Recipient_exists=true" method="get">
                    <input type="hidden" name="Recipient_exists" value="true">
                    <span><label>Select Recipient</label></span>
                    <select name="recipient_id" class="form-control js-example-basic-single2 "
                      onchange="this.form.submit()">
                      <option value="" class="form-control">__Select Recipient Name__</option>
                      <?php
        $sel_exist_Recipient = mysqli_query($conn, "SELECT * FROM recipient_info");
        while ($existing_Recipient_arr = mysqli_fetch_array($sel_exist_Recipient)) {
        ?>
                      <option value="<?php echo $existing_Recipient_arr['recipient_id'] ?>">
                        <?php echo $existing_Recipient_arr['recipient_name']?>&nbsp;(CNIC:<?php echo $existing_Recipient_arr['recipient_cnic']?> )
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
              <form action="donate_items_mgm.php" method="post" enctype="multipart/form-data">
                <?php 
                if (isset($_GET['recipient_id'])) {
                  $recipient_id  = $_GET['recipient_id'];

                $selecting_Recipient_details = mysqli_query($conn, "SELECT * FROM recipient_info WHERE recipient_id = '".$recipient_id."'");

                $recipient_data = mysqli_fetch_array($selecting_Recipient_details);
                }
                ?>

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Recipient Name</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Name" name="recipient_name" value="<?php 
                    if (isset($_GET['recipient_id'])) {
                    echo $recipient_data['recipient_name'];
                    }
                    ?>" required>
                      </div>
                    </div>
                  </div>
                  <!-- /.form-group -->

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Recipient Phone Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter phone number" name="recipient_phone"
                          value="<?php 
if (isset($_GET['recipient_id'])) {
  echo $recipient_data['recipient_phone'];
}
?>" required>
                      </div>
                    </div>
                  </div>

                  <!-- <div class="col-md-4">
                <div class="form-group">
                  <label>Recipient CNIC Pic</label>
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
                      <label>Recipient Father Name</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter father name" name="recipient_fname"
                          value="<?php
                     if (isset($_GET['recipient_id'])) {
                     echo $recipient_data['recipient_fname'];
                     }
                     ?>" required>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Recipient ID Card Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-regular fa-id-card"></i></span>
                        </div>
                        <input type="text" data-inputmask="'mask': '99999-9999999-9'" class="form-control"
                          name="recipient_cnic" value="<?php
                    if (isset($_GET['recipient_id'])) {
                    echo $recipient_data['recipient_cnic'];
                    }
                     ?>" placeholder="XXXXX-XXXXXXX-X" name="cnic" required>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Recipient Address</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                        </div>
                        <textarea type="text" class="form-control" name="recipient_address"
                          placeholder="Enter address here.." required><?php 
                            if (isset($_GET['recipient_id'])) {
                            echo $recipient_data['recipient_address'];
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
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label>Cash Amount</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-money-bills"></i></span>
                        </div>
                        <input type="number" class="form-control cash_input" id="cash_amount2" name="cash_amount"
                          placeholder="Enter Cash Amount">
                      </div>
                    </div>
                  </div>
                  <?php
                $sel_cash = mysqli_query($conn,"SELECT * FROM cash_donations");
                $cash_arr = mysqli_fetch_array($sel_cash);
                
                ?>

                  <div class="col-md-3 col-sm-6">
                    <div class="info-box">
                      <span class="info-box-icon bg-primary"><i class="fa-solid fa-money-bills"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Available Cash</span>
                        <span class="info-box-number" id="available_amount2">
                          <?php
                                     if (isset($cash_arr['donation_cash'])) {
                                      
                                        echo intval($cash_arr['donation_cash']) - intval($cash_arr['donated_cash']);
                                    }
                                    else {
                                        echo "No cash available";
                                    }
                                     ?>
                        </span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                  </div>
                  <!-- /.info-box -->

                </div>






                <div class="row" id="items_form2" style="display:none">
               
                  <div class="row">
                    <div class="col-md-6">

                      <div class="form-group">
                        <label>Select Item to donate</label>
                        <div class="input-group">
                          <select name="selected_item" id="itemSelect2" class="form-control"
                            onchange="existShowQuantity()">
                            <option>__Select Items__</option>

                            <?php
    $sel_items = mysqli_query($conn,"SELECT * FROM item_donations WHERE status = 1");
    
    
    while ($items_arr = mysqli_fetch_array($sel_items)) {

    $sel_item_donations  = mysqli_query($conn,'SELECT * FROM donations WHERE donation_id = "'.$items_arr['donation_id'].'"');
    $donation_items_arr  = mysqli_fetch_array($sel_item_donations);
    ?>
    
                            <option value="<?php echo $items_arr['id']?>"
                              data-quantity="<?php echo int($items_arr['item_qty']) - int($items_arr['donated_qty'])?>">
                              <?php echo ucfirst($donation_items_arr['item_name'])?> (
                              <?php echo (int($items_arr['item_qty']) - int($items_arr['donated_qty']))?> Units Available)
                            </option>
                            <?php
    }
    ?>
                          </select>
                          <input type="hidden" name="available_quantity" id="selectedQuantity2">
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
                          <input type="number" class="form-control cash_input" id="sel_quantity2"
                            name="selected_quantity" placeholder="Enter Items Qunatity">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <br>

                <input type="hidden" name="recipient_id" value="<?php echo $recipient_data['recipient_id']?>">
                
                <button class="btn btn-primary btn-block" name="add_existing_donated" type="submit" id="donate_item2"
                  onclick="return exist_check_item_qty()" style="width:50%;margin:auto;display:none">Donate
                  Item</button>
                  <button class="btn btn-primary btn-block" name="add_existing_donated" type="submit" id="donate_cash2"
                 onclick="return exist_cash_amount()" style="width:50%;margin:auto;display:none">Donate Cash</button>
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
  

    function check_amount() {

      let entered_amount = parseInt(document.getElementById('cash_amount').value);
      let available_amount = parseInt(document.getElementById('available_amount').innerHTML);

      if (entered_amount > available_amount) {
        alert('Donated amount cannot be greater than available amount');
        return false;
      }

    }
    function exist_cash_amount() {

      let entered_amount = parseInt(document.getElementById('cash_amount2').value);
      let available_amount = parseInt(document.getElementById('available_amount2').innerHTML);

      if (entered_amount > available_amount) {
        alert('Donated amount cannot be greater than availble amount');
        return false;
      }

    }
    function check_item_qty() {
      let entered_quantity = parseInt(document.getElementById('sel_quantity').value);
      let available_quantity = parseInt(document.getElementById('selectedQuantity').value);

      // Check if entered_quantity is a valid number
      if (isNaN(entered_quantity)) {
        alert('Please enter a valid quantity.');
        return false;
      }

      // Check if entered_quantity is greater than available_quantity
      if (entered_quantity > available_quantity) {
        alert('Donated quantity cannot be greater than available quantity');
        return false;
      }

      // If everything is valid, return true
      return true;
    }
    function exist_check_item_qty() {
      let entered_quantity = parseInt(document.getElementById('sel_quantity2').value);
      let available_quantity = parseInt(document.getElementById('selectedQuantity2').value);

      if (entered_quantity > available_quantity) {

        alert('Donated quantity cannot be greater than availble quantity');
        return false;
      }
    }

    function showQuantity() {
      var selectElement = document.getElementById("itemSelect");
      var selectedOption = selectElement.options[selectElement.selectedIndex];

      if (selectedOption.dataset.quantity !== undefined) {
        var quantity = selectedOption.dataset.quantity;

        // Set the quantity value in the hidden input field
        document.getElementById("selectedQuantity").value = quantity;
      }
    }
    function existShowQuantity() {
      var selectElement = document.getElementById("itemSelect2");
      var selectedOption = selectElement.options[selectElement.selectedIndex];

      if (selectedOption.dataset.quantity !== undefined) {
        var quantity = selectedOption.dataset.quantity;

        // Set the quantity value in the hidden input field
        document.getElementById("selectedQuantity2").value = quantity;
      }
    }

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

        if (document.getElementById("items_form").style.display === "block" && document.getElementById("donate_item").style.display === "block") {
          document.getElementById("items_form").style.display = "none";
          document.getElementById("donate_item").style.display = "none";
        }
        document.getElementById("cash_form").style.display = "block";
        document.getElementById("donate_cash").style.display = "block";



      }
      else if (checked_checkbox === 2) {

        if (document.getElementById("cash_form").style.display === "block" && document.getElementById("donate_cash").style.display === "block") {
          document.getElementById("cash_form").style.display = "none";
          document.getElementById("donate_cash").style.display = "none";
        }
        document.getElementById("items_form").style.display = "block";
        document.getElementById("donate_item").style.display = "block";



      }

    }
   
  </script>

  <script>
    $(document).ready(function () {
      $('.js-example-basic-single2').select2();
    });
  </script>
</body>

</html>