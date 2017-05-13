<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php $layout_context = "admin"; ?>
<?php include 'includes/header.php'; ?>
<?php find_selected_page(); ?>
    <!-- admin page -->
    <div class="news">
        <div class="container">
            <div class="news-grid">
                <div class="col-md-8 blog-left">
                    <div class="blog-left-grid">
                        <h2>Управление сайтом</h2>
                        <?php echo message(); ?>
                        <?php if ($current_subject) { ?>
                            <h2>Редактирование страниц категорий</h2>
                            Название: <?php echo htmlentities($current_subject["menu_name"], ENT_QUOTES, "UTF-8"); ?>
                            <br/>
                            Позиция: <?php echo $current_subject["position"]; ?><br/>
                            Видимость: <?php echo $current_subject["visible"] == 1 ? 'да' : 'нет'; ?><br/>
                            <br/>

                            <a href="edit_subject.php?subject=<?php echo urldecode($current_subject["id"]); ?>">Изменить</a>

                            <div style="margin-top: 2em; border-top: 1px solid #000000;">
                                <h3>Страницы в этой категории:</h3>
                                <ul>
                                    <?php
                                    $subject_pages = find_pages_for_subject($current_subject["id"]);
                                    while ($page = mysqli_fetch_assoc($subject_pages)) {
                                        echo "<li>";
                                        $safe_page_id = urlencode($page["id"]);
                                        echo "<a href=\"manage_table.php?page={$safe_page_id}\">";
                                        echo htmlentities($page["menu_name"], ENT_QUOTES, "UTF-8");
                                        echo "</a>";
                                        echo "</li>";
                                    }
                                    ?>
                                </ul>
                                <br/>
                                + <a href="new_page.php?subject=<?php echo urlencode($current_subject["id"]); ?>">Добавить
                                    новую
                                    страницу в категорию</a>
                            </div>
                        <?php } elseif ($current_page) { ?>
                            <h2>Редактирование страниц</h2>
                            <p><a href="edit_page.php?page=<?php echo urlencode($current_page['id']); ?>"
                                  class="btn btn-primary">Редактировать
                                    страницу</a></p>
                            Название: <?php echo htmlentities($current_page["menu_name"], ENT_QUOTES, "UTF-8"); ?><br/>
                            Позиция: <?php echo $current_page["position"]; ?><br/>
                            Видимость: <?php echo $current_page["visible"] == 1 ? 'yes' : 'no'; ?><br/>
                            Содержимое:<br/>
                            <div class="view-content">
                                <?php echo($current_page["content"]); ?>
                            </div>
                        <?php } else { ?>
                            Пожалуйста, выберите пункт меню
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-4 blog-right">

                    <?php
                    if (htmlentities($_SESSION["username"]) == 'Admin' or htmlentities($_SESSION["username"]) == 'Admin_2') {
                        echo "<h2>Меню публичной части</h2>";
                        echo navigation($current_subject, $current_page);
                    }
                    ?>
                    <?php// echo navigation($current_subject, $current_page); ?>
                    <h2>Меню</h2>
                    <ul>
                        <?php
                        if (htmlentities($_SESSION["username"]) == 'Admin' or htmlentities($_SESSION["username"]) == 'Admin_2') {
                            include 'admin_menu.php';
                        } else {
                            $layout_context = "user";
                            echo "<li><a href='user_page.php'>Страница пользователя " . htmlentities($_SESSION['username']) . " </a></li>";
                        }
                        ?>
                        <li><a href="logout.php">Выход</a></li>
                    </ul>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>

<?php include 'includes/footer.php';

