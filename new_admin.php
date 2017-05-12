<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/validation_functions.php'; ?>
<?php confirm_logged_in(); ?>

<?php
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
    
    $query  = "INSERT INTO admins (";
    $query .= "  username, hashed_password";
    $query .= ") VALUES (";
    $query .= "  '{$username}', '{$hashed_password}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Усшех
      $_SESSION["message"] = "Администратор добавлен";
      redirect_to("manage_admins.php");
    } else {
      // Не получилось
      $_SESSION["message"] = "Ошибка добавления администратора";
    }
  }
} else {
  
} //  if (isset($_POST['submit']))

?>

<?php $layout_context = "admin"; ?>
<?php include 'includes/header.php'; ?>
<div class="row">
        <div class="col-lg-3 col-sm-3">

  </div>
      <div class="col-lg-9 col-sm-9">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Добавить администратора</h2>
    <form action="new_admin.php" method="post">
      <p>Имя:
        <input class="form-control" type="text" name="username" value="" />
      </p>
      <p>Пароль:
        <input class="form-control" type="password" name="password" value="" />
      </p>
      <input type="submit" class="btn btn-primary" name="submit" value="Добавить" />
    </form>
    <br />
    <a href="manage_admins.php" >Отмена</a>
  </div>
</div>

<?php include 'includes/footer.php';
