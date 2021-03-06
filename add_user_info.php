<?php require_once 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
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
                            echo "Пользователь - ";
                            echo htmlentities($_SESSION["username"]); ?> </h2>
                        <h4>Добавить информацию</h4>
                        <h4 style="color: green">  <?php echo message(); ?></h4>
                        <h4 style="color: red"> <?php $errors = errors(); ?></h4>
                        <h4 style="color: red"><?php echo form_errors($errors); ?></h4>
                        <form action="processing_add_user_info.php" method="post">
                            <input type="text" name="firstname" value="<?php echo $user['firstname'] ?>"
                                   placeholder="Имя" class="form-control"
                                   required
                                   style="margin-bottom: 15px; height: 48px; width: 100%">
                            <input type="text" placeholder="Фамилия" name="secondname" class="form-control"
                                   required
                                   style="height: 48px; margin-bottom: 15px">
                            <input type="text" placeholder="Дата рождения" name="dateofbirth" class="form-control"
                                   required
                                   style="height: 48px; margin-bottom: 15px">
                            <input type="text" placeholder="Группа крови" name="blood" class="form-control"
                                   required
                                   style="height: 48px; margin-bottom: 15px">
                            <input type="text" placeholder="Хроничесие болезни" name="chronicdisease"
                                   class="form-control"
                                   style="height: 48px; margin-bottom: 15px">
                            <input type="text" placeholder="Аллергическая реакция" name="allergy"
                                   class="form-control"
                                   style="height: 48px; margin-bottom: 15px">
                            <textarea name="otherinfo"
                                      class="form-control">Дополнительная информация...</textarea>
                            <hr>
                            <input type="submit" name="submit" class="form-control btn-primary"
                                   value="Добавить" style="height: 48px;">
                        </form>
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
                            echo "<li><a href='user_page.php'>Информация о пользователе " . htmlentities($_SESSION['username']) . " </a></li>";
                            echo "<li><a href='add_user_info.php'>Добавить информацию</a></li>";
                            echo "<li><a href='change_user_info.php'>Изменить информацию</a></li>";
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


