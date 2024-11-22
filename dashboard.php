<?php
include("config/connection.php");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nadir Welfare Foundation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Header -->

    <?php 
    include('body/header.php');
    ?>
    <!-- /.Header -->

   
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
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
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

        <?php
        $sel_num_donations = mysqli_query($conn,"SELECT * FROM donations");
        $tot_donations     = mysqli_num_rows($sel_num_donations);

        ?>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $tot_donations;?></h3>

                  <p>All Donations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="donors.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">

            <?php
        $sel_cash_donations     = mysqli_query($conn,"SELECT * FROM donations WHERE donation_type = 'cash'");
        $tot_cash_donations     = mysqli_num_rows($sel_cash_donations);

        ?>
              <!-- small box -->
              <div class="small-box bg-warning text-white">
                <div class="inner">
                  <h3><?php echo $tot_cash_donations;?></h3>

                  <p>No. of Cash Donations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-cash"></i>
                </div>
                <a href="donors.php?type=cash" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">

            <?php
        $sel_item_donations     = mysqli_query($conn,"SELECT * FROM donations WHERE donation_type = 'items'");
        $tot_item_donations     = mysqli_num_rows($sel_item_donations);

        ?>
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $tot_item_donations;?></h3>

                  <p>No. of Item Donations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="donors.php?type=items" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">

            <?php
        $sel_donors     = mysqli_query($conn,"SELECT * FROM donor_info");
        $tot_donors     = mysqli_num_rows($sel_donors);

        ?>
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $tot_donors;?></h3>

                  <p>Total Number of Donors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          
            <!-- ./col -->
       
          <!-- Main row -->
         
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->



            <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            
            <div class="card" style="background-color:#f7f7f7 !important;">
            <div class="card-header" style="background-color:#f7f7f7 !important;">
            <h3>Cash Donation Details</h3>
            </div>
              <!-- /.card-header -->
             
              <?php
              $sel_total_donated  = mysqli_query($conn,"SELECT *  FROM cash_donations");
              $donated_cash_arr   = mysqli_fetch_assoc($sel_total_donated);
              
              
              ?>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  
                  <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                      <h3 class="">Rs <?php echo $donated_cash_arr['donation_cash']?></h3>
                      
                      <span class="description-text">total Donated Cash</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                    <h3 class="">Rs <?php echo $donated_cash_arr['donated_cash']?></h3>
                      <span class="description-text">cash donated by us</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                    <h3 class="">Rs <?php echo intval($donated_cash_arr['donation_cash']) -  intval($donated_cash_arr['donated_cash'])?></h3>
                      <span class="description-text">Available Cash</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
               
                  
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>




        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background-color:#f7f7f7;">
                <h3 class="" >Item Donations Details</h3>

              
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="background-color:#efefef;">
                <table class="table table-head-fixed text-nowrap table-bordered">
                  <thead>
                    <tr style="background-color:#f7f7f7;">
                      <th>Sr#</th>
                      <th>Item Name</th>
                      <th>Available Quantity</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                  $sel_item_summary = mysqli_query($conn,"SELECT * FROM item_donations WHERE status = 1");
                  $i = 1;
                  while ($item_sum_arr = mysqli_fetch_array($sel_item_summary)) {
    
                  ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <?php
                       $sel_item_name = mysqli_query($conn,"SELECT item_name FROM donations WHERE donation_id = '".$item_sum_arr['donation_id']."' ");
                       $item_name     = mysqli_fetch_array($sel_item_name);
                       ?>
                      <td><?php echo $item_name['item_name'];?></td>
                      <td><?php echo intval($item_sum_arr['item_qty']) - intval($item_sum_arr['donated_qty']);?></td>
                    </tr>
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
          </div>
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
</body>

</html>