<?php
session_start();

echo '<html lang="ru-RU">
<head>
    <meta charset="UTF-8">';
echo '<title>Document</title>
    <meta name="viewport" content="width=1130">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/modernizr-custom.js"></script>
</head>
<body>
<div class="wrapper">
    <nav class="navbar navbar-default">
        <div class="container">
            <a href="../index.php" class="navbar-brand">
                Главная
            </a>
            <ul class="nav navbar-nav pull-right">
                <li>
                    <a href="#" data-toggle="dropdown">
                        Таблица
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href = "../load_data.php">Импорт данных</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="content-wrapper">
        <div class="container">
            <div class="content col-md-10" > ';