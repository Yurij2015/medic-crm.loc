<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php $layout_context = "admin"; ?>
<?php include 'includes/header.php'; ?>
<?php find_selected_page(true); ?>
    <div class="blog">
    <!--table of client -->
    <div class="typo">
        <div class="container">
            <div class="news-grid">
                <div class="col-md-8 blog-left">
                    <div class="blog-left-grid">
                        <div class="page-header">
                            <h3 class="bars">Список отделов</h3>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Кабинет</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = "SELECT name, office FROM section ";
                            $result = mysqli_query($connection, $query);
                            confirm_query($result);
                            ?>
                            <?php
                            while ($question = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $question["name"]; ?></td>
                                    <td><?php echo $question["office"]; ?></td>
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
            </div>
        </div>
    </div>
    <!-- //table of client -->
<?php include 'includes/footer.php';