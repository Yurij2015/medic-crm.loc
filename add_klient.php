<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php $layout_context = "public"; ?>
<?php include 'includes/header.php'; ?>
<?php find_selected_page(true); ?>
    <!-- contact -->
    <div class="contact">
        <div class="container">
            <h3>Запись в электронную очередь</h3>
            <p class="et">Заполните форму записи в электронную очередь на прием!</p>
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

                        <label for="speciality">Выберите специальность</label>
                        <select class="form-control" name="idsection" id="speciality"
                                style="height: 48px; margin-bottom: 15px;">
                            <?php
                            $query = "SELECT `id`, `name` FROM section";
                            $result = mysqli_query($connection, $query);
                            ?>
                            <?php
                            while ($section = mysqli_fetch_assoc($result)) {
                                ?>
                                <option
                                        value="<?php echo $section["id"]; ?>"><?php echo $section["name"]; ?> </option>
                                <?php
                            }
                            ?>
                            <?php mysqli_free_result($result); ?>
                        </select>

                        <label for="specialist">Выберите специалиста</label>
                        <select class="form-control" name="idsection" id="specialist" style="height: 48px; margin-bottom: 15px;">
                            <?php
                            $query = "SELECT `id`, `firstname`, `secondname` FROM specialist";
                            $result = mysqli_query($connection, $query);
                            ?>
                            <?php
                            while ($section = mysqli_fetch_assoc($result)) {
                                ?>
                                <option
                                        value="<?php echo $section["id"]; ?>"><?php echo $section["firstname"]; ?> <?php echo $section["secondname"]; ?> </option>
                                <?php
                            }
                            ?>
                            <?php mysqli_free_result($result); ?>
                        </select>

                        <label for="datetime">Выберите дату</label>
                        <input type="date" class="form-control" id="datetime" value="<?php echo date("Y-m-d"); ?>" name="date" onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = '<?php echo date("Y-m-d"); ?>';}" required="" style="height: 48px;">


                        <?php //include "calendar.php" ?>

                        <hr>
                        <textarea type="text" name="message" onfocus="this.value = '';"
                                  onblur="if (this.value == '') {this.value = 'Сообщение...';}"
                                  required="">Сообщение...</textarea>
                        <hr>
                        <input type="submit" name="submit" value="Отправить заявку" style="margin-bottom: 15px; margin-right: 5px; width: 69%; height: 49px;" ><input type="reset" value="Отмена" style="background: orangered; width: 30%; height: 49px; color: white; border: 0; border-radius: 5px">
                    </form>
                </div>
<!--                <div class="col-md-4 contact-grid-right">-->
<!--                    <h4>Наш адрес</h4>-->
<!--                    <p>г. Москва, ул. Ленина, 22</p>-->
<!--                    <ul>-->
<!--                        <li>Номер телефона :+7 978 4589 2456</li>-->
<!--                        <li>Номер телефона :+7 978 4589 2456</li>-->
<!--                        <li>Факс :+7 978 4589 2456</li>-->
<!--                        <li><a href="mailto:info@example.com">medforyou@medforyou</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- //contact -->
<?php include 'includes/footer.php';
