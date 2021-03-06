<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php $layout_context = "public"; ?>
<?php include 'includes/header.php'; ?>
<?php find_selected_page(true); ?>
    <!-- contact -->
    <div class="news">
        <div class="container">
            <div class="news-grid">
                <div class="col-md-8 blog-left">
                    <div class="blog-left-grid">
                        <h4>Добавить отдел</h4>
                        <h4 style="color: green">  <?php echo message(); ?></h4>
                        <h4 style="color: red"> <?php $errors = errors(); ?></h4>
                        <h4 style="color: red"><?php echo form_errors($errors); ?></h4>
                        <form action="processing_add_section.php" method="post">
                            <input type="text" name="name"
                                   placeholder="Название" class="form-control"
                                   required
                                   style="margin-bottom: 15px; height: 48px; width: 100%">
                            <input type="text" placeholder="Номер кабинета" name="office" class="form-control"
                                   required
                                   style="height: 48px; margin-bottom: 15px">
                            <hr>
                            <input type="submit" name="submit" class="form-control btn-primary"
                                   value="Добавить" style="height: 48px;">
                        </form>
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
    <!-- //contact -->
<?php include 'includes/footer.php';
?>