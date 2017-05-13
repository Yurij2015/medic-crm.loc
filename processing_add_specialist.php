<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/validation_functions.php'; ?>
<?php
if (isset($_POST['submit'])) {
    // Обработка формы
    $firstname = mysql_prep($_POST["firstname"]);
    $secondname = mysql_prep($_POST["secondname"]);
    $idsection = mysql_prep($_POST["idsection"]);
    $description = mysql_prep($_POST["description"]);
    // проверка заполнения формы
    $required_fields = array("firstname", "secondname", "idsection", "description");
    validate_presences($required_fields);
    // сравнение данных
    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        redirect_to("add_specialist.php");
    }

    $query = "INSERT INTO specialist (";
    $query .= "  firstname, secondname, idsection, description ";
    $query .= ") VALUES (";
    $query .= " '{$firstname}','{$secondname}', '{$idsection}', '{$description}' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Успешно
        $_SESSION["message"] = "Специалист добавлен";
        redirect_to("add_specialist.php");
    } else {
        // Ошибка
        $_SESSION["message"] = " Ошибка добавления специалиста";
        redirect_to("add_specialist.php");
    }
} else {
    redirect_to("add_specialist.php");
}
?>
<?php
if (isset($connection)) {
    mysqli_close($connection);
}
