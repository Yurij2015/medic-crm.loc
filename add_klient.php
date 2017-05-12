<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php $layout_context = "public"; ?>
<?php include 'includes/header.php'; ?>
<?php find_selected_page(true); ?>
    <!-- contact -->
    <div class="contact">
        <div class="container">
            <h3>Записаться на прием</h3>
            <p class="et">Заполните форму записи на прием. И наши специалисты будут ждать Вас в нашем заведении!</p>
            <div class="contact-grid">
                <div class="col-md-8 contact-grid-left">
                    <h3 style="color: green">  <?php echo message(); ?></h3>
                    <h3 style="color: red"> <?php $errors = errors(); ?></h3>
                    <h3 style="color: red"><?php echo form_errors($errors); ?></h3>
                    <form action="processing_add_client.php" method="post">
                        <input type="text" value="Ведите свою Фамилию и Имя" name="name_lastname_klienta"
                               onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = 'Ведите свою Фамилию и Имя';}" required="">

                        <input type="email" value="Електронная почта" name="email" onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = 'Электронная почта';}" required="">

                        <input type="text" value="Номер телефона" name="phonenumber" onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = 'Номер телефона';}" required=""
                               style="margin-bottom: 15px">

                        <input type="text" value="Домашний адрес" name="homeadress" onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = 'Ваша адрес';}" required=""
                               style="margin-bottom: 15px">
                        <input type="date" class="form-control" name="date" onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = '';}" required="" style="height: 48px;">
                        <hr>
                        <textarea type="text" name="message" onfocus="this.value = '';"
                                  onblur="if (this.value == '') {this.value = 'Сообщение...';}"
                                  required="">Сообщение...</textarea>
                        <hr>
                        <input type="submit" name="submit" value="Отправить заявку">
                    </form>
                </div>
                <div class="col-md-4 contact-grid-right">
                    <h4>Наш адрес</h4>
                    <p>г. Москва, ул. Ленина, 22</p>
                    <ul>
                        <li>Номер телефона :+1 078 4589 2456</li>
                        <li>Номер телефона :+1 078 4589 2456</li>
                        <li>Факс :+1 078 4589 2456</li>
                        <li><a href="mailto:info@example.com">medforyou@medforyou</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- //contact -->
<?php include 'includes/footer.php';
?>