<?php
include("config/connection.php");

// add recipient
if (isset($_POST['add_donated_by_us'])) {

    $recipient_name    = mysqli_real_escape_string($conn,$_POST['recipient_name']);
    $recipient_address = mysqli_real_escape_string($conn,$_POST['recipient_address']);
    $recipient_fname   = mysqli_real_escape_string($conn,$_POST['recipient_fname']);
    $recipient_cnic    = mysqli_real_escape_string($conn,$_POST['recipient_cnic']);
    $recipient_phone   = mysqli_real_escape_string($conn,$_POST['recipient_phone']);
    $donation_type     = mysqli_real_escape_string($conn,$_POST['donation_type']);


    $cnic_pic = $_FILES['cnic_pic'];

    $cnic_img    = date('ymdghsi').$_FILES['cnic_pic']['name'];
    $tempname    = $_FILES['cnic_pic']['tmp_name'];
  
    $dir         = "recipient_cnic";
    
    move_uploaded_file($tempname,$dir.'/'.$cnic_img);
  
  


    if ($_POST['donation_type'] == "cash") {
    
        $cash_amount = mysqli_real_escape_string($conn,$_POST['cash_amount']);

    }
    elseif ($_POST['donation_type'] == "items") {

        $item_id           = mysqli_real_escape_string($conn,$_POST['selected_item']);
        $item_quantity     = mysqli_real_escape_string($conn,$_POST['selected_quantity']);
        $available_qty     = mysqli_real_escape_string($conn,$_POST['available_quantity']);


        $sel_items  = mysqli_query($conn,"SELECT donation_id FROM item_donations WHERE id = '".$item_id."'");
        $items_arr  = mysqli_fetch_array($sel_items);



        $sel_item_name = mysqli_query($conn,"SELECT item_name FROM donations WHERE donation_id = '".$items_arr['donation_id']."'");
        $item_name_arr = mysqli_fetch_array($sel_item_name);
       
    }
  

    $donation_date = date("Y-m-d");

    $insert_stmt  = "INSERT INTO recipient_info SET
                
    recipient_name   = '".$recipient_name."',
    recipient_address= '".$recipient_address."',
    recipient_fname  = '".$recipient_fname."',
    recipient_cnic   = '".$recipient_cnic."',
    cnic_pic         = '".$dir."/".$cnic_img."',
    recipient_phone  = '".$recipient_phone."'

";





   

   if ($run_insert = mysqli_query($conn,$insert_stmt)) {

    $recipient_id   = mysqli_insert_id($conn);

    if ($donation_type == "items") {
    
     $insert_donation = "INSERT INTO donated_items SET
              
              recipient_id     = '".$recipient_id."',
              donation_type    = '".$donation_type."',
              item_name        = '".$item_name_arr['item_name']."',
              item_quantity    = '".$item_quantity."',
              donation_date    = '".$donation_date."'
     ";
        $run_insert_donation = mysqli_query($conn,$insert_donation);
        if ($run_insert_donation) {

            if ($available_qty ==  $item_quantity) {
                $insert_donated = mysqli_query($conn,"UPDATE item_donations SET
                                  
                donated_qty   = donated_qty + '".$item_quantity."',
                status        = 2
                WHERE id      = '".$item_id."'

"); 
            }else {
                $insert_donated = mysqli_query($conn,"UPDATE item_donations SET
                                  
                donated_qty   = donated_qty + '".$item_quantity."'
                WHERE id      = '".$item_id."'

"); 
            }
           
         
        }


   }elseif ($donation_type == "cash") {
    
    $insert_donation = "INSERT INTO donated_items SET
              
                recipient_id   = '".$recipient_id."',
                donation_type  = '".$donation_type."',
                cash_amount    = '".$cash_amount."',
                donation_date  = '".$donation_date."'
";  
    $run_insert_donation = mysqli_query($conn,$insert_donation);
    $run_update_donation = mysqli_query($conn,"UPDATE cash_donations SET
                                
    donated_cash   = donated_cash + '".$cash_amount."'
    ");
 }


  

        }

        
    if ($insert_donation) { 

        $okmsg = base64_encode("Donation added successfully");   
        header("Location:donate_items.php?okmsg=$okmsg");
        exit;
    
        } else {
    
        $errormsg = base64_encode("Donations are Not added successfully");   
        header("Location:donate_items.php?errormsg=$errormsg");
        exit;
    
        }

    }
// add recipient end





if (isset($_POST['add_existing_donated'])) {
   
    $recipient_id      = $_POST["recipient_id"];
    $recipient_name    = mysqli_real_escape_string($conn,$_POST['recipient_name']);
    $recipient_address = mysqli_real_escape_string($conn,$_POST['recipient_address']);
    $recipient_fname   = mysqli_real_escape_string($conn,$_POST['recipient_fname']);
    $recipient_cnic    = mysqli_real_escape_string($conn,$_POST['recipient_cnic']);
    $recipient_phone   = mysqli_real_escape_string($conn,$_POST['recipient_phone']);
    $donation_type     = mysqli_real_escape_string($conn,$_POST['donation_type']);
    

  
    if ($_POST['donation_type'] == "cash") {
    
        $cash_amount = mysqli_real_escape_string($conn,$_POST['cash_amount']);

    }
    elseif ($_POST['donation_type']== "items") {
      
        $item_id     = mysqli_real_escape_string($conn,$_POST['selected_item']);
        $item_quantity = mysqli_real_escape_string($conn,$_POST['selected_quantity']);
        $available_qty = mysqli_real_escape_string($conn,$_POST['available_quantity']);

        $sel_items  = mysqli_query($conn,"SELECT donation_id FROM item_donations WHERE id = '".$item_id."'");
        $items_arr  = mysqli_fetch_array($sel_items);
      
        $sel_item_name = mysqli_query($conn,"SELECT item_name FROM donations WHERE donation_id = '".$items_arr['donation_id']."'");
        $item_name_arr = mysqli_fetch_array($sel_item_name);
    }
  

    $donation_date = date("Y-m-d");

 


    if ($donation_type == "items") {
    
     $insert_donation = "INSERT INTO donated_items SET
              
              recipient_id     = '".$recipient_id."',
              donation_type    = '".$donation_type."',
              item_name        = '".$item_name_arr['item_name']."',
              item_quantity    = '".$item_quantity."',
              donation_date    = '".$donation_date."'
     ";
     $run_insert_donation = mysqli_query($conn,$insert_donation);
     if ($run_insert_donation) {

        if ($available_qty ==  $item_quantity) {
            $insert_donated = mysqli_query($conn,"UPDATE item_donations SET
                              
            donated_qty   = '".$item_quantity."',
            available_qty = item_qty - donated_qty,
            status        = 2
            WHERE id      = '".$item_id."'

"); 
        }else {
            $insert_donated = mysqli_query($conn,"UPDATE item_donations SET
                              
            donated_qty   = '".$item_quantity."',
            available_qty = item_qty - donated_qty
            WHERE id      = '".$item_id."'

"); 
        }
       
     
    }

   }elseif ($donation_type == "cash") {
    
    $insert_donation = "INSERT INTO donated_items SET
              
                recipient_id   = '".$recipient_id."',
                donation_type  = '".$donation_type."',
                cash_amount    = '".$cash_amount."',
                donation_date  = '".$donation_date."'
";  
$run_insert_donation = mysqli_query($conn,$insert_donation);
$insert_donated      = mysqli_query($conn,"UPDATE cash_donations SET
                              
donated_cash   = donated_cash + '".$cash_amount."'
");
 }
        if ($insert_donated) {
            $okmsg = base64_encode("Donated Successfully");
            header("Location:donate_items.php?okmsg=$okmsg");
            exit;
            
        }else {
            $errormsg = base64_encode("Not Donated Successfully");
            header("Location:donate_items.php?errormsg=$errormsg");
            exit;
        }
       
}


// update recipient

if (isset($_POST['update_recipient'])) {


    $recipient_id      = $_POST['recipient_id'];
    $recipient_name    = mysqli_real_escape_string($conn,$_POST['recipient_name']);
    $recipient_address = mysqli_real_escape_string($conn,$_POST['recipient_address']);
    $recipient_fname   = mysqli_real_escape_string($conn,$_POST['recipient_fname']);
    $recipient_cnic    = mysqli_real_escape_string($conn,$_POST['recipient_cnic']);
    $recipient_phone   = mysqli_real_escape_string($conn,$_POST['recipient_phone']);

    $cnic_pic    = $_FILES['cnic_pic'];
    $cnic_img    = date('ymdghsi').$_FILES['cnic_pic']['name'];
    $tempname    = $_FILES['cnic_pic']['tmp_name'];
    $dir         = "recipient_cnic";
    
    move_uploaded_file($tempname,$dir.'/'.$cnic_img);

    $donation_date = date('Y-m-d');

if (!empty($_FILES['cnic_pic']['name'])) {

    $update_stmt  = "UPDATE recipient_info SET
                
            recipient_name   = '".$recipient_name."',
            recipient_address= '".$recipient_address."',
            recipient_fname  = '".$recipient_fname."',
            recipient_cnic   = '".$recipient_cnic."',
            cnic_pic         = '".$dir."/".$cnic_img."',
            recipient_phone  = '".$recipient_phone."'
            WHERE recipient_id = '".$recipient_id."'

";
}else {

    $update_stmt  = "UPDATE recipient_info SET
                
            recipient_name   = '".$recipient_name."',
            recipient_address= '".$recipient_address."',
            recipient_fname  = '".$recipient_fname."',
            recipient_cnic   = '".$recipient_cnic."',
            recipient_phone  = '".$recipient_phone."'
            WHERE recipient_id = '".$recipient_id."'
";
}
   
   
    $run_update_stmt = mysqli_query($conn,$update_stmt);

    if ($run_update_stmt) {
        
        $okmsg = base64_encode("Data Updated Successfully");
        header("Location:recipient_details.php?okmsg=$okmsg");
        exit;

    }else{

        $errormsg = base64_encode("Data Not Updated");
        header("Location:recipient_details.php?errormsg=$errormsg");
        exit;

    }

 }






// update recipient end


?>