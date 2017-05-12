<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/validation_functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php
$admin = find_admin_by_id($_GET["id"]);
if (!$admin) {
    // админа нет в базе или неверный ID
    redirect_to("manage_admins.php");
}
?>

<?php
if (isset($_POST['submit'])) {
    // Обработка формы

    // проверка формы
    $required_fields = array("username", "password");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("username" => 30);
    validate_max_lengths($fields_with_max_lengths);

    if (empty($errors)) {

        // Обновление

        $id = $admin["id"];
        $username = mysql_prep($_POST["username"]);
        $hashed_password = password_encrypt($_POST["password"]);

        $query = "UPDATE admins SET ";
        $query .= "username = '{$username}', ";
        $query .= "hashed_password = '{$hashed_password}' ";
        $query .= "WHERE id = {$id} ";
        $query .= "LIMIT 1";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_affected_rows($connection) == 1) {
            // Успешно
            $_SESSION["message"] = "Администратор обновлен.";
            redirect_to("manage_admins.php");
        } else {
            // Ошибка
            $_SESSION["message"] = "Ошибка обновления";
        }

    }
} else {
    // формирование GET запроса

} // скобка для окончания - if (isset($_POST['submit']))

?>
<?php $layout_context = "admin"; ?>
<?php include 'includes/header.php'; ?>

<div class="blog">
    <!--table of client -->
    <div class="typo">
        <div class="container">
            <?php echo message(); ?>
            <?php echo form_errors($errors); ?>
            <h2>Управление админbстраторами: <?php echo htmlentities($admin["username"], ENT_QUOTES, "UTF-8"); ?></h2>
            <form action="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>" method="post">
                <p>Логин:
                    <input type="text" name="username"
                           value="<?php echo htmlentities($admin["username"], ENT_QUOTES, "UTF-8"); ?>" class="form-control" />
                </p>
                <p>Пароль:
                    <input type="password" name="password" value="" class="form-control" style="margin-bottom: 15px"/>
                </p>
                <input type="submit" name="submit" class="btn btn-group-justified" value="Редактировать" />
            </form>
            <br/>
            <a href="manage_admins.php">Отменить</a>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
