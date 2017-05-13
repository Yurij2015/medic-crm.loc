<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/validation_functions.php'; ?>
<?php
if (isset($_POST['submit'])) {
    // Обработка формы
    $name = mysql_prep($_POST["name"]);
    $office = mysql_prep($_POST["office"]);
        // проверка заполнения формы
    $required_fields = array("name", "office");
    validate_presences($required_fields);
    // сравнение данных
    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        redirect_to("add_section.php");
    }
    $query = "INSERT INTO section (";
    $query .= "  name, office ";
    $query .= ") VALUES (";
    $query .= " '{$name}','{$office}' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Успешно
        $_SESSION["message"] = "Отдел добавлен";
        redirect_to("add_section.php");
    } else {
        // Ошибка
        $_SESSION["message"] = " Ошибка добавления отдела";
        redirect_to("add_section.php");
    }
} else {
    redirect_to("add_section.php");
}
?>
<?php
if (isset($connection)) {
    mysqli_close($connection);
}
