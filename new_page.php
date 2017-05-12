<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/validation_functions.php'; ?>
<?php find_selected_page(); ?>
<?php
// Нельзя добавить страницу без родительской категории
if (!$current_subject) {
    // неправильный ID или нет в базе
    redirect_to("manage_table.php");
}
?>
<?php
if (isset($_POST['submit'])) {
    // Обработка формы

    // провека формы
    $required_fields = array("menu_name", "position", "visible", "content");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("menu_name" => 200);
    validate_max_lengths($fields_with_max_lengths);

    if (empty($errors)) {
        // Создание страницы

        // нужно добавить subject_id!
        $subject_id = $current_subject["id"];
        $menu_name = mysql_prep($_POST["menu_name"]);
        $position = (int)$_POST["position"];
        $visible = (int)$_POST["visible"];

        $content = mysql_prep($_POST["content"]);

        $query = "INSERT INTO pages (";
        $query .= "  subject_id, menu_name, position, visible, content";
        $query .= ") VALUES (";
        $query .= "  {$subject_id}, '{$menu_name}', {$position}, {$visible}, '{$content}'";
        $query .= ")";
        $result = mysqli_query($connection, $query);

        if ($result) {
            // Успех
            $_SESSION["message"] = "Страница создана";
            redirect_to("manage_table.php?subject=" . urlencode($current_subject["id"]));
        } else {
            // Ошибка
            $_SESSION["message"] = "Ошибка создания страницы";
        }
    }
} else {

} // if (isset($_POST['submit']))
?>
<?php $layout_context = "admin"; ?>
<?php include 'includes/header.php'; ?>
    <!-- new page -->
    <div class="news">
        <div class="container">
            <div class="news-grid">
                <div class="col-md-8 blog-left">
                    <div class="blog-left-grid">
                        <?php echo message(); ?>
                        <?php echo form_errors($errors); ?>

                        <div class="blog-title"><h2>Создать страницу</h2></div>
                        <form action="new_page.php?subject=<?php echo urlencode($current_subject["id"]); ?>"
                              method="post">
                            <p>Название:
                                <input type="text" name="menu_name" value=""/>
                            </p>
                            <p>Позиция:
                                <select name="position">
                                    <?php
                                    $page_set = find_pages_for_subject($current_subject["id"]);
                                    $page_count = mysqli_num_rows($page_set);
                                    for ($count = 1; $count <= ($page_count + 1); $count++) {
                                        echo "<option value=\"{$count}\">{$count}</option>";
                                    }
                                    ?>
                                </select>
                            </p>
                            <p>Видимость:
                                <input type="radio" name="visible" value="0"/> Нет
                                &nbsp;
                                <input type="radio" name="visible" value="1"/> Да
                            </p>
                            <p>Содержимое:<br/>
                                <textarea class="form-control" name="content" rows="20" cols="80"></textarea>
                            </p>
                            <input type="submit" class="btn btn-primary" name="submit" value="Создать страницу"/>
                        </form>
                        <br/>
                        <a href="manage_table.php?subject=<?php echo urlencode($current_subject["id"]); ?>">Отменить</a>
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
