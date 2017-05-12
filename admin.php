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
                        <div class="blog-leftr">
                            <h2>Страница администратора - <?php echo htmlentities($_SESSION["username"]); ?> </h2>
                            <p><?php echo htmlentities($_SESSION["username"]); ?>! Добро пожаловать в админ-панель!</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 blog-right">
                    <h3>Меню</h3>
                    <ul>
                        <li><a href="list_zakaz.php">Список заявок</a></li>
                        <li><a href="manage_admins.php">Управление администраторами</a></li>
                        <li><a href="manage_table.php">Изменить данные публичной части</a></li>
                        <li><a href="logout.php">Выход</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- //admin page -->
<?php include 'includes/footer.php';


