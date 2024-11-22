<?php include('config/connection.php');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nadir Welfare Foundation</title>  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href=" plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=" dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 

  <!-- header start  -->
 
  <?php include('body/header.php')?>

  <!-- header end  -->
 

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
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <?php
                $selecting_don_details  = mysqli_query($conn, "SELECT * FROM donations WHERE donation_id = '".$_GET['donation_id']."'");
                $donation_details_arr   = mysqli_fetch_array($selecting_don_details);

                $selecting_donor_details  = mysqli_query($conn, "SELECT * FROM donor_info WHERE donor_id = '".$donation_details_arr['donor_id']."'");
                $donor_details_arr   = mysqli_fetch_array($selecting_donor_details);
                ?>

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid "
                       src="<?php echo $donor_details_arr['cnic_pic']?>"
                       alt="User profile picture"
                       style="width:180px"
                       >
                </div>

                <h3 class="profile-username text-center"><?php echo ucfirst($donor_details_arr['donor_name'])?></h3>

                <p class="text-muted text-center"><?php echo ucfirst($donor_details_arr['donor_address'])?></p>

             
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-6">
                        <b>Donor Phone Number :&nbsp;&nbsp;</b><?php echo $donor_details_arr['donor_phone']?>
                        </div>
                        <div class="col-md-6">
                        <b>Donor CNIC :&nbsp;&nbsp;</b> <?php echo $donor_details_arr['donor_cnic']?>
                        </div>
                    </div>
                  </li>
                  <?php
                  
                  if ( $donation_details_arr['donation_type'] == "cash") {
                
                  ?>
                  <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-6">
                        <b>Donation Type :&nbsp;&nbsp;</b> <?php echo ucfirst($donation_details_arr['donation_type'])?>
                        </div>
                        <div class="col-md-6">
                        <b>Cash Amount :&nbsp;&nbsp;</b>  <?php echo $donation_details_arr['cash_amount']?>
                        </div>
                    </div>
                  </li>
                  <?php
                  }elseif ($donation_details_arr['donation_type'] == "items") {
                
                  ?>
                  <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-6">
                        <b>Donation Type :&nbsp;&nbsp;</b> <?php echo ucfirst($donation_details_arr['donation_type'])?>
                        </div>
                    </div>
                  </li>

                  <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-6">
                        <b>Item Name :&nbsp;&nbsp;</b> <?php echo ucfirst($donation_details_arr['item_name'])?>
                        </div>
                        <div class="col-md-6">
                        <b>Item Quantity :&nbsp;&nbsp;</b><?php echo ucfirst($donation_details_arr['item_quantity'])?>
                        </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-12">
                        <b>Item Description :&nbsp;&nbsp;</b> 
                        <p><?php echo ucfirst($donation_details_arr['item_description'])?></p>

                        </div>
                    </div>
                  </li>
                        <?php
                  }
                        ?>

                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

    
            <!-- /.card -->
          </div>
          <!-- /.col -->
        
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
   
  </div>
  <!-- /.content-wrapper -->
 

</div>
<!-- ./wrapper -->
 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
<!-- jQuery -->
<script src=" plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src=" plugins/bootstr bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="di adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="di demo.js"></script>
<!-- jQuery -->
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
</body>
</html>
