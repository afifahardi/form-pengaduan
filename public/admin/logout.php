<?php 
 
session_start();
session_destroy();
 
header("Location: ../petugas/login/login.php");
 
?>