<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php
  $admin = find_admin_by_id($_GET["id"]);
  if (!$admin) {
    // неверный ID администратора или админ не найден в БД 
    redirect_to("manage_admins.php");
  }
  
  $id = $admin["id"];
  $query = "DELETE FROM admins WHERE id = {$id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "Администратор удален.";
    redirect_to("manage_admins.php");
  } else {
    // Failure
    $_SESSION["message"] = "Ошибка удаления администратора.";
    redirect_to("manage_admins.php");
  }
  
