<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/validation_functions.php'; ?>
<?php
if (isset($_POST['submit'])) {
    // Обработка формы
    $name_lastname_klienta = mysql_prep($_POST["name_lastname_klienta"]);
    $homeadress = mysql_prep($_POST["homeadress"]);
    $date = mysql_prep($_POST["date"]);
    $message = mysql_prep($_POST["message"]);
    $phonenumber = mysql_prep($_POST["phonenumber"]);
    $email = mysql_prep($_POST["email"]);
    // проверка заполнения формы
    $required_fields = array("name_lastname_klienta", "homeadress", "date", "message", "phonenumber", "email");
    validate_presences($required_fields);
    // сравнение данных
    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        redirect_to("add_klient.php");
    }
    $query = "INSERT INTO zakaz (";
    $query .= "  name_lastname_klienta, homeadress, date, message, phonenumber, email ";
    $query .= ") VALUES (";
    $query .= "  '{$name_lastname_klienta}','{$homeadress}','{$date}', '{$message}', '{$phonenumber}', '{$email}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Успешно
        $_SESSION["message"] = "Заявка отправлена";
        redirect_to("add_klient.php");
    } else {
        // Ошибка
        $_SESSION["message"] = "Ошибка добавления заявки";
        redirect_to("add_klient.php");
    }
} else {
    redirect_to("add_klient.php");
}
?>
<?php
if (isset($connection)) {
    mysqli_close($connection);
}
