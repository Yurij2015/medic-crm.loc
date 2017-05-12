<?php
if (!isset ($layout_context)) {
    $layout_context = "public";
} ?>
<!DOCTYPE html>
<html>
<head>
    <title>Medical CRM</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/css/customstyle.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- js -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
</head>
<body>
<!-- banner -->
<div class="banner1">
    <div class="container">
        <!-- header -->
        <div class="header">
            <div class="logo">
                <a href="index.php"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i>Medical CRM<span>Мы работаем для Вас!</span></a>
            </div>
            <div class="top-nav">
                <span class="menu"><img src="/images/menu.png" alt=" "/></span>
                <ul class="nav">
                    <li><a href="/main.php">Главная</a></li>
                    <li><a href="/add_klient.php">Запись на прием</a></li>
                    <li><a href="/index.php">Информация</a></li>
                    <li><a href="/login.php">Войти</a></li>
                    <li><a href="/logout.php">Выйти</a></li>
                    <li><a href="/registration.php">Регистрация</a></li>
                </ul>
                <!-- script-for-menu -->
                <script>
                    $("span.menu").click(function () {
                        $("ul.nav").slideToggle(300, function () {
                            // Animation complete.
                        });
                    });
                </script>
                <!-- /script-for-menu -->
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- //header -->
    </div>
</div>
<!-- //banner -->
