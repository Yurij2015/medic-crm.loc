<?php require_once 'includes/session.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php $layout_context = "admin"; ?>
<?php include 'includes/header.php'; ?>
    <!-- admin page -->
    <div class="news">
        <div class="container">
            <div class="news-grid">
                <div class="col-md-8 blog-left">
                    <div class="blog-left-grid">
                        <h2>
                            <?php
                            if (htmlentities($_SESSION["username"]) == 'Admin' or htmlentities($_SESSION["username"]) == 'Admin_2') {
                                echo "Страница администратора";
                            } else {
                                echo "Страница пользователя";
                                $layout_context = "user";
                            }
                            ?>
                            - <?php echo htmlentities($_SESSION["username"]); ?> </h2>
                        <p><?php echo htmlentities($_SESSION["username"]); ?>! Добро пожаловать в админ-панель!</p>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 blog-right">
                    <h2>Меню</h2>
                    <ul>
                        <?php
                        if (htmlentities($_SESSION["username"]) == 'Admin' or htmlentities($_SESSION["username"]) == 'Admin_2') {
                            echo "<li><a href='list_zakaz.php'>Список заявок</a></li>
                        <li><a href='manage_admins.php'>Управление администраторами</a></li>
                        <li><a href='manage_table.php'>Изменить данные публичной части</a></li>";
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
    <!-- //admin page -->
<?php include 'includes/footer.php';


