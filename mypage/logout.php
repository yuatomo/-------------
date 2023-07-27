<?php 
session_start();

session_destroy();
header("Location: ../loginAccount/index.php");
exit;