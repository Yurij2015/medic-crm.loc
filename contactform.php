<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php $layout_context = "public"; ?>
<?php include 'includes/header.php'; ?>
<?php find_selected_page(true); ?>
    <!-- contact -->
    <div class="contact">
        <div class="container">
            <h3>Вопрос специалисту</h3>
            <p class="et">Задавайте свои вопросы в этой форме! Наши специалисты прочитают и ответят Вам на эл. адрес.</p>
            <div class="contact-grid">
                <div class="col-md-8 contact-grid-left">
                    <h3 style="color: green">  <?php echo message(); ?></h3>
                    <h3 style="color: red"> <?php $errors = errors(); ?></h3>
                    <h3 style="color: red"><?php echo form_errors($errors); ?></h3>
                    <form action="processing_contactform.php" method="post">
                        <input type="text" value="Ведите свое Имя" name="name"
                               onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = 'Ведите свое Имя';}" required="" style="width: 100%">

                        <input type="email" value="Електронная почта" name="email" onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = 'Электронная почта';}" required="" style="width: 100%">

                        <input type="date" class="form-control" name="date" onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = '';}" required="" style="height: 48px;">
                        <hr>
                        <textarea type="text" name="question" onfocus="this.value = '';"
                                  onblur="if (this.value == '') {this.value = 'Сообщение...';}"
                                  required="">Сообщение...</textarea>
                        <hr>
                        <input type="submit" name="submit" value="Отправить вопрос">
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