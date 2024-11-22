<?php
include('config/connection.php');
session_start();
session_destroy();
$okmsg = base64_encode("Logged out successfully");
header("Location:index.php?okmsg=$okmsg");
?>