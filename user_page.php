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
                            echo "Страница пользователя - ";
                            echo htmlentities($_SESSION["username"]); ?> </h2>
                        <h4>Информация о пользователе</h4>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                <th>Дата рождения</th>
                                <th>Группа крови</th>
                                <th>Хронические болезни</th>
                                <th>Аллергическая реакция</th>
                                <th>Дополнительная информация</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $username = htmlentities($_SESSION["username"]);
                            $query = "SELECT firstname, secondname, dateofbirth, blood, chronicdisease, allergy, otherinfo FROM users WHERE username = '$username'";
                            $result = mysqli_query($connection, $query);
                            confirm_query($result);
                            ?>
                            <?php
                            while ($user = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $user["firstname"]; ?></td>
                                    <td><?php echo $user["secondname"]; ?></td>
                                    <td><?php echo $user["dateofbirth"]; ?></td>
                                    <td><?php echo $user["blood"]; ?></td>
                                    <td><?php echo $user["chronicdisease"]; ?></td>
                                    <td><?php echo $user["allergy"]; ?></td>
                                    <td><?php echo $user["otherinfo"]; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>

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


