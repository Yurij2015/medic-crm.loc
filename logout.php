<?php include 'includes/session.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php
	// обнуление данных
	$_SESSION["admin_id"] = null;
	$_SESSION["username"] = null;
	redirect_to("login.php");

