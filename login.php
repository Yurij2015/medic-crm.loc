<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/validation_functions.php'; ?>
<?php
$username = "";
if (isset($_POST['submit'])) {
    // Обработка формы

    // проверка формы
    $required_fields = array("username", "password");
    validate_presences($required_fields);
    if (empty($errors)) {
        // Попытка входа
        $username = $_POST["username"];
        $password = $_POST["password"];
        $found_admin = attempt_login($username, $password);
        if ($found_admin) {
            // Успешно
            // Обозначения пользователя зашедшим в систему
            $_SESSION["admin_id"] = $found_admin["id"];
            $_SESSION["username"] = $found_admin["username"];
            redirect_to("admin.php");
        } else {
            // Ошибка
            $_SESSION["message"] = "Пользователь/пароль не найден";
        }
    }
} else {
} //  if (isset($_POST['submit']))
?>
<?php $layout_context = "admin"; ?>
<?php include 'includes/header.php'; ?>
    <!-- Форма авторизации на сайте -->
    <div class="blog">
        <div class="typo">
            <div class="container">
                <h2>Вход в админ-панель</h2>

                    <?php echo message(); ?>
                    <?php echo form_errors($errors); ?>
                    <form action="login.php" method="post">
                        <input type="text" class="form-control" placeholder="Username"
                               name="username"
                               value="<?php echo htmlentities($username); ?>" style="margin-bottom: 15px"/>
                        <input type="password" class="form-control" placeholder="Password" name="password" value=""
                               style="margin-bottom: 15px"/>
                        <input type="submit" class="btn btn-group-justified" name="submit" value="Войти"/>
                    </form>
                </div>

        </div>
    </div>
<?php include 'includes/footer.php';



