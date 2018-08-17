<?php if (!isset($_SESSION['login_instructor'])) { include_once 'admin/subviews/login.php'; } 
	else { ?>
<?php if (!isset($_SESSION['error_msg'])) {?>
<?php include_once 'day_appointments.php';?>
<?php } ?>
<?php include_once 'add_user.php';?>
<?php } ?>
<?php include_once 'add_user.php';?>
<?php include 'calender.php';?>