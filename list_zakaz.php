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
                <h3 class="title">Заявки</h3>
                <div class="page-header">
                    <h3 class="bars">Список обращений пациентов и клиентов</h3>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Клиент</th>
                        <th>Адрес</th>
                        <th>Телефон</th>
                        <th>Дата</th>
                        <th>E-mail</th>
                        <th>Сообщение</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT name_lastname_klienta, homeadress, date, message, phonenumber, email FROM zakaz ";
                    $result = mysqli_query($connection, $query);
                    confirm_query($result);
                    ?>
                    <?php
                    while ($master = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $master["name_lastname_klienta"]; ?></td>
                            <td><?php echo $master["homeadress"]; ?></td>
                            <td><?php echo $master["phonenumber"]; ?></td>
                            <td><?php echo $master["date"]; ?></td>
                            <td><?php echo $master["email"]; ?></td>
                            <td><?php echo $master["message"]; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- //table of client -->


<?php include 'includes/footer.php';