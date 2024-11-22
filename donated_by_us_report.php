<?php
include("config/connection.php");

if (isset($_POST['get_report'])) {
    $from = mysqli_real_escape_string($conn, $_POST['from_date']);
    $to   = mysqli_real_escape_string($conn, $_POST['to_date']);
    $type = mysqli_real_escape_string($conn, $_POST['donation_type']);

    $condition = ($type == "All") ? "" : " AND donation_type = '$type'";
    
    // Assuming your 'donation_date' field is of type DATE or DATETIME
    $sel_query = "SELECT * FROM donated_items WHERE donation_date BETWEEN '$from' AND '$to'$condition";
    $run_sel   = mysqli_query($conn, $sel_query);
    
    if ($run_sel) {

        $donate_report_arr = mysqli_fetch_array($run_sel);

    

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
  <link rel="stylesheet" href=" plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=" dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

 


</head>
<body class="hold-transition sidebar-mini">

<div class="print_page">
    <br>
   
    <center>   
        <img src="Logo/header.jpeg" alt="" style="height:200px; width: 100%; margin-bottom:100px;">
    </center>
    <br><br>
<div class="row">
    <div class="col-md-12">

    <h1 class="text-center"><?php echo ucfirst($type); ?> Donation Report</h1>
    <br>

    </div>
</div>
   <center>
 
   
           <!-- <table width="800px" cellpadding="10px" >
            <tr align="center" >
                <td><b>Donor Name: </b> <?php?></td>
                <td><b>Donor Phone Number: </b> <?php  ?></td>
            </tr>
            
            <tr align="center">
                <td><b>Donor CNIC: </b> <?php  ?></td>
                <td><b>Donation Date: </b> <?php  ?></td>
            </tr>
            <tr align="center">
                <td rowspan="2"><b>Donor Address: </b></td>
                <td><?php ?></td>
            </tr>
           </table>
             -->
<br><br>

<?php
           if ($type == "cash") {

            ?>
           <table width="800px" border="">
              <thead align="center">
                <th>Donation Type:</th>
                <th>Cash Amount:</th>
                <th>Donation Date:</th>
              </thead>
              <tbody>

              <?php
                
                    // Check if there are any results
                    if (mysqli_num_rows($run_sel) > 0) {
                        // Loop through the results
                        while ($don_report_arr = mysqli_fetch_array($run_sel)) {



                            ?>

<tr align="center">
                    <td><?php echo $don_report_arr['donation_type'] . '<br>'; ?></td>
                    <td><?php echo $don_report_arr['cash_amount'] . '<br>';?></td>
                    <td><?php echo $don_report_arr['donation_date'] . '<br>';?></td>

                </tr>


<?php
                            
                        }
                    } else {
                        echo "NO donations Found in this Time period";
                    }
                

              ?>
                
              </tbody>
           </table>

           <?php
           }elseif($type == "items") {
            ?>
           <table width="800px" border="">
              <thead align="center">
                <th>Donation Type:</th>
                <th>Item Name:</th>
                <th>Item Quantity:</th>
                <th>Donation date:</th>
              </thead>
              <tbody>
              <?php
                
                // Check if there are any results
                if (mysqli_num_rows($run_sel) > 0) {
                    // Loop through the results
                    while ($don_report_arr = mysqli_fetch_array($run_sel)) {



                        ?>

<tr align="center">
                <td><?php echo $don_report_arr['donation_type'] . '<br>';?></td>
                <td><?php echo $don_report_arr['item_name'] . '<br>'; ?></td>
                <td><?php echo $don_report_arr['item_quantity'] . '<br>';?></td>
                <td><?php echo $don_report_arr['donation_date'] . '<br>';?></td>
            </tr>


<?php
                        
                    }
                } else {
                    echo "NO donations Found in this Time period";
                }
            

          ?>
              </tbody>
           </table>
           <?php
           }elseif ($type == "All") {

           
            ?>
               <table width="800px" border="">
              <thead align="center">
                <th>Donation Type:</th>
                <th>Cash Amount:</th>
                <th>Item Name:</th>
                <th>Item Quantity:</th>
                <th>Donation date:</th>
              </thead>
              <tbody>
              <?php
                
                // Check if there are any results
                if (mysqli_num_rows($run_sel) > 0) {
                    // Loop through the results
                    while ($don_report_arr = mysqli_fetch_array($run_sel)) {



                        ?>

<tr align="center">
                <td><?php echo $don_report_arr['donation_type'] . '<br>';?></td>
                <td><?php echo $don_report_arr['cash_amount'] . '<br>';?></td>    
                <td><?php echo $don_report_arr['item_name'] . '<br>'; ?></td>
                <td><?php echo $don_report_arr['item_quantity'] . '<br>';?></td>
                <td><?php echo $don_report_arr['donation_date'] . '<br>';?></td>
            </tr>


<?php
                        
                    }
                } else {
                    echo "NO donations Found in this Time period";
                }
            

          ?>
              </tbody>
           </table>

<?php
           }
           ?>
           
           <center>   
        <img src="Logo/footer.jpeg" alt="" style="height:200px; width: 100%; margin-top:500px;">
    </center>
        
    
   </center>
</div>
   
<script>
    // window.location.href = "donors.php";
    // window.print();
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

<?php

} else {
    // Handle the case where the query fails
    echo "Error in query: " . mysqli_error($conn);
}

    exit;
}
?>
