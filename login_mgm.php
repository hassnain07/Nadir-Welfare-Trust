<?php
include("config/connection.php");

  ///////...........Sign In Admin..........//////////

if(isset($_POST['admin_login'])){

    $name = $_POST['admin_name'];
    $pass = $_POST['admin_pass'];

    $sel_qry = "SELECT * FROM admins WHERE admin_name = '".$name."' AND admin_password = $pass";
    $run_sel = mysqli_query($conn,$sel_qry);
    
    $admin_data_arr = mysqli_fetch_array($run_sel);
    
    $records = mysqli_num_rows($run_sel);
    
    if($records > 0){

        $_SESSION['admin_id']  = $admin_data_arr['admin_id'];
        $okmsg = base64_encode("You are successfully Logged In");
        header("Location:dashboard.php?okmsg=$okmsg");
        exit;
    }
    else {
        $errormsg = base64_encode("Name or password is incorrect");
        header("Location:index.php?errormsg=$errormsg");
        exit;
        }
  
}


?>



