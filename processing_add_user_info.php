<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/validation_functions.php'; ?>
<?php
if (isset($_POST['submit'])) {
    // Обработка формы
    $firstname = mysql_prep($_POST["firstname"]);
    $secondname = mysql_prep($_POST["secondname"]);
    $dateofbirth = mysql_prep($_POST["dateofbirth"]);
    $blood = mysql_prep($_POST["blood"]);
    $chronicdisease = mysql_prep($_POST["chronicdisease"]);
    $allergy = mysql_prep($_POST["allergy"]);
    $otherinfo = mysql_prep($_POST["otherinfo"]);

    $username = htmlentities($_SESSION["username"]);

    // проверка заполнения формы
    $required_fields = array("firstname", "secondname", "dateofbirth", "blood", "chronicdisease", "allergy", "otherinfo");
    validate_presences($required_fields);
    // сравнение данных
    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        redirect_to("add_user_info.php");
    }
    $query = "INSERT INTO users (";
    $query .= "  firstname, secondname, dateofbirth, blood, chronicdisease, allergy, otherinfo, username  ";
    $query .= ") VALUES (";
    $query .= "  '{$firstname}','{$secondname}','{$dateofbirth}', '{$blood}', '{$chronicdisease}', '{$allergy}', '{$otherinfo}', '{$username}' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Успешно
        $_SESSION["message"] = "Информация записана";
        redirect_to("user_page.php");
    } else {
        // Ошибка
        $_SESSION["message"] = "Ошибка добавления информации";
        redirect_to("add_user_info.php");
    }
} else {
    redirect_to("add_user_info.php");
}
?>
<?php
if (isset($connection)) {
    mysqli_close($connection);
}
