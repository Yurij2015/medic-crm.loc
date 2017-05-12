<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php
	$current_subject = find_subject_by_id($_GET["subject"], false);
	if (!$current_subject) {
        // неверный ID  или нет в БД 
		redirect_to("manage_table.php");
	}
	
	$pages_set = find_pages_for_subject($current_subject["id"]);
	if (mysqli_num_rows($pages_set) > 0) {
		$_SESSION["message"] = "Нелья удалить категорию со страницами";
		redirect_to("manage_table.php?subject={$current_subject["id"]}");
	}
	
	$id = $current_subject["id"];
	$query = "DELETE FROM subjects WHERE id = {$id} LIMIT 1";
	$result = mysqli_query($connection, $query);

	if ($result && mysqli_affected_rows($connection) == 1) {
		// Success
		$_SESSION["message"] = "Категория удалена";
		redirect_to("manage_table.php");
	} else {
		// Failure
		$_SESSION["message"] = "Ошибка уделения";
		redirect_to("manage_table.php?subject={$id}");
	}
	

