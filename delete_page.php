<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php
  $current_page = find_page_by_id($_GET["page"], false);
  if (!$current_page) {
    // неверный ID страницы или она не найдена в БД 
    redirect_to("manage_table.php");
  }
    $id = $current_page["id"];
  $query = "DELETE FROM pages WHERE id = {$id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Успшно
    $_SESSION["message"] = "Страница удалена.";
    redirect_to("manage_table.php");
  } else {
    // Не получилось
    $_SESSION["message"] = "Ошибка удаления страницы.";
    redirect_to("manage_table.php?page={$id}");
  }
 
