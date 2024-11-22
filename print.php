<?php include('config/connection.php');
$don_id   =  $_GET['donation_id'];


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | User Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href=" plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=" dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    .list-item{
        margin:20px 100px;
    }
    .items_list li{
        margin-right:180px; 
    }
  </style>


</head>
<body class="hold-transition sidebar-mini">

<div class="print_page">
    <br>
    
    <div class="container">
     <center>   
        <img src="Logo/logo.jpeg" alt="" style="height:40px" width="50px" height="50px">&nbsp;&nbsp;
        <h1 align="center" style="display:inline; position:relative; top:10px;">Nadir Welfare Foundation</h1>
    </center>
    <br><br>
<div class="row">
    <div class="col-md-12">

    <h1 class="text-center">Donation Details</h1>
    <br><br>

    </div>
</div>
   <center>
    <?php 
    $sel_print_info  =  mysqli_query($conn,"SELECT donations.*, donor_info.* FROM donations
    INNER JOIN donor_info ON donations.donor_id = donor_info.donor_id WHERE donation_id = '".$don_id."'");

    $print_info_arr  = mysqli_fetch_array($sel_print_info);

    ?>
   
           <table width="800px" cellpadding="10px" >
            <tr align="center" >
                <td><b>Donor Name: </b> <?php echo $print_info_arr['donor_name']?></td>
                <td><b>Donor Phone Number: </b> <?php echo $print_info_arr['donor_phone']?></td>
            </tr>
            
            <tr align="center">
                <td><b>Donor CNIC: </b> <?php echo $print_info_arr['donor_cnic']?></td>
                <td><b>Donation Date: </b> <?php echo $print_info_arr['donation_date']?></td>
            </tr>
            <tr align="center">
                <td rowspan="2"><b>Donor Address: </b></td>
                <td><?php echo $print_info_arr['donor_address']?></td>
            </tr>
           </table>
            
<br><br>

<?php
           if ($print_info_arr['donation_type'] == "cash") {
            ?>
           <table width="800px" border="">
              <thead align="center">
                <th>Donation Type:</th>
                <th>Cash Amount:</th>
              </thead>
              <tbody>
                <tr align="center">
                    <td><?php echo $print_info_arr['donation_type']?></td>
                    <td><?php echo $print_info_arr['cash_amount']?></td>
                </tr>
              </tbody>
           </table>

           <?php
           }else {
            ?>
           <table width="800px" border="">
              <thead align="center">
                <th>Donation Type:</th>
                <th>Item Name:</th>
                <th>Item Quantity:</th>
              </thead>
              <tbody>
                <tr align="center">
                    <td><?php echo $print_info_arr['donation_type']?></td>
                    <td><?php echo $print_info_arr['item_name']?></td>
                    <td><?php echo $print_info_arr['item_quantity']?></td>
                </tr>
              </tbody>
           </table>
           <?php
           }
           ?>
           <!-- 
            <ul style="list-style:none;display:flex;" class="items_list">
                <li class="list-item" ><b>Donation Type</b>: </li>
                <li class="list-item" ><b>Item Name</b>: </li>
            </ul>

            <ul style="list-style:none;display:flex;" class="items_list">
                <li class="list-item" ><b>Item Quantity </b>: </li>
                <li class="list-item" ><b> Donation Date </b>: <?php echo $print_info_arr['donation_date']?></li>
            </ul>
           

            <ul style="list-style:none;display:flex;" class="items_list">
                <li class="list-item" ><b>Donation Type</b>: <?php echo $print_info_arr['donation_type']?></li>
                <li class="list-item" ><b>Cash Amount</b>: </li>
            </ul>

            -->
            
        </div>
    
   </center>
</div>
   
<script>
    // window.location.href = "donors.php";
    window.print();
  </script>
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
