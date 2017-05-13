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
                            echo "Страница пользователя - ";
                            echo htmlentities($_SESSION["username"]); ?> </h2>
                        <h4>Информация о пользователе</h4>


                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 blog-right">
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
    <!-- //admin page -->
<?php include 'includes/footer.php';


