<?php 
error_reporting(E_ALL);
ini_set('display_errors',1);
ob_start();
session_start(); 

 

 date_default_timezone_set('Asia/Karachi');


$user_name   = "root";
$server_name = "localhost";
$pass        = "";
$db_name     = "welfare_db";


$conn = mysqli_connect($server_name,$user_name ,$pass ,$db_name );

if(!$conn){
    echo "<script>
    alert('There was an error connecting to database');
    </script>";
}


?>

