<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php
$admin_set = find_all_admins();
?>
<?php $layout_context = "admin"; ?>
<?php include "includes/header.php"; ?>
    <!-- manage admin -->
    <div class="news">
        <div class="container">
            <div class="news-grid">
                <div class="col-md-8 blog-left">
                    <div class="blog-left-grid">
                        <?php echo message(); ?>
                        <div class="blog-title"><h2>Управление администраторами</h2></div>
                        <table class="table table-hover">
                            <tr>
                                <th style="text-align: left; width: 200px;">Логин</th>
                                <th colspan="2" style="text-align: left;">Действия</th>
                            </tr>
                            <?php while ($admin = mysqli_fetch_assoc($admin_set)) { ?>
                                <tr>
                                    <td><?php echo htmlentities($admin["username"], ENT_QUOTES, "UTF-8"); ?>
                                        <br><?php // echo htmlentities($admin["hashed_password"]); ?>
                                    </td>
                                    <td>
                                        <a href="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>">Редактировать</a>
                                    </td>
                                    <td><a href="delete_admin.php?id=<?php echo urlencode($admin["id"]); ?>"
                                           onclick="return confirm('Вы уверены?');">Удалить</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                        <br/>
                        <a href="new_admin.php">Добавить администратора</a>
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

