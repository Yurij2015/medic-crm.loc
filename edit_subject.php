<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/validation_functions.php'; ?>
<?php find_selected_page(); ?>
<?php
if (!$current_subject) {
    // subject ID was missing or invalid or
    // subject couldn't be found in database
    redirect_to("manage_table.php");
}
?>
<?php
if (isset($_POST['submit'])) {
    // Обработка формы

    // проверка
    $required_fields = array("menu_name", "position", "visible");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("menu_name" => 50);
    validate_max_lengths($fields_with_max_lengths);

    if (empty($errors)) {

        // Обновление

        $id = $current_subject["id"];
        $menu_name = mysql_prep($_POST["menu_name"]);
        $position = (int)$_POST["position"];
        $visible = (int)$_POST["visible"];

        $query = "UPDATE subjects SET ";
        $query .= "menu_name = '{$menu_name}', ";
        $query .= "position = {$position}, ";
        $query .= "visible = {$visible} ";
        $query .= "WHERE id = {$id} ";
        $query .= "LIMIT 1";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_affected_rows($connection) >= 0) {
            // Success
            $_SESSION["message"] = "Обновление успешно";
            redirect_to("manage_table.php");
        } else {
            // Failure
            $message = "Ошибка обновления";
        }
    }
} else {
} // скобка для окончания - if (isset($_POST['submit']))
?>
<?php $layout_context = "admin"; ?>
<?php include 'includes/header.php'; ?>

    <!-- edit subject -->
    <div class="news">
        <div class="container">
            <div class="news-grid">
                <div class="col-md-8 blog-left">
                    <div class="blog-left-grid">


                        <?php // $message is just a variable, doesn't use the SESSION
                        if (!empty($message)) {
                            echo "<div class=\"message\">" . $message . "</div>";
                        }
                        ?>
                        <?php echo form_errors($errors); ?>

                        <h2>Редактировать категорию: <?php echo $current_subject["menu_name"]; ?></h2>
                        <form action="edit_subject.php?subject=<?php echo $current_subject["id"]; ?>" method="post">
                            <p>Название:
                                <input type="text" name="menu_name" value="<?php echo $current_subject["menu_name"]; ?>"/>
                            </p>
                            <p>Position:
                                <select name="position">
                                    <?php
                                    $subject_set = find_all_subjects(false);
                                    $subject_count = mysqli_num_rows($subject_set);
                                    for ($count = 1; $count <= $subject_count; $count++) {
                                        echo "<option value=\"{$count}\"";
                                        if ($current_subject["position"] == $count) {
                                            echo " selected";
                                        }
                                        echo ">{$count}</option>";
                                    }
                                    ?>
                                </select>
                            </p>
                            <p>Visible:
                                <input type="radio" name="visible" value="0" <?php if ($current_subject["visible"] == 0) {
                                    echo "checked";
                                } ?> /> Нет
                                &nbsp;
                                <input type="radio" name="visible" value="1" <?php if ($current_subject["visible"] == 1) {
                                    echo "checked";
                                } ?>/> Да
                            </p>
                            <input type="submit" name="submit" value="Редактировать"/>
                        </form>
                        <br/>
                        <a href="manage_table.php">Отмена</a>
                        &nbsp;
                        &nbsp;
                        <a href="delete_subject.php?subject=<?php echo $current_subject["id"] ?>"
                           onclick="return confirm('Вы уверены?');">Удалить категорию</a>
                    </div>
                </div>
                <div class="col-md-4 blog-right">
                    <h2>Меню публичной части</h2>
                    <?php echo navigation($current_subject, $current_page); ?>
                    <h2>Меню</h2>
                    <ul>
                        <li><a href="list_zakaz.php">Список заявок</a></li>
                        <li><a href="manage_admins.php">Управление администраторами</a></li>
                        <li><a href="manage_table.php">Изменить данные публичной части</a></li>
                        <li><a href="new_subject.php">Добавить раздел в публичную часть</a></li>
                        <li><a href="logout.php">Выход</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


<?php include 'includes/footer.php';
