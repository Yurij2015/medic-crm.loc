<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="footer-grids">
<!--            <div class="col-md-3 footer-grid">-->
<!--                <h3>Полезные ссылки</h3>-->
<!--                <ul>-->
<!--                    <li><a href="#">Министерство</a></li>-->
<!--                    <li><a href="#">Новости медицины</a></li>-->
<!--                    <li><a href="#">Современное оборудование</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div class="col-md-3 footer-grid">-->
<!--                <h3>Наши специалисты</h3>-->
<!--                <ul>-->
<!--                    <li><a href="#">Исследования</a></li>-->
<!--                    <li><a href="#">Научные разработки</a></li>-->
<!--                    <li><a href="#">Практическа</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div class="col-md-3 footer-grid">-->
<!--                <h3>Для пациентов</h3>-->
<!--                <ul>-->
<!--                    <li><a href="#">Наше оборудование</a></li>-->
<!--                    <li><a href="#">Перечень услуг</a></li>-->
<!--                    <li><a href="#">Общая информация</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div class="col-md-3 footer-grid">-->
<!--                <h3>Наши ресурсы</h3>-->
<!--                <ul>-->
<!--                    --><?php //// echo navigation($current_subject, $current_page); ?>
<!--                    <li><a href="#">Наши сайты</a></li>-->
<!--                    <li><a href="#">Мы в социальных сетях</a></li>-->
<!--                    <li><a href="#">О нас пишут</a></li>-->
<!--                </ul>-->
<!--            </div>-->
            <div class="clearfix"></div>
        </div>
        <div class="footer-grds">
            <div class="footer-grds-left">
                <ul>
                    <li><a href="#">Главная |</a></li>
                    <li><a href="/contactform.php">Вопрос специалисту |</a></li>
                    <li><a href="/manage_table.php">Админ-панель</a></li>
                </ul>

                <p>Copyright © <?php echo date("Y"); ?>, <a href="/">Информационнас система - Medical
                        CRM<?php if ($layout_context == "admin  ") {
                            echo ": Панель администратора";
                        } ?></a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //footer -->
<!-- for bootstrap working -->
<script src="/js/bootstrap.js"></script>
<!-- //for bootstrap working -->

<!-- for tinymice add -->
<script type="text/javascript" src="js/tinymce/tiny_mce.js"></script>
<script type="text/javascript" src="js/tiny_editor.js"></script>
<!-- //for tinymice add -->

</body>
</html>
<?php
if (isset($connection)) {
    mysqli_close($connection);
}
?>