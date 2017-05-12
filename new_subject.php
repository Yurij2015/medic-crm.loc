<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php $layout_context = "admin"; ?>
<?php include 'includes/header.php'; ?>
<?php find_selected_page(); ?>
    <!-- add category page -->
    <div class="news">
        <div class="container">
            <div class="news-grid">
                <div class="col-md-8 blog-left">
                    <div class="blog-left-grid">
                        <div class="blog-leftr">
                            <?php echo message(); ?>
                            <?php $errors = errors(); ?>
                            <?php echo form_errors($errors); ?>
                            <h2>Создать категорию</h2>
                            <form role="form" action="create_subject.php" method="post">
                                <div class="form-group">
                                    <label>Название:</label>
                                    <input type="text" class="form-control" name="menu_name" value=""/>
                                </div>
                                <label>Позиция:</label>
                                <div class="form-group">
                                    <select class="form-control" name="position">
                                        <?php
                                        $subject_set = find_all_subjects(false);
                                        $subject_count = mysqli_num_rows($subject_set);
                                        for ($count = 1; $count <= ($subject_count + 1); $count++) {
                                            echo "<option value=\"{$count}\">{$count}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Видимость:</label>
                                    <input type="radio" name="visible" value="0"/> Нет
                                    <input type="radio" name="visible" value="1"/> Да
                                    </p>
                                    <input type="submit" class="btn" name="submit"
                                           value="Создать категорию"/>
                                </div>
                            </form>
                            <br/>
                            <a href="manage_table.php">Отменить</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 blog-right">
                    <h2>Меню публичной части</h2>
                    <?php echo navigation($current_subject, $current_page); ?>
                    <h2>Меню</h2>
                    <ul>
                        <li><a href="add_klient.php">Добавить клиента</a></li>
                        <li><a href="list_zakaz.php">Список заказов</a></li>
                        <li><a href="manage_admins.php">Управление администраторами</a></li>
                        <li><a href="manage_table.php">Изменить данные публичной части</a></li>
                        <li><a href="logout.php">Выход</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- //add category page -->
<?php include 'includes/footer.php';

