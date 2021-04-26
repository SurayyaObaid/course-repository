<?php
session_start();
session_destroy();
unset($_SESSION['user']);	
unset($_SESSION['teacherid'] );
unset($_SESSION['tname']);
header('location: userlogin.php');
//echo 'You have been logged out. <a href="signin.php">Go back</a>';