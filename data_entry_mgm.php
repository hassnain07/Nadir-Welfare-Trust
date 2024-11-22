<?php
include("config/connection.php");

// add donor
if (isset($_POST['add_donation'])) {

    $donor_name     = mysqli_real_escape_string($conn,$_POST['donor_name']);
    $donor_address  = mysqli_real_escape_string($conn,$_POST['donor_address']);
    $donor_fname    = mysqli_real_escape_string($conn,$_POST['donor_fname']);
    $donor_cnic     = mysqli_real_escape_string($conn,$_POST['donor_cnic']);
    $donor_phone    = mysqli_real_escape_string($conn,$_POST['donor_phone']);
    $donation_type  = mysqli_real_escape_string($conn,$_POST['donation_type']);

    $cnic_pic       = $_FILES['cnic_pic'];


    $cnic_img       = date('ymdghsi').$_FILES['cnic_pic']['name'];
    $tempname       = $_FILES['cnic_pic']['tmp_name'];
  
    $dir         = "donor_cnic";
    
    move_uploaded_file($tempname,$dir.'/'.$cnic_img);
  
  


    if ($_POST['donation_type'] == "cash") {
    
     $cash_amount = mysqli_real_escape_string($conn,$_POST['cash_amount']);

    }
    elseif ($_POST['donation_type']== "items") {
        
        $item_name = mysqli_real_escape_string($conn,$_POST['item_name']);
        $item_quantity = mysqli_real_escape_string($conn,$_POST['item_quantity']);
       
    }
  

    $donation_date = date("Y-m-d");

    

    $insert_stmt  = "INSERT INTO donor_info SET
                
    donor_name   = '".$donor_name."',
    donor_address= '".$donor_address."',
    donor_fname  = '".$donor_fname."',
    donor_cnic   = '".$donor_cnic."',
    cnic_pic     = '".$dir."/".$cnic_img."',
    donor_phone  = '".$donor_phone."'

";



   

   if ($run_insert = mysqli_query($conn,$insert_stmt)) {

       $donor_id   = mysqli_insert_id($conn);

    if ($donation_type == "items") {
    
     $insert_donation = "INSERT INTO donations SET
              
              donor_id         = '".$donor_id."',
              donation_type    = '".$donation_type."',
              item_name        = '".$item_name."',
              item_quantity    = '".$item_quantity."',
              donation_date    = '".$donation_date."'

     ";

     $run_insert_donation = mysqli_query($conn,$insert_donation);
     $donation_id         = mysqli_insert_id($conn);
     $add_item_donate     = mysqli_query($conn,"INSERT INTO item_donations SET 
                         
                         donation_id    = '".$donation_id."',
                         item_qty       = '".$item_quantity."',
                         donated_qty    =   0
     ");


   }elseif ($donation_type == "cash") {
    
    $insert_donation = "INSERT INTO donations SET
              
                donor_id       = '".$donor_id."',
                donation_type  = '".$donation_type."',
                cash_amount    = '".$cash_amount."',
                donation_date  = '".$donation_date."'
";  

$run_insert_donation = mysqli_query($conn,$insert_donation);
$add_cash_donate     = mysqli_query($conn,"UPDATE cash_donations SET 
                    
                    donation_cash  = donation_cash + '".$cash_amount."'
                    ");

 }

       
        }

        
    if ($insert_donation) { 

        $okmsg = base64_encode("Donation added successfully");   
        header("Location:items_entry.php?okmsg=$okmsg");
        exit;
    
        } else {
    
        $errormsg = base64_encode("Donations are Not added successfully");   
        header("Location:items_entry.php?errormsg=$errormsg");
        exit;
    
        }

    }
// add donor end


// update donation

if (isset($_POST['update_donation'])) {


    $donor_id      = $_POST['donor_id'];
    $donation_id   = $_POST['donation_id'];
    $donor_name    = mysqli_real_escape_string($conn,$_POST['donor_name']);
    $donor_address = mysqli_real_escape_string($conn,$_POST['donor_address']);
    $donor_fname   = mysqli_real_escape_string($conn,$_POST['donor_fname']);
    $donor_cnic    = mysqli_real_escape_string($conn,$_POST['donor_cnic']);
    $donor_phone   = mysqli_real_escape_string($conn,$_POST['donor_phone']);
    $donation_type = mysqli_real_escape_string($conn,$_POST['donation_type']);

    $cnic_pic    = $_FILES['cnic_pic'];
    $cnic_img    = date('ymdghsi').$_FILES['cnic_pic']['name'];
    $tempname    = $_FILES['cnic_pic']['tmp_name'];
  
    $dir         = "donor_cnic";
    
    move_uploaded_file($tempname,$dir.'/'.$cnic_img);
  
  


    
    
        $cash_amount      = mysqli_real_escape_string($conn,$_POST['cash_amount']);
        $item_name        = mysqli_real_escape_string($conn,$_POST['item_name']);
        $item_quantity    = mysqli_real_escape_string($conn,$_POST['item_quantity']);
       
    
        if ($donation_type == "cash") {
           
            $item_name        = "";
            $item_quantity    = "";

        }elseif ($donation_type == "items"){
            
            $cash_amount      = "";
        }

    $donation_date = date('Y-m-d');

if (!empty($_FILES['cnic_pic']['name'])) {

    $insert_stmt  = "UPDATE donor_info SET
                
            donor_name   = '".$donor_name."',
            donor_address= '".$donor_address."',
            donor_fname  = '".$donor_fname."',
            donor_cnic   = '".$donor_cnic."',
            cnic_pic     = '".$dir."/".$cnic_img."',
            donor_phone  = '".$donor_phone."'
            WHERE donor_id = '".$donor_id."'

";
}else {

    

    $insert_stmt  = "UPDATE donor_info SET
                
            donor_name   = '".$donor_name."',
            donor_address= '".$donor_address."',
            donor_fname  = '".$donor_fname."',
            donor_cnic   = '".$donor_cnic."',
            donor_phone  = '".$donor_phone."'
            WHERE donor_id = '".$donor_id."'
";
}



   

   if ($run_insert = mysqli_query($conn,$insert_stmt)) {

   

   
    
     $insert_donation = "UPDATE donations SET
              
              donation_type       = '".$donation_type."',
              cash_amount         = '".$cash_amount."',
              item_name           = '".$item_name."',
              item_quantity       = '".$item_quantity."',
              donation_date       = '".$donation_date."'
              WHERE donation_id   = '".$donation_id."'
     ";

   

        $run_update_donation = mysqli_query($conn,$insert_donation);
    }
    if ($run_update_donation) {
        
        $okmsg = base64_encode("Data Updated Successfully");
        header("Location:donors.php?okmsg=$okmsg");
        exit;
    }else{
        $errormsg = base64_encode("Data Not Updated");
        header("Location:donors.php?errormsg=$errormsg");
        exit;
    }
 }


// update donation end


if (isset($_POST['add_existing'])) {
    
    $donor_id   = $_POST['donor_id'];
    $donor_name = mysqli_real_escape_string($conn,$_POST['donor_name']);
    $donor_address = mysqli_real_escape_string($conn,$_POST['donor_address']);
    $donor_fname = mysqli_real_escape_string($conn,$_POST['donor_fname']);
    $donor_cnic = mysqli_real_escape_string($conn,$_POST['donor_cnic']);
    $donor_phone = mysqli_real_escape_string($conn,$_POST['donor_phone']);
    $donation_type = mysqli_real_escape_string($conn,$_POST['donation_type']);

  
    if ($_POST['donation_type'] == "cash") {
    
     $cash_amount = mysqli_real_escape_string($conn,$_POST['cash_amount']);

    }
    elseif ($_POST['donation_type']== "items") {
        $item_name = mysqli_real_escape_string($conn,$_POST['item_name']);
        $item_quantity = mysqli_real_escape_string($conn,$_POST['item_quantity']);
       
    }
  

    $donation_date = date("Y-m-d");

    

   

    

    if ($donation_type == "items") {
    
     $insert_donation = "INSERT INTO donations SET
              
              donor_id         = '".$donor_id."',
              donation_type    = '".$donation_type."',
              item_name        = '".$item_name."',
              item_quantity    = '".$item_quantity."',
              donation_date    = '".$donation_date."'
     ";


     $run_insert_donation = mysqli_query($conn,$insert_donation);

     $donation_id         = mysqli_insert_id($conn);

     $add_item_donate     = mysqli_query($conn,"INSERT INTO item_donations SET 
                         
                         donation_id    = '".$donation_id."',
                         item_qty       = '".$item_quantity."',
                         donated_qty    =   0
     ");




   }elseif ($donation_type == "cash") {
    
    $insert_donation = "INSERT INTO donations SET
              
                donor_id       = '".$donor_id."',
                donation_type  = '".$donation_type."',
                cash_amount    = '".$cash_amount."',
                donation_date  = '".$donation_date."'
";  
       $run_insert_donation = mysqli_query($conn,$insert_donation);
        $add_cash_donate     = mysqli_query($conn,"UPDATE cash_donations SET 
                            
                            donation_cash  = donation_cash + '".$cash_amount."'
                            ");

 }

        if ($run_insert_donation ) {
            $okmsg = base64_encode("Data Inserted Successfully");
            header("Location:items_entry.php?okmsg=$okmsg");
        }
        }








       


?>