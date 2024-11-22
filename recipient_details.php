<?php
include('config/connection.php');

if (isset($_GET['action']) && $_GET['action'] == "delete_recipient") {
    
    $del_qry = mysqli_query($conn,"DELETE FROM donated_items WHERE donation_id = '".$_GET['donation_id']."'");


    if ($del_qry) { 

    $okmsg = base64_encode(" donations are deleted successfully");   
    header("Location:recipient_details.php?okmsg=$okmsg");
    exit;

    } else {

    $errormsg = base64_encode("\donations are Not deleted successfully");   
    header("Location:recipient_details.php?errormsg=$errormsg");
    exit;

    }
}

// if (isset($_POST['update_donor'])) {
    
//     $update_qry  = mysqli_query($conn,"UPDATE donor_info")

// }





?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nadir Welfare Foundation</title>  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">


    <!-- header start -->
    <?php include('body/header.php')?>
    <!-- header end -->


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
            <div class="col-sm-6">
              <h1>Donation Details</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">

            <?php
        if (isset($_GET['type'])) {
          
          ?>


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Available donations and their donors are shown here</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Sr#</th>
                      <th>Recipient Name</th>
                      <th>Recipient CNIC</th>
                      <th>Recipient Phone</th>
                      <th>Donation Type</th>
                      <th>Donation Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $sql = "SELECT donated_items.*, recipient_info.* FROM donated_items
                    INNER JOIN recipient_info ON donated_items.recipient_id = recipient_info.recipient_id WHERE donation_type = '".$_GET['type']."'";

                    // Prepare and execute the query
                    $result = mysqli_query($conn, $sql);
                    $i = 1;

                    while ($donation_data = mysqli_fetch_array($result)) {


                    
                ?>

                    <tr>
                      <td>
                        <?php echo $i;?>
                      </td>
                      <td>
                        <?php echo $donation_data['donor_name']?>
                      </td>
                      <td>
                        <?php echo $donation_data['donor_cnic']?>
                      </td>
                      <td>
                        <?php echo $donation_data['donor_phone']?>
                      </td>
                      <td>
                        <?php echo $donation_data['donation_type']?>
                      </td>
                      <td>
                        <?php echo $donation_data['donation_date']?>
                      </td>
                      <td>
                        <a href="donors.php?donor_id=<?php echo $donation_data['donor_id']?>&amp;action=delete_donor"
                          title="Delete" class="btn" onclick="javascript:return confirm('Are you sure?')"><i
                            class="fa-solid fa-trash-can"></i></a>

                        <a href="#" title="Update" class="btn" data-toggle="modal"
                          data-target="#modal-lg<?php echo $donation_data['donor_id']?>"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                        <a href="donation_details.php?donation_id=<?php echo $donation_data['donation_id']?>"
                          title="View Details" class="btn"><i class="fa-solid fa-rectangle-list"></i></a>
                        <a href="javascript:void(0);"
                          onclick="printDonation(<?php echo $donation_data['donation_id']?>);" title="Print information"
                          class="btn">
                          <i class="fa-solid fa-print"></i>
                        </a>
                      </td>
                    </tr>

                    <!-- Your button code -->


                    <!-- JavaScript function -->


                    <div class="modal fade" id="modal-lg<?php echo $donation_data['donor_id']?>">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Update Donor</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="data_entry_mgm.php" method="post" enctype="multipart/form-data">
                              <div class="row">

                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Donor Name</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                      </div>
                                      <input type="text" class="form-control" placeholder="Enter Name" name="donor_name"
                                        value="<?php echo $donation_data['donor_name']?>" required>
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
                                      <input type="text" class="form-control" placeholder="Enter phone number"
                                        name="donor_phone" value="<?php echo $donation_data['donor_phone']?>" required>
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
                                      <input type="file" class="form-control" name="cnic_pic">
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
                                      <input type="text" class="form-control" placeholder="Enter father name"
                                        name="donor_fname" value="<?php echo $donation_data['donor_fname']?>" required>
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
                                        name="donor_cnic" placeholder="XXXXX-XXXXXXX-X"
                                        value="<?php echo $donation_data['donor_cnic']?>" required>
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
                                        placeholder="Enter address here.."
                                        required><?php echo $donation_data['donor_address']?></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <label>
                                    <h4>Donation Type</h4>
                                  </label><br>
                                  <div class="row">
                                    <div class="col-md-2">
                                      <div class="icheck-primary d-inline">
                                        <?php 
        if ($donation_data['donation_type'] == "cash") {
           
        
        ?>

                                        <input type="checkbox" id="checkboxPrimary3" class="selection_checkboxes"
                                          onclick="form_visibility(1)" name="donation_type" value="cash" checked>
                                        <?php 
        }else {
            ?>
                                        <input type="checkbox" id="checkboxPrimary3" class="selection_checkboxes"
                                          onclick="form_visibility(1)" name="donation_type" value="cash">

                                        <?php
        }
    ?>
                                        <label for="checkboxPrimary3">
                                          Cash
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="icheck-primary d-inline">

                                        <?php 
        if ($donation_data['donation_type'] == "items") {
           
        
        ?>

                                        <input type="checkbox" id="checkboxPrimary4" class="selection_checkboxes"
                                          onclick="form_visibility(2)" name="donation_type" value="items" checked>
                                        <?php 
        }else {
            ?>
                                        <input type="checkbox" id="checkboxPrimary4" class="selection_checkboxes"
                                          onclick="form_visibility(2)" name="donation_type" value="items">

                                        <?php
        }
    ?>


                                        <label for="checkboxPrimary4">
                                          Items
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <br>

                              <?php 
        if ($donation_data['donation_type'] == "cash") {
           
        
        ?>

                              <div class="row" id="cash_form" style="display:block">
                                <?php 
        }else {
            ?>
                                <div class="row" id="cash_form" style="display:none">

                                  <?php
        }
    ?>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Cash Amount</label>
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa-solid fa-money-bills"></i></span>
                                        </div>
                                        <input type="number" class="form-control cash_input" name="cash_amount"
                                          value="<?php echo $donation_data['cash_amount']?>"
                                          placeholder="Enter Cash Amount">
                                      </div>
                                    </div>
                                  </div>

                                </div>
                                <?php 
        if ($donation_data['donation_type'] == "items") {
           
        
        ?>

                                <div class="row" id="items_form" style="display:block">
                                  <?php 
        }else {
            ?>
                                  <div class="row" id="items_form" style="display:none">

                                    <?php
        }
    ?>

                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Item Name</label>
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i
                                                  class="fa-solid fa-layer-group"></i></span>
                                            </div>
                                            <input type="text" class="form-control item_inputs" name="item_name"
                                              value="<?php echo $donation_data['item_name']?>"
                                              placeholder="Enter Item Name">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Item Quantity</label>
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i
                                                  class="fa-solid fa-layer-group"></i></span>
                                            </div>
                                            <input type="number" class="form-control item_inputs" name="item_quantity"
                                              value="<?php echo $donation_data['item_quantity']?>"
                                              placeholder="Enter Item Quantity">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Item Description</label>
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fa-solid fa-comment"></i></span>
                                            </div>
                                            <textarea type="number" class="form-control item_inputs"
                                              name="item_description" value=""
                                              placeholder="Enter Item Description"><?php echo $donation_data['item_description']?></textarea>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                  <br>



                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" name="update_donation" class="btn btn-primary">Update </button>
                                  <input type="hidden" name="donor_id" value="<?php echo $donation_data['donor_id']?>"
                                    id="">
                            </form>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>

                    <?php
                $i++;
                    }
                ?>




                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



            <?php

        }else {
          
        
        
        
        ?>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Available donations and their donors are shown here</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Sr#</th>
                      <th>Recipient Name</th>
                      <th>Recipient CNIC</th>
                      <th>Recipient Phone</th>
                      <th>Donation Type</th>
                      <th>Donation Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $sql = "SELECT donated_items.*, recipient_info.* FROM donated_items
                    INNER JOIN recipient_info ON donated_items.recipient_id = recipient_info.recipient_id";

                    // Prepare and execute the query
                    $result = mysqli_query($conn, $sql);
                    $i = 1;

                    while ($donation_data = mysqli_fetch_array($result)) {


                    
                ?>

                    <tr>
                      <td>
                        <?php echo $i;?>
                      </td>
                      <td>
                        <?php echo $donation_data['recipient_name']?>
                      </td>
                      <td>
                        <?php echo $donation_data['recipient_cnic']?>
                      </td>
                      <td>
                        <?php echo $donation_data['recipient_phone']?>
                      </td>
                      <td>
                        <?php echo $donation_data['donation_type']?>
                      </td>
                      <td>
                        <?php echo $donation_data['donation_date']?>
                      </td>
                      <td>
                        <a href="recipient_details.php?donation_id=<?php echo $donation_data['donation_id']?>&amp;action=delete_recipient"
                          title="Delete" class="btn" onclick="javascript:return confirm('Are you sure?')"><i
                            class="fa-solid fa-trash-can"></i></a>

                        <a href="#" title="Update" class="btn" data-toggle="modal"
                          data-target="#modal-lg<?php echo $donation_data['recipient_id']?>"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                        <a href="recipient_info.php?recipient_id=<?php echo $donation_data['donation_id']?>"
                          title="View Details" class="btn"><i class="fa-solid fa-rectangle-list"></i></a>
                        <a href="javascript:void(0);"
                          onclick="printDonation(<?php echo $donation_data['recipient_id']?>);" title="View Details"
                          class="btn">
                          <i class="fa-solid fa-print"></i>
                        </a>
                      </td>
                    </tr>

                    <!-- Your button code -->


                    <!-- JavaScript function -->


                    <div class="modal fade" id="modal-lg<?php echo $donation_data['recipient_id']?>">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Update Recipient Info</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="donate_items_mgm.php" method="post" enctype="multipart/form-data">
                              <div class="row">

                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Recipient Name</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                      </div>
                                      <input type="text" class="form-control" placeholder="Enter Name"
                                        name="recipient_name" value="<?php echo $donation_data['recipient_name']?>"
                                        required>
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
                                      <input type="text" class="form-control" placeholder="Enter phone number"
                                        name="recipient_phone" value="<?php echo $donation_data['recipient_phone']?>"
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
                                      <input type="file" class="form-control" name="cnic_pic">
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
                                      <input type="text" class="form-control" placeholder="Enter father name"
                                        name="recipient_fname" value="<?php echo $donation_data['recipient_fname']?>"
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
                                        name="recipient_cnic" placeholder="XXXXX-XXXXXXX-X"
                                        value="<?php echo $donation_data['recipient_cnic']?>" required>
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
                                        placeholder="Enter address here.."
                                        required><?php echo $donation_data['recipient_address']?></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <br>







                          </div>
                          <br>



                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="update_recipient" class="btn btn-primary">Update </button>
                            <input type="hidden" name="recipient_id" value="<?php echo $donation_data['recipient_id']?>"
                              id="">
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
              </div>

              <?php
                $i++;
                    }
                ?>




              </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <?php
        }
          ?>

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
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
  <!-- ./wrapper -->





  <!-- jQuery -->

  <script>
    function printDonation(donationId) {
      // Open a new window or tab with the "print.php" file and donation_id parameter
      window.open('print_recipient_info.php?donation_id=' + donationId, '_parent');
    }
  </script>
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script src="https://kit.fontawesome.com/20db2967c4.js" crossorigin="anonymous"></script>
  <script src="dist/js/demo.js"></script>
  <script src="https://kit.fontawesome.com/20db2967c4.js" crossorigin="anonymous"></script>
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
  <script>
    $(":input").inputmask();



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
      var forms = document.querySelectorAll('.selection_checkboxes');



      if (checked_checkbox === 1) {
        if (document.getElementById("items_form").style.display == "block") {
          document.getElementById("items_form").style.display = "none";
        }
        document.getElementById("cash_form").style.display = "block";


      }
      else if (checked_checkbox === 2) {
        if (document.getElementById("cash_form").style.display == "block") {
          document.getElementById("cash_form").style.display = "none";
        }
        document.getElementById("items_form").style.display = "block";


      }

    }
  </script>
  <!-- page script -->
  <!-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> -->
</body>

</html>