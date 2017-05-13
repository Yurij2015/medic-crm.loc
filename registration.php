<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/validation_functions.php'; ?>
<?php
$username = "";
if (isset($_POST['submit'])) {
    // обработка формы
    // проверка
    $required_fields = array("username", "password");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("username" => 30);
    validate_max_lengths($fields_with_max_lengths);

    if (empty($errors)) {
        // Создание
        $username = mysql_prep($_POST["username"]);
        $hashed_password = password_encrypt($_POST["password"]);
        $query = "INSERT INTO admins (";
        $query .= "  username, hashed_password";
        $query .= ") VALUES (";
        $query .= "  '{$username}', '{$hashed_password}'";
        $query .= ")";
        $result = mysqli_query($connection, $query);
        if ($result) {
            // Усшех
            $_SESSION["message"] = "Пользователь добавлен";
            redirect_to("login.php");
        } else {
            // Не получилось
            $_SESSION["message"] = "Ошибка добавления пользователя";
        }
    }
} else {

} //  if (isset($_POST['submit']))

?>
<?php $layout_context = "user"; ?>
<?php include 'includes/header.php'; ?>
    <!-- Форма авторизации на сайте -->
    <div class="blog">
        <div class="typo">
            <div class="container">
                <div class="contact-grid">
                    <h2>Регистрация на сайте</h2>
                    <div class="col-md-12 contact-grid-left">
                        <h3 style="color: green">  <?php echo message(); ?></h3>
                        <h3 style="color: red"><?php echo form_errors($errors); ?></h3>
                        <form action="registration.php" method="post">
                            <input type="text" name="username"
                                   required=""
                                   style="margin-bottom: 15px; height: 48px; width: 100%">

                            <input type="password" value="Пароль" name="password" onfocus="this.value = '';"
                                   required=""
                                   class="form-control" style="height: 48px;">
                            <hr>
                            <input type="submit" name="submit" value="Регистрация">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>