<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/validation_functions.php'; ?>
<?php
if (isset($_POST['submit'])) {
    // Обработка формы
    $name = mysql_prep($_POST["name"]);
    $email = mysql_prep($_POST["email"]);
    $date = mysql_prep($_POST["date"]);
    $question = mysql_prep($_POST["question"]);
    // проверка заполнения формы
    $required_fields = array("name", "email", "date", "question");
    validate_presences($required_fields);
    // сравнение данных
    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        redirect_to("contactform.php");
    }

    $query = "INSERT INTO contactform (";
    $query .= "  name, email, question, date ";
    $query .= ") VALUES (";
    $query .= " '{$name}','{$email}', '{$question}', '{$date}' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Успешно
        $_SESSION["message"] = "Вопрос отправлен";
        redirect_to("contactform.php");
    } else {
        // Ошибка
        $_SESSION["message"] = " Ошибка отправления вопроса";
        redirect_to("contactform.php");
    }
} else {
    redirect_to("contactform.php");
}
?>
<?php
if (isset($connection)) {
    mysqli_close($connection);
}
